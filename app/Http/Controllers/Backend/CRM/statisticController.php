<?php

namespace App\Http\Controllers\Backend\CRM;

use App\Http\Controllers\baseController;

use App\Models\Statistic;
use App\Models\Transaksi;
use App\Models\Inventory;
use Request, Input, URL, DB;
use Carbon\Carbon;

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


    //Dalam fungsi ini program akan mentotal initial stock perhari meskipun jumlah barang sebenarnya
    //sama, dikarenakan program ini menggunakan sistem sewa bukan penjualan.
    //contoh: stok sesungguhnya hanya 10, namun akan dihitung menjadi 300/310 dan hasilnya 
    //di rata-rata dalam hari
    public function index()
    {
        if(session('key')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('backend.dashboard'));
            
        }

        $barang                         = Transaksi::where('barang', '!=', null)
                                                    ->get();
                                                    
        $bulanAkhir = Carbon::today()->toDateString();
        //dd($bulanAkhir);

        //menghitung jumlah total setiap barang
        $namaBarang = [];
        $totalJenis = count($namaBarang);
        $default = null;
        foreach ($barang as $objek){
            foreach ($objek['attributes']['barang'] as $item){
                //menghitung jumlah permintaan tertinggi dari setiap barang berdasarkan H-1 bulan terakhir
                if((int)substr($item['tanggal-keluar'], 5,2) == (int)substr($bulanAkhir, 5,2) - 1){
                    $mark=0;
                    if($namaBarang == null){
                        array_push($namaBarang, [$item['nama'], (int)$item['jumlah']*(int)$item['lama-sewa'], (int)$item['jumlah']*(int)$item['lama-sewa']]);
                        $mark=1;
                    }

                    if($mark==0){
                        for($i=0;$i<=$totalJenis;$i++){
                            //jika ada barang baru akn di buat arraynya
                            if($namaBarang[$i]['0'] != $item['nama']){
                                if($i == $totalJenis){
                                    array_push($namaBarang, [$item['nama'], (int)$item['jumlah']*(int)$item['lama-sewa'], (int)$item['jumlah']*(int)$item['lama-sewa']]);
                                }

                            //menjumlah barang yang memiliki nama sama
                            }else{
                                $totalJumlah = $namaBarang[$i]['2'] + (int)$item['jumlah']*(int)$item['lama-sewa'];
                                $namaBarang[$i]['2'] = $totalJumlah;
                            }
                        }
                    }
                //jika dalam H-1 bulan tidak ada permintaan akan diambil nama secara acak
                }else{
                    $default = $item['nama'];
                }
            }
        }
        $divZero = 0;
        if($default==null){
            $divZero                                = 0;
            $this->page_datas->divZero              = $divZero;
            $this->page_attributes->msg             = null;
            return $this->generateView('backend.pages.crm.statistic.noData', Request::route()->getName());
        }

        if($namaBarang == null){
            $namaBarang[0][0] = $default;
        }else{
            //melakukan sorting jumlah permintaan tertinggi dari seluruh mainan
            for($ia=count($namaBarang)-1;$ia>0;$ia--){
                for($i=count($namaBarang)-1;$i>0;$i--){
                    if($namaBarang[$i-1][2]<$namaBarang[$i][2]){
                        $z = $namaBarang[$i-1];
                        $namaBarang[$i-1] = $namaBarang[$i];
                        $namaBarang[$i] = $z;
                    }
                }
            }
        }

        $jenis = $namaBarang[0][0];

        //dd($namaBarang);

        $transaksi                      = Transaksi::where('barang.' .$jenis. '.tanggal-keluar', '!=', null)
                                                    ->orderBy('barang.' .$jenis. '.tanggal-keluar', 'asc')
                                                    ->get();
                                                 //dd($transaksi);

        $inventory                      = Inventory::where('barang.' .$jenis. '.currentStock', '!=', null)
                                                    ->orderBy('tanggal', 'asc')
                                                    ->get();
        $sumInventory       = count($inventory);
        $sumTransaksi       = count($transaksi);
        //dd($inventory[$sumInventory-1]);

