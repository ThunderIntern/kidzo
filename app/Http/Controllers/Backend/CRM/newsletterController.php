<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;
use App\Http\Controllers\functions\dataFormatter;

use App\Models\Newsletter;
use App\Models\Version;
use Request, Input, URL, Hash;

class newsletterController extends BaseController
{
    protected $view_source_root             = 'backend.pages.crm.newsletter';
    protected $page_title                   = 'Newsletter';
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
        $newsletter                             = new Newsletter;
        $datas                                  = $newsletter->paginate(50);

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
            $newsletter                         = new Newsletter;
            $datas                              = $newsletter->find($id);

            $datas['version']                   = dataFormatter::toSelectize($datas['version']['_id'],$datas['version']['version_name']);
        }

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
        $input                                  = Input::only('Judul','version','content');

        //create or edit
        $newsletter                           = Newsletter::findOrNew($id);

        //save data
        $newsletter->Judul                     = $input['Judul'];
        $newsletter->version                   = Version::find($input['version'])['attributes'];
        $newsletter->content                   = $input['content'];

        if(is_null($newsletter->admin)){
            $newsletter->admin                     = 'Admins';
        }

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
        $newsletter                             = new Newsletter;
        $datas                                  = $newsletter::find($id);

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
        $newsletter                             = Newsletter::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $newsletter->delete();
            
            $this->errors                       = $newsletter->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.crm.newsletter.index'));
    }
}
