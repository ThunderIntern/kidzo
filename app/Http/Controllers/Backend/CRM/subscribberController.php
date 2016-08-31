<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;
use App\Http\Controllers\functions\dataFormatter;

use App\Models\Subscriber;
use App\Models\Version;
use Request, Input, URL, Hash;

class subscribberController extends BaseController
{
    protected $view_source_root             = 'backend.pages.crm.subscribber';
    protected $page_title                   = 'subscribber';
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
        $search_result                          = Subscriber::where('email', 'like', '%'.Input::get('search').'%')
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
        $subscribber                            = new Subscriber;
        $datas                                  = $subscribber->paginate(50);

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
            $subscribber                        = new Subscriber;
            $datas                              = $subscribber->find($id);

            $datas['version']                   = dataFormatter::toSelectize($datas['version']['_id'],$datas['version']['version_name']);
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
        $input                                  = Input::only('email','version','is_subscribe');

        //create or edit
        $subscribber                            = Subscriber::findOrNew($id);

        //save data
        $subscribber->email                     = $input['email'];
        $subscribber->version                   = Version::find($input['version'])['attributes'];
        $hashedToken                            = hash('md5', strtotime('now'));
        $subscribber->unsubscribe_token          = $hashedToken;
        $subscribber->is_subscribe              = $input['is_subscribe'];

        if(is_null($subscribber->admin)){
            $subscribber->admin                     = 'Admins';
        }

        $subscribber->save();

        $this->errors                           = $subscribber->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect(route('backend.crm.subscribber.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscribber                            = new Subscriber;
        $datas                                  = $subscribber::find($id);

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
        $subscribber                                    = Subscriber::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $subscribber->delete();
            
            $this->errors                       = $subscribber->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.crm.subscribber.index'));
    }
}
