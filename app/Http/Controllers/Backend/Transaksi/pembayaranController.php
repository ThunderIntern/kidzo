<?php

namespace App\Http\Controllers\Backend\Transaksi;

use App\Http\Controllers\baseController;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\History;
use Request, Input, URL;

class pembayaranController extends BaseController
{
    protected $view_source_root             = 'backend.pages.transaksi.pembayaran';
    protected $page_title                   = 'Pembayaran';
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
        $Transaksi                              = new Transaksi;
        $datas                                  = $Transaksi::paginate(10);

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
            $Transaksi                          = new Transaksi;
            $datas                              = $Transaksi::find($id);
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
        $input                                        = Input::only('barang','jumlah','status');

        //create or edit
        $Transaksi                                    = Transaksi::findOrNew($id);
        
        //save data
        $Transaksi->status                            = $input['status'];

        //set Admin
        if(is_null($Transaksi->admin)){
            $Transaksi->admin                         = 'Admins';
        }

        $Transaksi->save();

        if($input['status'] == 'delivered'){
            $His = Transaksi::find($id);

            $History = $His['attributes'];
            //dd($History);

            $array = ['nama' => $His['nama'] , 'alamat' => $His['alamat'] , 'nomor' => $His['nomor'] , 'barang' => $His['barang'] , 'nota' => $His['nota'] , 'total' => $His['total']];
            $cari = History::where('username' , $History['username'])
                           ->first()['attributes'];
            if($cari['history'] == null){
                $history[] = $array;
                History::where('username' , $History['username'])
                        ->update(['history' => $history]);  
            }
            else{
                foreach ($cari['history'] as $key => $car) {
                    $history[$key] = $car;
                }
                $history[] = $array;
                History::where('username' , $History['username'])
                        ->update(['history' => $history]);   
            }
        }

        $this->errors                           = $Transaksi->getErrors();
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
        $Transaksi                              = new Transaksi;
        $datas                                  = $Transaksi::find($id);

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
        $Transaksi                              = Transaksi::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $Transaksi->delete();
            
            $this->errors                       = $Transaksi->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.transaksi.pembayaran.index'));
    }
}
