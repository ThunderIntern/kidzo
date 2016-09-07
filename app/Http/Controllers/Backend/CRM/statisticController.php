<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;

use App\Models\Statistic;
use Request, Input, URL;

class statisticController extends BaseController
{
    protected $view_source_root             = 'backend.pages.crm.statistic';
    protected $page_title                   = 'Statistic';
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

    public function updatePassword(){                                              
         
    }


    public function index()
    {
        if(session('key')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('backend.dashboard'));
            
        }

        $Statistic                  = Statistic::where('permintaanMax',1000)
                                                ->get()['0']['attributes'];
        
        if($Statistic['permintaanAkhir']<=$Statistic['permintaanMin']){
            $permintaanTurun        = 1;
        }elseif($Statistic['permintaanAkhir']>=$Statistic['permintaanMax']){
            $permintaanTurun        = 0;
        }else{
            $permintaanTurun            = ($Statistic['permintaanMax'] - $Statistic['permintaanAkhir'])/($Statistic['permintaanMax'] - $Statistic['permintaanMin']);
        }

        if($Statistic['permintaanAkhir']<=$Statistic['permintaanMin']){
            $permintaanNaik        = 0;
        }elseif($Statistic['permintaanAkhir']>=$Statistic['permintaanMax']){
            $permintaanNaik        = 1;
        }else{
            $permintaanNaik             = ($Statistic['permintaanAkhir'] - $Statistic['permintaanMin'])/($Statistic['permintaanMax'] - $Statistic['permintaanMin']);
        }

        if($Statistic['persediaanAkhir']<=$Statistic['persediaanMin']){
            $persediaanTurun        = 1;
        }elseif($Statistic['persediaanAkhir']>=$Statistic['persediaanMax']){
            $persediaanTurun        = 0;
        }else{
            $persediaanTurun            = ($Statistic['persediaanMax'] - $Statistic['persediaanAkhir'])/($Statistic['persediaanMax'] - $Statistic['persediaanMin']);
        }

        if($Statistic['persediaanAkhir']<=$Statistic['persediaanMin']){
            $persediaanNaik        = 0;
        }elseif($Statistic['persediaanAkhir']>=$Statistic['persediaanMax']){
            $persediaanNaik        = 1;
        }else{
            $persediaanNaik             = ($Statistic['persediaanAkhir'] - $Statistic['persediaanMin'])/($Statistic['persediaanMax'] - $Statistic['persediaanMin']);
        }
    //t=turun, n=naik
    //urutan = permintaan, persediaan, beli
    //mis: tnt = permintaan:turun, persediaan=naik, beli=turun

        //R1
        if($permintaanTurun<=$persediaanNaik){
            $tnt = $Statistic['beliMax'] - ($permintaanTurun * ($Statistic['beliMax']-$Statistic['beliMin']));
            $ztnt= $tnt * $permintaanTurun;
            $min1= $permintaanTurun;
        }
        if($permintaanTurun>$persediaanNaik){
            $tnt = $Statistic['beliMax'] - ($persediaanNaik * ($Statistic['beliMax']-$Statistic['beliMin']));
            $ztnt= $tnt * $persediaanNaik;
            $min1= $persediaanNaik;
        }

        // dd($permintaanTurun);
        //R2
        if($permintaanTurun<=$persediaanTurun){
            $ttt = $Statistic['beliMax'] - ($permintaanTurun * ($Statistic['beliMax']-$Statistic['beliMin']));
            $zttt= $ttt * $permintaanTurun;
            $min2= $permintaanTurun;
        }
        if($permintaanTurun>$persediaanTurun){
            $ttt = $Statistic['beliMax'] - ($persediaanTurun * ($Statistic['beliMax']-$Statistic['beliMin']));
            $zttt= $ttt * $persediaanTurun;
            $min2= $persediaanTurun;
        }

        //R3
        if($permintaanNaik<=$persediaanNaik){
            $nnn = $Statistic['beliMin'] + ($permintaanNaik * ($Statistic['beliMax']-$Statistic['beliMin']));
            $znnn= $nnn * $permintaanNaik;
            $min3= $permintaanNaik;
        }
        if($permintaanNaik>$persediaanNaik){
            $nnn = $Statistic['beliMin'] + ($persediaanNaik * ($Statistic['beliMax']-$Statistic['beliMin']));
            $znnn= $nnn * $persediaanNaik;
            $min3= $persediaanNaik;
        }

        //R4
        if($permintaanNaik<=$persediaanTurun){
            $ntn = $Statistic['beliMin'] + ($permintaanNaik * ($Statistic['beliMax']-$Statistic['beliMin']));
            $zntn= $ntn * $permintaanNaik;
            $min4= $permintaanNaik;
        }
        if($permintaanNaik>$persediaanTurun){
            $ntn = $Statistic['beliMin'] + ($persediaanTurun * ($Statistic['beliMax']-$Statistic['beliMin']));
            $zntn= $ntn * $persediaanTurun;
            $min4= $persediaanTurun;
        }
        

        $jumlahBeli                 = ($ztnt + $zttt + $znnn + $zntn) / ($min1+$min2+$min3+$min4);
        
        $data                       = ['jumlahBeli' => $jumlahBeli ];
        $user                       = Statistic::where('permintaanMax', 5000)->update($data);

        $this->page_datas->mintaMax         = $Statistic['permintaanMax'];
        $this->page_datas->mintaMin         = $Statistic['permintaanMin'];
        $this->page_datas->stokMax          = $Statistic['persediaanMax'];
        $this->page_datas->stokMin          = $Statistic['persediaanMin'];
        $this->page_datas->beliMax          = $Statistic['beliMax'];
        $this->page_datas->beliMin          = $Statistic['beliMin'];
        $this->page_datas->dataMintaAkhir   = $Statistic['permintaanAkhir'];
        $this->page_datas->dataStokAkhir    = $Statistic['persediaanAkhir'];
        $this->page_datas->sedia            = $jumlahBeli;


        //generate view
        $view_source                            = $this->view_source_root . '.viewStatistic';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
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
    public function edit($id=null)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id=null)
    {
        //get input
        $input                              = Input::only('password', 'new_password', 'conf_password');
        $Statistic                                = Statistic::where('username', session('key'))
                                                        ->get()['0']['attributes'];
                                                        
        if($input['password'] != $Statistic['password'] || $input['new_password'] != $input['conf_password']){
            $this->page_attributes->msg             = 'Password Tidak Sesuai';
            return $this->generateView('backend.pages.crm.statistic.viewStatistic', Request::route()->getName());
        }

        $data                                   = ['password' => $input['new_password'] ];

        $Statistic                                = Statistic::where('username', session('key'))->update($data);
        
        $this->page_attributes->msg             = 'Data telah disimpan';        

        return $this->generateRedirect(route('backend.dashboard'));
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
