<?php

namespace App\Http\Controllers\Backend\Transaksi;

use App\Http\Controllers\baseController;

use App\Models\Barang;
use App\Models\Inventory;
use Request, Input, URL;


class manageInventoryController extends BaseController
{
    protected $view_source_root             = 'backend.pages.transaksi.manageInventory';
    protected $page_title                   = 'Inventory';
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
        $Inventory                              = new Inventory;
        $datas                                  = $Inventory::paginate(10);

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
            $Inventory                          = new Inventory;
            $datas                              = $Inventory::find($id);
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
        $input                                             = Input::only('nama','awal','now');
        //dd($input);
        //create or edit
        $Inventory                                         = Inventory::findOrNew($id);
        //dd($Inventory['tanggal']);
        //save data
        if($input['now'] == ""){
            foreach ($Inventory['barang'] as $key => $data) {
                if($data['nama'] == $input['nama']){
                    $data['initialStock']                        = (int)$data['initialStock'] + (int)$input['awal'];
                    $data['currentStock']                        = (int)$data['currentStock'] + (int)$input['awal'];
                    Inventory::where('tanggal' , $Inventory['tanggal'])
                             ->where('barang.' .$key. '.nama' , $data['nama'])
                             ->update(['barang.'.$key.'.initialStock' => $data['initialStock'] , 'barang.'.$key.'.currentStock' => $data['currentStock']]);
                }
            }
        }
        else{
            foreach ($Inventory['barang'] as $key => $data) {
                if($data['nama'] == $input['nama']){
                    $data['initialStock']                        = (int)$data['initialStock'] + (int)$input['awal'];
                    $data['currentStock']                        = $input['now'];
                    Inventory::where('tanggal' , $Inventory['tanggal'])
                             ->where('barang.' .$key. '.nama' , $data['nama'])
                             ->update(['barang.'.$key.'.initialStock' => $data['initialStock'] , 'barang.'.$key.'currentStock' => $data['currentStock']]);
                }
            }
        }

        $Inventory->save();

        //$this->errors                                      = $admin->getErrors();
        $this->page_attributes->msg                        = 'Data telah disimpan';

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
        $Inventory                              = new Inventory;
        $datas                                  = $Inventory::find($id);

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
        $Inventory                              = Inventory::find($id);

        //get password
        $password                               = Input::get('password');
        if(empty($password)){
            $this->errors                       = "Password not valid";
        }else{
            //delete data
            $Inventory->delete();
            
            $this->errors                       = $Inventory->getErrors();
        }

        //return view
        $this->page_attributes->msg             = 'Data telah dihapus';

        return $this->generateRedirect(route('backend.transaksi.manageInventory.index'));
    }
}
