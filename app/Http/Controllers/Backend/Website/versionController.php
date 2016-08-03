<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\baseController;

use App\Models\Version;
use Request, Input, URL;

class versionController extends BaseController
{
    protected $view_source_root                 = 'backend.pages.website.version';
    protected $page_title                       = 'version';
    protected $breadcrumb                       = [];
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //get data
        $version                                = new Version;
        $datas                                  = $version->paginate(50);

        $this->page_datas->datas                = $datas;

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
            $version                            = new Version;
            $datas                              = $version->find($id);
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
        $input                                  = Input::only('version_name','domain','is_active');

        //create or edit
        $version                                = Version::findOrNew($id);

        //save data
        $version->version_name                  = $input['version_name'];
        $version->domain                        = $input['domain'];
        $version->is_active                     = $input['is_active'];

        $version->save();

        $this->errors                           = $version->getErrors();
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
        //
    }
}