//permintaan Max and Min
        $last='00';
        $jumlah=0;
        $data = [];
        foreach($transaksi as $sepeda){
            if(substr($sepeda['attributes']['barang'][$jenis]['tanggal-keluar'], 0,4) == substr($bulanAkhir, 0,4)){
                if(substr($sepeda['attributes']['barang'][$jenis]['tanggal-keluar'], 5,2) == $last){
                    $jumlah = (int)$sepeda['attributes']['barang'][$jenis]['jumlah'] + $jumlah;
                    // dd(substr($sepeda['attributes']['barang'][$jenis]['tanggal-keluar'],5,2));
                }
                else{
                    if($jumlah!=0){
                        array_push($data, $jumlah);
                    }
                    $jumlah = 0;
                    $last = substr($sepeda['attributes']['barang'][$jenis]['tanggal-keluar'], 5,2);
                    $jumlah = (int)$sepeda['attributes']['barang'][$jenis]['jumlah'] + $jumlah;
                }
            }
        }
        array_push($data, $jumlah);
        sort($data);
        $hasilPermintaan = count($data);
        
//total permintaanAkhir
        $mintaLast = 0;
        foreach($transaksi as $request){
            if((int)substr($request['attributes']['barang'][$jenis]['tanggal-keluar'], 5,2) == (int)substr($bulanAkhir, 5,2)){
                $mintaLast = (int)$request['attributes']['barang'][$jenis]['jumlah'] + $mintaLast;
            }
        }

