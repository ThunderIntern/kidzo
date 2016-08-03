<?php namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;
use Input, Redirect, URL, App, Session;

use \App\Http\Controllers\Modules\Mobile_Detect;


/**
 * { BaseController Class }
 * @author Budi
 * 
 * public functions :
 * 1. generateView() 					: public function template for generating view
 * 2. generateRedirectRoute() 			: public function template for redirecting to another route
 * 3. setPageDataParameter() 			: set page's data from parameter given by controller/input. used in function generateView
 * 
 * 
 * private functions :
 * 1. paginate() 						: generate data pagination, used in function generateView
 * 2. initPageAttributes() 				: initalize page attributes, used in function generateView, called on this class construct
 * 3. initPageDatas() 					: initalize page datas, used in function generateView, called on this class construct
 * 4. setPage() 						: get page from input, used in function setPageDataParameter
 * 5. setSearch() 						: get search parameter from input, used in function setPageDataParameter
 * 6. setFilter() 						: get filter parameter from input, used in function setPageDataParameter
 * 7. setSort() 						: get sort parameter from input, used in function setPageDataParameter
 */

abstract class BaseController extends Controller 
{
	//public page data
	protected $page_attributes;
	protected $page_datas;
	protected $messages;
	protected $errors;

	//public settings
	private $take 						= 2;

	function __construct() 
	{
		//page data
		$this->page_attributes 			= new \Stdclass;
		$this->initPageAttributes();

		$this->page_datas 				= new \Stdclass;
		$this->initPageDatas();

		//erro msg
		$this->errors 					= new MessageBag();
	}


	/**
	 * { generateView }
	 *
	 * @param     
	 * 1. $view_source 						: path of view source file 
	 * 2. $route_source 					: current route 
	 *
	 * @return
	 * 1. Layout
	 * 2. page_attributes
	 * 3. page_datas
	 * 
	 * steps
	 * 1. check parameter
	 * 2. initialize view source
	 * 3. generate view
	 */
	public function generateView($view_source = null, $route_source = null)
  	{
  		//1. check parameter
  		if(is_null($route_source))
  		{
			App::abort(403, 'Fungsi generateView belum ada parameter Route source $route_source.');
  		}

  		if(is_null($view_source))
  		{
			App::abort(403, 'Fungsi generateView belum ada parameter View source $view_source.');
  		}  		

		//2. initialize view source based on device
		if(isset($this->page_datas->datas['count']))
		{
	  		$this->page_datas->paging	= $this->paginate($route_source, $this->page_datas->datas['count'], $current = null);
		}
		else
		{
			if(isset($this->page_datas->cust_paging))
			{
		  		$this->page_datas->paging	= $this->paginate($route_source, $this->page_datas->cust_paging, $current = null);
			}else{
		  		$this->page_datas->paging	= $this->paginate($route_source, 0, $current = null);

				// App::abort(403, 'Custom pagination tidak dapat dijalankan karena paramter jumlah data belum didefinisikan. ( $this->page_datas->cust_paging)');
			}
		}

		//3. generate view
  		$this->layout 					= view($view_source)
											->with('page_attributes', $this->page_attributes)
											->with('page_datas', $this->page_datas)
											;
		return $this->layout;
	}


	/**
	 * { generateRedirectRoute }
	 *
	 * @param     
	 * 1. $route_to 						: destination route address
	 * 2. $parameter 						: array of paramter route
	 *
	 * @return
	 * 1. redirect
	 * 
	 * steps
	 * 1. check parameter
	 * 2. redirect
	 */
	public function generateRedirect($route_to = null, $parameter = [])
	{
  		//check route parameter
  		if(is_null($route_to))
  		{
			App::abort(403, 'Fungsi generateView belum ada parameter Route source $route_source.');
  		}

  		//redirect
		if(count($this->errors) == 0)
		{
			$title 						= null;
			$action						= null;
			$action_title				= null;
			$type 						= 'success';

			//succes, msg with action or not
			if(is_array($this->page_attributes->msg))
			{
				$title					= $this->page_attributes->msg['title'];
				$action					= $this->page_attributes->msg['action'];
				$action_title			= $this->page_attributes->msg['action_title'];
				$type					= $this->page_attributes->msg['type'];
			}
			else
			{
				$title					= $this->page_attributes->msg;
			}
			return Redirect::to($route_to)
					->with('msg',$title)
					->with('msg-type', $type)
					->with('msg-action', $action)
					->with('msg-title', $action_title);
		}
		else
		{
			return Redirect::back()
					->withInput(Input::all())
					->withErrors($this->errors)
					->with('msg-type', 'danger');

		}
	}


