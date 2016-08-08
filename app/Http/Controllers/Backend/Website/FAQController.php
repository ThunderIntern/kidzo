<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\baseController;

use App\Models\Version;
use App\Models\Faq;
use Request, Input, URL;

class FAQController extends BaseController
{
    protected $view_source_root             = 'backend.pages.website.FAQ';
    protected $page_title                   = 'FAQ';
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
        //get data
        $faq                                    = new Faq;
        $datas                                  = $faq::paginate(10);

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
            $faq                                = new Faq;
            $datas                              = $faq::find($id);

            //setup version
            $datas['version']                   =   json_encode([
                                                        'value'         => (string)$datas['version']['_id'],
                                                        'text'          => $datas['version']['version_name']
                                                    ]);
            
            //setup kategori
            $datas['kategori']                  =  json_encode([
                                                        'value'         => $datas['kategori'],
                                                        'text'          => $datas['kategori']
                                                    ]);

            //setup sub kategori
            $datas['sub_kategori']              =  json_encode([
                                                        'value'         => $datas['sub_kategori'],
                                                        'text'          => $datas['sub_kategori']
                                                    ]);                                                          
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
        $input                                  = Input::only('version','kategori','sub_kategori','no_urut','pertanyaan','jawaban');

        //create or edit
        $faq                                    = Faq::findOrNew($id);

        //save data
        $faq->version                           = Version::find($input['version'])['attributes'];
        $faq->kategori                          = strtolower($input['kategori']);
        $faq->sub_kategori                      = strtolower($input['sub_kategori']);
        $faq->no_urut                           = $input['no_urut'];
        $faq->pertanyaan                        = $input['pertanyaan'];
        $faq->jawaban                           = $input['jawaban'];

        //set Admin
        if(is_null($faq->admin)){
            $faq->admin                         = 'Admins';
        }

        $faq->save();

        $this->errors                           = $faq->getErrors();
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
        $faq                                    = new Faq;
        $datas                                  = $faq::find($id);

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
        $faq                                    = Faq::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $faq->delete();
            
            $this->errors                       = $faq->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.website.FAQ.index'));
    }


    //AJAX
    public function ajaxGetFaqKategori()
    {
        $faq                                    = new Faq;

        return $faq::raw(function($collection) { 
            return $collection->aggregate(array(
                array(
                    '$group'    => array(
                            '_id'   => '$kategori',
                            'text'  => ['$first' =>'$kategori'],
                            'value' => ['$first' =>'$kategori'],
                    )
                )     
            )); 
        })->toArray();
    }  

    public function ajaxGetFaqSubKategori()
    {
        $faq                                    = new Faq;

        return $faq::raw(function($collection) { 
            return $collection->aggregate(array(
                array(
                    '$group'    => array(
                            '_id'   => '$sub_kategori',
                            'text'  => ['$first' =>'$sub_kategori'],
                            'value' => ['$first' =>'$sub_kategori'],
                    )
                )     
            )); 
        })->toArray();
    }         
}