//persediaanMax and min
        $intialLast = $inventory['0']['attributes']['barang'][$jenis]['initialStock'];
        $lastMonth = null;
        $simpan=[];

        //menyimpan tanggal dari setiap object inventory dalam array $isiCurrent;
        $isiCurrent =[];
        foreach ($inventory as $isi) {
            array_push($isiCurrent, [(int)substr($isi['tanggal'], 0,4), (int)substr($isi['tanggal'], 5,2), (int)substr($isi['tanggal'], 8,2), (int)$isi['barang'][$jenis]['currentStock'] ]);
        }

        //dd($isiCurrent);
        foreach($inventory as $current){
            $month = substr($current['tanggal'], 5,2);
            $sum=0;

            //mengolah data hanya tahun terakhir
            if(substr($current['tanggal'], 0, 4) == substr($inventory[$sumInventory-1]['attributes']['tanggal'], 0, 4)){
                //mnegolah data tiap bulan
                if($month != $lastMonth){
                    if($month == '01' || $month == '03' || $month == '05' || $month == '07' || $month == '08' || $month == '10' || $month == '12'){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=31;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock berbeda
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent[$a]['1'] == $month){
                                    if($isiCurrent[$a]['2'] == $date){
                                        $sum          = $sum + $isiCurrent[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $sum += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $sum += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                        $lastMonth = $month;
                        array_push($simpan, $sum);
                    }

                    if($month == '04' || $month == '06' || $month == '09' || $month == '11'){
                    //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=30;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock yang akan diambil
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent[$a]['1'] == $month){
                                    if($isiCurrent[$a]['2'] == $date){
                                        $sum          = $sum + $isiCurrent[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $sum += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $sum += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                        $lastMonth = $month;
                        array_push($simpan, $sum);
                    }
                    

                    if($month == '02'){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=28;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock yang akan diambil
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent[$a]['1'] == $month){
                                    if($isiCurrent[$a]['2'] == $date){
                                        $sum          = $sum + $isiCurrent[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $sum += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $sum += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                        $lastMonth = $month;
                        array_push($simpan, $sum);
                    }
                }
            }
        }
        sort($simpan);
        $b = count($simpan);
        // dd($simpan);


//total persediaanAkhir
        $jumJenis = Inventory::where('barang.'.$jenis.'.nama', $jenis)
                                    ->get();
        $jumlahJenis = count($jumJenis);

        $intialLast = null;
        $sumStock=0;
        $stokLast = 0;
        $bulanTerakhir  = (int)substr($bulanAkhir, 5,2);
        $initialAkhir = null;
        $tanda=0;
        $bulannHasil = 0;

        //mencari bulan terakhir terjadinya transaksi(initial bertambah / adanya barang keluar)
        for($bulann = $bulanTerakhir; $bulann>0;$bulann--){
            foreach ($inventory as $stockBefore) {
                if($stockBefore['barang'][$jenis]['nama'] == $jenis){
                    //mencocokkan dan menyimpan bulan barang di inventory yang paling dekat dengan bulan saat ini, maksimal H-1 bulan
                    if((int)substr($stockBefore['tanggal'], 5,2) == $bulann-1){
                        $bulannHasil = $bulann-1;
                        $bulann=0;
                        $tanda=1;
                    }
                }
            }
        }

        //menjumlah banyaknya transaksi dalam bulan tersebut
        foreach ($inventory as $stockBefore1) {
            if((int)substr($stockBefore1['tanggal'], 5,2) == $bulannHasil){
                $sumStock+= 1;
            }
        }

        //mendapatkan initial stock terakhir pada bulan tersebut
        foreach ($inventory as $stockBefore2) {
            if($stockBefore2['barang'][$jenis]['nama'] == $jenis){
                if((int)substr($stockBefore2['tanggal'], 5,2) == $bulannHasil){
                    for($i=0;$i<=$sumStock;$i++){
                        if($i==$sumStock){
                            $initialAkhir = $stockBefore2['barang'][$jenis]['initialStock'];
                        }
                    }
                }
            }
        }

        //mendapatkan sisa persediaan bulan terakhir
        foreach($inventory as $stockLast){
            if($intialLast == null){
                $intialLast = $initialAkhir;
            }
            if($stockLast['barang'][$jenis]['nama'] == $jenis){
                if((int)substr($stockLast['tanggal'], 5,2) == $bulanTerakhir){
                    if($bulanTerakhir==1 || $bulanTerakhir==3 || $bulanTerakhir==5 || $bulanTerakhir==7 || $bulanTerakhir==8 || $bulanTerakhir==10 || $bulanTerakhir==12){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=31;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock berbeda
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent[$a]['1'] == $bulanTerakhir){
                                    if($isiCurrent[$a]['2'] == $date){
                                        $stokLast     = $stokLast + $isiCurrent[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $stokLast += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $stokLast += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                    }
                
                    if($bulanTerakhir==4 || $bulanTerakhir==6 || $bulanTerakhir==9 || $bulanTerakhir==11){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=30;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock berbeda
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent[$a]['1'] == $bulanTerakhir){
                                    if($isiCurrent[$a]['2'] == $date){
                                        $stokLast     = $stokLast + $isiCurrent[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $stokLast += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $stokLast += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                    }
                
                    if($bulanTerakhir==2){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=28;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock berbeda
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent[$a]['1'] == $bulanTerakhir){
                                    if($isiCurrent[$a]['2'] == $date){
                                        $stokLast     = $stokLast + $isiCurrent[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $stokLast += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $stokLast += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

//Jumlah initial stok terbanyak dan terendah
        $intialLast = $inventory['0']['attributes']['barang'][$jenis]['initialStock'];
        $lastMonth = null;
        $init=[];

        //menyimpan tanggal dari setiap object inventory dalam array $isiCurrent2;
        $isiCurrent2 =[];
        foreach ($inventory as $isi) {
            array_push($isiCurrent2, [(int)substr($isi['tanggal'], 0,4), (int)substr($isi['tanggal'], 5,2), (int)substr($isi['tanggal'], 8,2), (int)$isi['barang'][$jenis]['initialStock'] ]);
        }

        
        foreach($inventory as $current){
            $month = substr($current['tanggal'], 5,2);
            $sum=0;

            //mengolah data hanya tahun terakhir
            if(substr($current['tanggal'], 0, 4) == substr($inventory[$sumInventory-1]['attributes']['tanggal'], 0, 4)){
                //mnegolah data tiap bulan
                if($month != $lastMonth){
                    if($month == '01' || $month == '03' || $month == '05' || $month == '07' || $month == '08' || $month == '10' || $month == '12'){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=31;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock berbeda
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent2[$a]['1'] == $month){
                                    if($isiCurrent2[$a]['2'] == $date){
                                        $sum          = $sum + $isiCurrent2[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $sum += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $sum += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                        $lastMonth = $month;
                        array_push($init, $sum);
                    }

                    if($month == '04' || $month == '06' || $month == '09' || $month == '11'){
                    //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=30;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock yang akan diambil
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent2[$a]['1'] == $month){
                                    if($isiCurrent2[$a]['2'] == $date){
                                        $sum          = $sum + $isiCurrent2[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $sum += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $sum += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                        $lastMonth = $month;
                        array_push($init, $sum);
                    }
                    

                    if($month == '02'){
                        //mengambil current stock setiap hari selama 1 bulan
                        for($date=1;$date<=28;$date++){
                            $flag=0;
                            //membandingkan tanggal di inventory dengan $date karena current stock yang akan diambil
                            for($a=0;$a<$sumInventory;$a++){
                                if($isiCurrent2[$a]['1'] == $month){
                                    if($isiCurrent2[$a]['2'] == $date){
                                        $sum          = $sum + $isiCurrent2[$a]['3'];
                                        $intialLast   = $current['barang'][$jenis]['initialStock'];
                                        $flag         = 1;
                                    }else{
                                        if($flag==0){
                                            if($a+1 == $sumInventory){
                                                $sum += (int)$intialLast;
                                            }
                                        }
                                    }
                                }else{
                                    if($flag==0){
                                        if($a+1 == $sumInventory){
                                            $sum += (int)$intialLast;
                                        }
                                    }
                                }
                            }
                        }
                        $lastMonth = $month;
                        array_push($init, $sum);
                    }
                }
            }
        }
        sort($init);
        $initialSum = count($init);

        $Statistic                      = new Statistic;
        $Statistic['jenis']             = $jenis;
        $Statistic['jenis']             = $jenis;
        $Statistic['permintaanMax']     = $data[$hasilPermintaan-1];
        $Statistic['permintaanMin']     = $data[0];
        $Statistic['persediaanMax']     = $simpan[$b-1];
        $Statistic['persediaanMin']     = $simpan[0];
        $Statistic['beliMax']           = $init[$initialSum-1];
        $Statistic['beliMin']           = $init[0];
        $Statistic['permintaanAkhir']   = $mintaLast;
        $Statistic['persediaanAkhir']   = $stokLast;
        $Statistic['jumlahBeli']        = null;
        $Statistic->save();
        
        //menghindari pembagian dengan nol
        if($Statistic['permintaanMax']==$Statistic['permintaanMin'] || $Statistic['persediaanMax']==$Statistic['persediaanMin']){
            $divZero                                = 1;
            $this->page_datas->divZero              = $divZero;
            $this->page_attributes->msg             = null;
            return $this->generateView('backend.pages.crm.statistic.noData', Request::route()->getName());
        }


        if($Statistic['permintaanAkhir']<$Statistic['permintaanMin']){
            $permintaanTurun        = 1;
        }elseif($Statistic['permintaanAkhir']>$Statistic['permintaanMax']){
            $permintaanTurun        = 0;
        }else{
            $permintaanTurun            = ($Statistic['permintaanMax'] - $Statistic['permintaanAkhir'])/($Statistic['permintaanMax'] - $Statistic['permintaanMin']);
        }

        if($Statistic['permintaanAkhir']<$Statistic['permintaanMin']){
            $permintaanNaik        = 0;
        }elseif($Statistic['permintaanAkhir']>$Statistic['permintaanMax']){
            $permintaanNaik        = 1;
        }else{
            $permintaanNaik             = ($Statistic['permintaanAkhir'] - $Statistic['permintaanMin'])/($Statistic['permintaanMax'] - $Statistic['permintaanMin']);
        }

        if($Statistic['persediaanAkhir']<$Statistic['persediaanMin']){
            $persediaanTurun        = 1;
        }elseif($Statistic['persediaanAkhir']>$Statistic['persediaanMax']){
            $persediaanTurun        = 0;
        }else{
            $persediaanTurun            = ($Statistic['persediaanMax'] - $Statistic['persediaanAkhir'])/($Statistic['persediaanMax'] - $Statistic['persediaanMin']);
        }

        if($Statistic['persediaanAkhir']<$Statistic['persediaanMin']){
            $persediaanNaik        = 0;
        }elseif($Statistic['persediaanAkhir']>$Statistic['persediaanMax']){
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

        $this->page_datas->jenis            = $Statistic['jenis'];
        $this->page_datas->mintaMax         = $Statistic['permintaanMax'];
        $this->page_datas->mintaMin         = $Statistic['permintaanMin'];
        $this->page_datas->stokMax          = $Statistic['persediaanMax'];
        $this->page_datas->stokMin          = $Statistic['persediaanMin'];
        $this->page_datas->beliMax          = $Statistic['beliMax'];
        $this->page_datas->beliMin          = $Statistic['beliMin'];
        $this->page_datas->dataMintaAkhir   = $Statistic['permintaanAkhir'];
        $this->page_datas->dataStokAkhir    = $Statistic['persediaanAkhir'];
        $this->page_datas->sedia            = $jumlahBeli/30;


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
