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
