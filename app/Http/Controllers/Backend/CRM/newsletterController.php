<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;

use App\Models\Subscriber;
use Request, Input, URL;

class newsletterController extends BaseController
{
    protected $view_source_root             = 'backend.pages.crm.newsletter';
    protected $page_title                   = 'newsletter';
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
    public function index()
    {
        $newsletter                             = new Subscriber;
        $datas                                  = $newsletter->paginate(50);

        $this->page_datas->datas                = $datas;


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
            $newsletter                         = new Subscriber;
            $datas                              = $newsletter->find($id);
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
    public function store(Request $request)
    {
         //get input
        $input                                  = Input::only('eamil','version','unsubscribe_token','is_subscribe');

        //create or edit
        $newsletter                           = Subscriber::findOrNew($id);

        //save data
        $newsletter->email                     = $input['email'];
        $newsletter->version                   = $input['version'];
        $newsletter->unsubscribe_token         = $input['unsubscribe_token'];
        $newsletter->is_subscribe              = $input['is_subscribe'];

        $newsletter->save();

        $this->errors                           = $newsletter->getErrors();
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
        //
    }
}