	/**
	 * { setPageDataParameter }
	 *
	 * @param     
	 * 1. input search 	=> q
	 * 2. input filter 	=> filters name
	 * 3. input sort 	=> sort name
	 * 4. input page 	=> page
	 *
	 * @return
	 * array ['search','filter','sort','page','take']
	 */
	public function setPageDataParameter()
	{
		//search
		$this->page_datas->search  					= $this->setSearch();
		
		//filter
		$this->page_datas->filter					= $this->setFilter();

		//sort
		$this->page_datas->sort 					= $this->setSort();
		
		//paging
		$this->page_datas->page 					= $this->setPage();

		return 	[
					'search' 						=> $this->page_datas->search,
					'filter' 						=> $this->page_datas->filter,
					'sort'	 						=> $this->page_datas->sort,
					'page' 							=> $this->page_datas->page,
					'take'	  						=> $this->take,
				];
	}


	/**
	 * { paginate }
	 *
	 * @param     
	 * 1. $route 							: current route 
	 * 2. $count 							: data count
	 * 3. $current 							: current page
	 *
	 * @return
	 * generated paginator
	 */
	private function paginate($route = null, $count = null, $current = null)
	{
		$paginator 									= new LengthAwarePaginator($count, $count, $this->take, $current);
	    return $paginator->setPath($route);
	}


	/**
	 * { initPageAttributes }
	 *
	 * @param     
	 *
	 * @return
	 * 1. $page_attributes
	 */
	private function initPageAttributes()
	{
		$this->page_attributes->page_title 			= null;
		$this->page_attributes->page_subtitle 		= null;
		$this->page_attributes->breadcrumb 			= [];
		$this->page_attributes->filters 			= [];
		$this->page_attributes->sorts 				= [];
	}


	/**
	 * { initPageDatas }
	 *
	 * @param     
	 *
	 * @return
	 * 1. $page_datas
	 */
	private function initPageDatas()
	{
		$this->page_datas->datas 					= null;
		$this->page_datas->search 					= null;
		$this->page_datas->filter 					= [];
		$this->page_datas->sort 					= [];
		$this->page_datas->page 					= null;
		$this->page_datas->paging 					= null;
	}


	/**
	 * { setPage }
	 *
	 * @param     
	 * 1. Input page
	 *
	 * @return
	 * 1. $page
	 */
	private function setPage()
	{
		$page 									= 1;

		if(Input::get('page'))
		{
			$page								= Input::get('page');					
		}

		return $page;
	}


	/**
	 * { setSearch }
	 *
	 * @param     
	 * 1. Input q (as search)
	 *
	 * @return
	 * 1. $search
	 */
	private function setSearch()
	{
		return Input::get('q');					
	}


	/**
	 * { setFilter }
	 *
	 * @param     
	 * 1. Input filter
	 * 2. page_attributes->filters
	 *
	 * @return
	 * 1. $filter[]
	 */
 	private function setFilter()
	{	
		$filter 									= [];
		$filters 									= $this->page_attributes->filters;

		foreach ($filters as $key => $tmp) 
		{
			if (Input::has($key))
			{
				$filter[$key]						= Input::get($key); 
			}
		}

		return $filter;
	}


	/**
	 * { setSort }
	 *
	 * @param     
	 * 1. Input sort
	 *
	 * @return
	 * 1. $sort[]
	 */
	private function setSort()
	{
		if (Input::has('sort'))
		{
			$sort_item 								= explode('-', Input::get('sort'));
			$sort									= [$sort_item[0] => $sort_item[1]];
		}
		else
		{
			$sort 									= [];
		}

		return $sort;
	}	

	/**
	 * { setRefererUrl }
	 *
	 * @param     
	 * _
	 *
	 * @return
	 * session save -> url_referer
	 * @Description
	 * Set previous page and save to session
	 */
	public function setRefererUrl()
	{
        Session::flash('url_referer', URL::previous());
	}

	/**
	 * { getRefererUrl }
	 *
	 * @param     
	 * _
	 *
	 * @return
	 * referer url
	 * @Description
	 * get previous page
	 */
	public function getRefererUrl()
	{
        return Session::get('url_referer');
   	}
}
