<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\baseController;

use App\Models\Admin;
use Request, Input, URL;

class changePasswordController extends BaseController
{
    protected $view_source_root             = 'backend.pages.admin.changePassword';
    protected $page_title                   = 'Admin';
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

    public function updatePassword(){                                              
        
    }


    public function index()
    {
        if(session('key')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }

        //generate view
        $view_source                            = $this->view_source_root . '.password';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id=null)
    {
        //get input
        $input                              = Input::only('password', 'new_password', 'conf_password');
        $admin                                = Admin::where('username', session('key'))
                                                        ->get()['0']['attributes'];
                                                        
        if($input['password'] != $admin['password'] || $input['new_password'] != $input['conf_password']){
            $this->page_attributes->msg             = 'Password Tidak Sesuai';
            return $this->generateView('backend.pages.admin.changePassword.password', Request::route()->getName());
        }

        $data                                   = ['password' => $input['new_password'] ];

        $admin                                = Admin::where('username', session('key'))->update($data);
        
        $this->page_attributes->msg             = 'Data telah disimpan';        

        return $this->generateRedirect(route('backend.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
