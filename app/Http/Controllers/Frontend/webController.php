<?php

namespace App\Http\Controllers\Frontend;

use Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;

class webController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $view_source_root             = 'frontend.pages';
    protected $page_title                   = 'about';
    protected $breadcrumb                   = [];
    
    public function __construct()
    {
        parent::__construct();
    }


    public function home()
    {
        return $this->generateView('frontend.pages.home', Request::route()->getName());
    }

    public function about()
    {

         $this->page_attributes->page_title  = $this->page_title;
         $this->page_datas->datas            = ['0'=>'test', '1'=>'test lagi'];
       //generate view
        $view_source                       = $this->view_source_root . '.about';
        $route_source                      = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function registerNewsletter()
    {
        //
    }

    public function registeredNewsletter()
    {
        //
    }



    public function index()
    {
        //
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
    public function edit($id)
    {
        //
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
        //
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
