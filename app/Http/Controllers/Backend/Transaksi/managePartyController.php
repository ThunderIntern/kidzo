<?php

namespace App\Http\Controllers\Backend\Transaksi;

use App\Http\Controllers\baseController;

use App\Models\Barang;
use App\Models\Inventory;
use Request, Input, URL, Carbon\Carbon;


class managePartyController extends BaseController
{
    protected $view_source_root             = 'backend.pages.transaksi.manageParty';
    protected $page_title                   = 'Party Pack';
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
        $datas                                  = $Barang::where('status' , 'party')
                                                         ->paginate(10);

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
        $input                                   = Input::only('nama' , 'jenis' , 'url' , 'harga', 'deskripsi', 'jumlah1' , 'nama1' , 'jumlah2' , 'nama2', 'jumlah3' , 'nama3', 'jumlah4' , 'nama4', 'jumlah5' , 'nama5', 'jumlah6' , 'nama6', 'jumlah7' , 'nama7' , 'lama');
        //dd($input);
        //create or edit
        $Barang                                  = Barang::findOrNew($id);
        $i = 0;

        $array = null;

        if($input['nama1'] && $input['jumlah1']){
            $array[$i] = ['nama' => $input['nama1'],
                         'jumlah' => $input['jumlah1']
                         ];
            $i++;
        }
        if($input['nama2'] && $input['jumlah2']){
            $array[$i] = ['nama' => $input['nama2'],
                         'jumlah' => $input['jumlah2']
                         ];
            $i++;
        }
        if($input['nama3'] && $input['jumlah3']){
            $array[$i] = ['nama' => $input['nama3'],
                         'jumlah' => $input['jumlah3']
                         ];
            $i++;
        }
        if($input['nama4'] && $input['jumlah4']){
            $array[$i] = ['nama' => $input['nama4'],
                         'jumlah' => $input['jumlah4']
                         ];
            $i++;
        }
        if($input['nama5'] && $input['jumlah5']){
            $array[$i] = ['nama' => $input['nama5'],
                         'jumlah' => $input['jumlah5']
                         ];
            $i++;
        }
        if($input['nama6'] && $input['jumlah6']){
            $array[$i] = ['nama' => $input['nama6'],
                         'jumlah' => $input['jumlah6']
                         ];
            $i++;
        }
        if($input['nama7'] && $input['jumlah7']){
            $array[$i] = ['nama' => $input['nama7'],
                         'jumlah' => $input['jumlah7']
                         ];
            $i++;
        }
        //dd($array);

        //save data
        $Barang->nama                            = $input['nama'];
        $Barang->jenis                           = $input['jenis'];
        $Barang->harga                           = $input['harga'];
        $Barang->foto                            = ['url'=> $input['url'],
                                                    'link' => 'deskripsiParty'
                                                    ];
        $Barang->deskripsi                       = $input['deskripsi'];
        $Barang->perawatan                       = $input['lama'];
        $Barang->status                          = 'party';
        $Barang->isi                             = $array;

        //set Admin
        if(is_null($Barang->admin)){
            $Barang->admin                       = 'Admins';
        }

        $Barang->save();

        //$this->errors                            = $admin->getErrors();
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
