<?php

namespace App\Http\Controllers\Frontend;

use Request;
use App\Http\Controllers\Functions\email;
use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\Models\Subscriber;
use App\Models\WebsiteConfig;
use App\Models\Version;
use Input, URL, Hash;

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
        $WebsiteConfig                          = new WebsiteConfig;
        $datas                                  = $WebsiteConfig::where('kategori','slider')
                                                    ->orderBy('published_at','desc')
                                                    ->first();
        $this->page_datas->datas                = $datas;

        return $this->generateView('frontend.pages.home', Request::route()->getName());
    }

    public function about()
    {

        $this->page_attributes->page_title  = $this->page_title;
       //generate view
        $view_source                       = $this->view_source_root . '.about';
        $route_source                      = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function registerNewsletter()
    {
        $newsletter                             = new Subscriber;

        $this->page_datas->datas                = [];

        //get input
        $input                                  = Input::only('email_mobile','email_desktop');

        //save data
        if(empty($input['email_mobile'])){
            $newsletter->email                  = $input['email_desktop'];
        }else{
            $newsletter->email                  = $input['email_mobile'];
        }

        $newsletter->version                   = 'Kidzo';
        $hashedToken                           = Hash::make('123456');
        $newsletter->unsubscribe_token         = $hashedToken;
        $newsletter->is_subscribe              = true;

        if(is_null($newsletter->admin)){
            $newsletter->admin                     = 'Admins';
        }

        $newsletter->save();
        $this->errors                           = $newsletter->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';
        

        $email = new email;
        $email -> send('Selamat Datang!', 'Anda telah berhasil berlangganan newsletter.
Terima kasih sudah mendaftar newsletter kidzo dan ikuti terus update dari barang-barang terbaru kami!',$newsletter->email);

        return $this->generateRedirect(route('registered'));
    }

    public function registeredNewsletter($id = null)
    {


        
        return $this->generateView('frontend.pages.registered', Request::route()->getName());
    }

     public function unsubscribeNewsletter()
    {
        //
    }

    public function unsubscribedNewsletter()
    {
        return $this->generateView('frontend.pages.unsubscribed', Request::route()->getName());
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
