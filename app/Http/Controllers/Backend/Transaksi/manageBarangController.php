<?php

namespace App\Http\Controllers\Backend\Transaksi;

use App\Http\Controllers\baseController;

use App\Models\Barang;
use App\Models\Inventory;
use Request, Input, URL, Carbon\Carbon;


class manageBarangController extends BaseController
{
    protected $view_source_root             = 'backend.pages.transaksi.manageBarang';
    protected $page_title                   = 'Barang';
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
        $Barang                                 = new Barang;
        $datas                                  = $Barang::paginate(10);

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
            $Barang                             = new Barang;
            $datas                              = $Barang::find($id);
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
        $input                                   = Input::only('nama' , 'jenis' , 'url' , 'link' , 'harga', 'deskripsi', 'jumlah');

        //create or edit
        $Barang                                  = Barang::findOrNew($id);

        //save data
        $Barang->nama                            = $input['nama'];
        $Barang->jenis                           = $input['jenis'];
        $Barang->harga                           = $input['harga'];
        $Barang->foto['url']                     = $input['url'];
        $Barang->foto['link']                    = $input['link'];
        $Barang->deskripsi                       = $input['deskripsi'];

        $today                                   = Carbon::today()->toDateString();
        $new                                     = new Inventory;
        $inven                                   = Inventory::get();
        $init = null;
        $cur = null;
        $brg = null;
        foreach ($inven as $key => $tory) {
            if($tory['tanggal'] == $today){
                $brg = $tory['barang'];
                foreach ($tory['barang'] as $key2 => $barang) {
                    if($barang['nama'] == $input['nama']){
                        $init = (int)$barang['initialStock'] + (int)$input['jumlah'];
                        $cur  = (int)$barang['currentStock'] + (int)$input['jumlah'];
                        Inventory::where('tanggal' , $today)
                                 ->where('barang.' . $key . '.nama' , $input['nama'])
                                 ->update(['barang.' . $key . '.initialStock' => $init , 'barang.' . $key . '.currentStock' => $cur]);
                    }
                    else{
                        $brg[$input['nama']] = ['nama' => $input['nama'] , 'initialStock' => $input['jumlah'] , 'currentStock' => $input['jumlah'] , 'brokenStock' => '0' , 'outStock' => null];
                        Inventory::where('tanggal' , $today)
                                 ->update(['barang' => $brg]);
                    }
                }
            }
            else{
                $new->tanggal                = $today;
                $new->barang['nama']         = $input['nama'];
                $new->barang['initialStock'] = $input['jumlah'];
                $new->barang['currentStock'] = $input['jumlah'];
                $new->barang['brokenStock']  = '0';
                $new->barang['outStock']     = null;
                $new->admin                  = 'admin';
                $new->save();
            }    
        }

        //set Admin
        if(is_null($Barang->admin)){
            $Barang->admin                       = 'Admins';
        }

        $Barang->save();

        $this->errors                            = $admin->getErrors();
        $this->page_attributes->msg              = 'Data telah disimpan';

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
        $Barang                                 = new Barang;
        $datas                                  = $Barang::find($id);

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
        $Barang                              = Barang::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $Barang->delete();
            
            $this->errors                       = $Barang->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.transaksi.manageBarang.index'));
    }
}
