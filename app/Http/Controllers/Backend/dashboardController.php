<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\baseController;
use Request;

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
        //page attributes
        $this->page_attributes->page_title  = 'Website';

        //generate view
        $view_source                        = $this->view_source_root . '.website.home';
        $route_source                       = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }    
}
