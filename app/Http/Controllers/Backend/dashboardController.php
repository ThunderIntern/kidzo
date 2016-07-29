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
    protected $page_title                   = 'dashboard';
    protected $breadcrumb                   = [];
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        //page attributes
        $this->page_attributes->page_title  = $this->page_title;

        //generate view
        $view_source                       = $this->view_source_root . '.dashboard';
        $route_source                      = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }
}
