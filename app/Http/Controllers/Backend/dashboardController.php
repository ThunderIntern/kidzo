<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\baseController;

use App\Models\Admin;
use App\Models\Version;
use App\Models\Faq;
use App\Models\WebsiteConfig;

use Request;
use Input, URL, Hash;

class dashboardController extends baseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //init 
    protected $view_source_root             = 'backend.pages';
    protected $breadcrumb                   = [];
    public function __construct()
    {
        parent::__construct();
    }


    public function dashboard()
    {
        //page attributes
        $this->page_attributes->page_title  = 'Dashboard';

        //generate view
        $view_source                        = $this->view_source_root . '.home';
        $route_source                       = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function website()
    {

        //page datas
        //get data version
        $query[]                            =  ['$group' => [
                                                    '_id'             => '$version_name',
                                                    'version_name'     => ['$first' =>'$version_name'],
                                                    'admin'            => ['$first' =>'$admin'],
                                                    'domain'           => ['$first' =>'$domain'],
                                                    'created_at'       => ['$first' =>'$created_at'],
                                                ]];


        $this->page_datas->versions         = Version::raw(function($collection) use ($query) { 
                                                    return $collection->aggregate($query);  
                                                });   
        // var_dump($this->page_datas->versions );   

        //get data slider
        $slider                             = WebsiteConfig::groupBy('kategori')->get();
        // agregate where slider
        // agregate sort latest
        // agregate group by version


        //page attributes
        $this->page_attributes->page_title  = 'Website';

        //generate view
        $view_source                        = $this->view_source_root . '.website.home';
        $route_source                       = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }    

    public function crm()
    {
        //page attributes
        $this->page_attributes->page_title  = 'CRM';

        //generate view
        $view_source                        = $this->view_source_root . '.crm.crm';
        $route_source                       = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }    

    public function admin()
    {
        //page attributes
        $this->page_attributes->page_title  = 'Admin';

        //generate view
        $view_source                        = $this->view_source_root . '.admin.home';
        $route_source                       = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function login()
    {
        $admin                                   = new Admin;

        //get input
        $input                                  = Input::only('username','password');

        if($input['username'] == "" || $input['password'] == ""){
            $this->page_attributes->msg             = 'Login Gagal';
            return $this->generateRedirect(route('loginPage'));
        }

        //save data
        $cari                                   = $admin::where('username',$input['username'])
                                                        ->where('password',$input['password'])
                                                        ->first()['attributes'];
        //dd($cari);
        if(is_null($cari)){
            $this->errors                           = $admin->getErrors();
            $this->page_attributes->msg             = 'Login Gagal';
            return $this->generateRedirect(route('loginPage'));                
        }
        else{
            session(['key' => $input['username']]);
            $this->errors                           = $admin->getErrors();
            $this->page_attributes->msg             = 'Login Berhasil';
            return $this->generateRedirect(route('backend.dashboard'));
        }
    }

    public function loginPage()
    {
        $route_source                       = Request::route()->getName();  
        return $this->generateView('backend.pages.login' , $route_source);
    }    

    public function logout()
    {
        session()->flush();
        $this->page_attributes->msg             = 'Logout Berhasil';       
        return $this->generateRedirect(route('loginPage'));
    }  
}
