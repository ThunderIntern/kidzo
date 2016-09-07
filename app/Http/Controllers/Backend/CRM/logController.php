<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;
use App\Http\Controllers\functions\dataFormatter;

use App\Models\Log;
use Request, Input, URL, Hash;

class logController extends BaseController
{
    protected $view_source_root             = 'backend.pages.crm.log';
    protected $page_title                   = 'log';
    protected $breadcrumb                   = [];
    public function __construct()
    {
        parent::__construct();
    } 
    /**            
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(){
        $search_result                          = Log::where('email', 'like', '%'.Input::get('search').'%')
                                                    ->paginate();
        $this->page_datas->datas                = $search_result;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = 'Search Result: '.Input::get('search');
        //generate view
        $view_source                            = $this->view_source_root . '.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function index()
    {
        $log                                    = new Log;
        $datas                                  = $log::orderBy('status','asc')
                                                            ->orderBy('created_at','desc')
                                                            ->paginate(50);

        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = null;

         //page attributes
        $this->page_attributes->page_title  = $this->page_title;

        //generate view
        $view_source                       = $this->view_source_root . '.index';
        $route_source                      = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
         //get data
        $datas                                  = null;
        
        if($id != null)
        {
            $log                                = new Log;
            $datas                              = $log->find($id);
        }

        $this->page_datas->datas                = $datas;

        //set referral url
        $this->setRefererUrl();

        //page attributes
        $this->page_attributes->msg             = $this->page_title;
        $this->page_datas->id                   = $id;

        //generate view
        $view_source                            = $this->view_source_root . '.create';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id = null)
    {
        //get input
        $input                          = Input::only('username','email','phone','content','status');

        //create or edit
        $log                            = Log::findOrNew($id);

        //save data
        $log->username                  = $input['username'];
        $log->email                     = $input['email'];
        $log->phone                     = $input['phone'];
        $log->content                   = $input['content'];
        $log->status                    = ($input['status']=='True')?True:False;

        $log->save();

        $this->errors                           = $log->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect(route('backend.crm.log.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log                            = new Log;
        $datas                                  = $log::find($id);

        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = $id;

        //page attributes
        $this->page_attributes->page_title      = 'Detail ' . $this->page_title;


        //generate view
        $view_source                            = $this->view_source_root . '.show';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->create($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->store($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find 
        $log                                    = Log::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $log->delete();
            
            $this->errors                       = $log->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.crm.log.index'));
    }
}
