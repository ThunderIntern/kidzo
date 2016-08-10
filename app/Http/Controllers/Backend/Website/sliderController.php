<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\baseController;
use App\Http\Controllers\functions\dataFormatter;

use App\Models\WebsiteConfig;
use App\Models\Version;
use Request, Input, URL;


class sliderController extends BaseController
{
    protected $view_source_root                 = 'backend.pages.website.slider';
    protected $page_title                       = 'Slider';
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
        $WebsiteConfig                          = new WebsiteConfig;
        $datas                                  = $WebsiteConfig::where('kategori','slider')->paginate(10);

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
        $datas                                  = null;

        if($id != null)
        {
            //get data
            $WebsiteConfig                      = new WebsiteConfig;
            $datas                              = $WebsiteConfig->find($id);

            //setup version
            $datas['version']                   = dataFormatter::toSelectize($datas['version']['_id'],$datas['version']['version_name']);

            //setup slider data
            for ($i=0; $i < 5; $i++) { 
                if(!isset($datas['config']['slider'. ($i+1)])){
                    $slider['slider' . ($i+1)]  =   [
                                                        'url'           => null,
                                                        'link'          => null,
                                                    ];
                }else{
                    $slider['slider' . ($i+1)]  =   [
                                                        'url'           => $datas['config']['slider'. ($i+1)]['url'],
                                                        'link'          => $datas['config']['slider'. ($i+1)]['link'],
                                                    ];
                }
            }
            $datas['config']                    = $slider;
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
        $input                                  = Input::only('version','sliders_image','sliders_link');

        //set input sliders
        $sliders                                = null;
        foreach ($input['sliders_image'] as $key => $value) {
            if(!empty($value)){
                $sliders['slider' . ($key+1)]   =   [
                                                        'url'           => $value,
                                                        'link'          => $input['sliders_link'][$key],
                                                    ];
            }
        }

        //set input version
        $version                                = Version::find($input['version'])['attributes'];
        if(is_null($version)){
            $version                            = null;
        }

        //create or edit
        $WebsiteConfig                          = WebsiteConfig::findOrNew($id);

        //save data
        $WebsiteConfig->version                 = $version;
        $WebsiteConfig->kategori                = 'slider';
        $WebsiteConfig->config                  = $sliders;
        $WebsiteConfig->admin                   = 'Admin';
        $WebsiteConfig->published_at            = strtotime('now');

        //set Admin
        if(is_null($WebsiteConfig->admin)){
            $WebsiteConfig->admin               = 'Admins';
        }

        $WebsiteConfig->save();

        $this->errors                           = $WebsiteConfig->getErrors();
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
        $WebsiteConfig                          = new WebsiteConfig;
        $datas                                  = $WebsiteConfig::find($id);

        //setup slider data
        for ($i=0; $i < 5; $i++) { 
            if(!isset($datas['config']['slider'. ($i+1)])){
                $slider['slider' . ($i+1)]      =   [
                                                        'url'           => null,
                                                        'link'          => null,
                                                    ];
            }else{
                $slider['slider' . ($i+1)]      =   [
                                                        'url'           => $datas['config']['slider'. ($i+1)]['url'],
                                                        'link'          => $datas['config']['slider'. ($i+1)]['link'],
                                                    ];
            }
        }
        $datas['config']                        = $slider;


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
        $WebsiteConfig                          = WebsiteConfig::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $WebsiteConfig->delete();
            
            $this->errors                       = $WebsiteConfig->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.website.slider.index'));
    }
}
