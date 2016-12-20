<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;

use App\Models\User;
use Request, Input, URL;

class customerController extends BaseController
{
    protected $view_source_root             = 'backend.pages.crm.customer';
    protected $page_title                   = 'Customer';
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
        $search_result                          = User::where('email', 'like', '%'.Input::get('search').'%')
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
        //get data
        $datas                                  = User::orderBy('created_at', desc)
                                                    ->paginate(10);

        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = null;

        //page attributes
        $this->page_attributes->page_title      = $this->page_title;

        //generate view
        $view_source                            = $this->view_source_root . '.index';
        $route_source                           = Request::route()->getName();        
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
            $user                                = new User;
            $datas                              = $user::find($id);
        }

        //set data
        $this->page_datas->datas                = $datas;

        //set referral url
        $this->setRefererUrl();

        //page attributes
        if($id != null){
            $this->page_attributes->page_title  = 'Edit '. $this->page_title;
        }else{
            $this->page_attributes->page_title  = $this->page_title . ' Baru';
        }
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
        $input                                  = Input::only('email','username','password','conf_password','nama','no','alamat');

        //create or edit
        $user                                    = User::findOrNew($id);

        if($input['password'] != $input['conf_password']){
            $this->page_attributes->msg             = 'Password Tidak Sesuai';
            return $this->generateRedirect(route('backend.crm.customer.store'));
        }
        //save data
        $user->email                           = $input['email'];
        $user->username                        = $input['username'];
        $user->password                        = $input['password'];
        $user->name                            = $input['nama'];
        $user->phone                           = $input['no'];
        $user->address                         = $input['alamat'];

        //set Admin
        if(is_null($user->admin)){
            $user->admin                         = 'Admins';
        }

        $user->save();

        $this->errors                           = $user->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect($this->getRefererUrl());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get data
        $user                                    = new User;
        $datas                                  = $user::find($id);

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
    public function update($id)
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
        $user                                    = User::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $user->delete();
            
            $this->errors                       = $user->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.crm.customer.index'));
    }
}
