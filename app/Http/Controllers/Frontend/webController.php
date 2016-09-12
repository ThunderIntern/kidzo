<?php

namespace App\Http\Controllers\Frontend;

use Request;
use App\Http\Controllers\Functions\email;

use Requests;
use App\Http\Controllers\BaseController;
use App\Models\Subscriber;
use App\Models\Faq;
use App\Models\WebsiteConfig;
use App\Models\Version;
use App\Models\User;
use App\Models\Comment;
use App\Models\emailTime;
use App\Models\Barang;
use App\Models\Inventory;
use App\Models\Transaksi;
use Input, URL, Hash;
use Carbon\Carbon;

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

    public function emailTime($id)
    {
        $email                         = new email;
        $time                          = emailTime::find($id);
        $now=Carbon::now();
        $user                          = User::where('email', $time['email'])
                                            ->first()['attributes'];
        
        if($time['created_at']->addHour() >= $now){
            $email -> password('Password Anda', 'Silahkan masukkan password anda : '. $user['password'], $time['email'], $this->page_datas->datas);
            $this->page_attributes->msg             = 'Silahkan login';
            return $this->generateRedirect(route('signuped'));
        }else{
            $email -> maaf('Expired', 'Maaf anda telah melawati batas waktu yang ditentukan, cobalah kembali.', $user['email'], $this->page_datas->datas);
            $this->page_attributes->msg             = 'Silahkan coba lagi';
            return $this->generateRedirect(route('forgot'));
        }
    }


    public function verification()
    {
        $time                               = new emailTime; 
        $input                              = Input::only('username', 'email');
        
        // Input tidak ada dlm database
        $user                                = User::where('username', $input['username'])
                                                        ->count();        
        if($user==0){
            $this->page_attributes->msg             = 'Username Tidak Ditemukan';
            return $this->generateView('frontend.pages.forgot', Request::route()->getName());
        }
        
        //Input ada
        $user                                = User::where('username', $input['username'])
                                                        ->get()['0']['attributes'];
        if($user['email']!=$input['email']){
            $this->page_attributes->msg             = 'Username / Email Tidak Sesuai';
            return $this->generateRedirect(route('forgot'));
        }


        

        $time['judul']            = 'Verification';
        $time['content']          = 'Waktu verifikasi anda hanya satu jam!';
        $time['email']            = $user['email'];
        $time->save();
        
        $email = new email;
        $email -> forgot($time['judul'], $time['content'], $user['email'], $this->page_datas->datas, $time['id']);
        
        $this->page_attributes->msg             = 'Data telah disimpan';        

        return $this->generateRedirect(route('signuped'));
    }

    public function forgot()
    {
        //generate view
        $view_source                            = $this->view_source_root . '.forgot';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);   
    }

    public function profile($id = null)
    {
        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('login'));
        }
        $this->page_datas->komen                = Comment::orderBy('created_at','desc')
                                                        ->get();
        $this->page_datas->id                   = Comment::where('username', session('akun'))
                                                        ->get()['0']['attributes']['rating'];


        return $this->generateView('frontend.pages.profile', Request::route()->getName());
    }

    public function updatePassword(){                                              
        //get input
        $input                              = Input::only('password', 'new_password', 'conf_password');
        $user                                = User::where('username', session('akun'))
                                                        ->get()['0']['attributes'];
                                                        
        if($input['password'] != $user['password'] || $input['new_password'] != $input['conf_password']){
            $this->page_attributes->msg             = 'Password Tidak Sesuai';
            return $this->generateView('frontend.pages.signup', Request::route()->getName());
        }

        $data                                   = ['password' => $input['new_password'] ];

        $user                                = User::where('username', session('akun'))->update($data);
        
        $this->page_attributes->msg             = 'Data telah disimpan';        

        return $this->generateRedirect(route('home'));
    }

    public function password(){

        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }


        //generate view
        $view_source                            = $this->view_source_root . '.password';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);    
    }

    public function updateSetting(){                                              
        //get input
        $input                                  = Input::only('username','nama','no','alamat');
        $data                                   = ['username' => $input['username'], 
                                                    'name' => $input['nama'],
                                                    'phone' => $input['no'],
                                                    'address' => $input['alamat']
                                                    ];
        $user                                = User::where('username', session('akun'))->update($data);
        session(['akun' => $input['username']]);        

        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect(route('home'));
    }

    public function setting(){

        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }

        $user                                = User::where('username', session('akun'))
                                                        ->get()['0']['attributes'];
                                                        

        $this->page_datas->email               = $user['email'];
        $this->page_datas->username            = $user['username'];
        $this->page_datas->password            = $user['password'];
        $this->page_datas->name                = $user['name'];
        $this->page_datas->phone               = $user['phone'];
        $this->page_datas->address             = $user['address'];
        
        //generate view
        $view_source                            = $this->view_source_root . '.setting';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function prosesRating($id){

        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }
        
        //get input
        $data                                   = ['rating' => $id];
        $updateRating                           = Comment::where('username', session('akun'))->update($data);


        $this->page_attributes->msg             = 'Data telah disimpan';
                
        return $this->generateRedirect(route('profile'));
    }

    public function prosesKomen(){

        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }
        $comment                             = new Comment;
        $user                                = User::where('username', session('akun'))
                                                        ->get()['0']['attributes'];

        $updateRating                        = Comment::where('email', $user['email'])
                                                        ->get()['0']['attributes'];
        //get input
        $input                                  = Input::only('komen_mobile');

        
        if($updateRating['content']['isi']==null && $updateRating['rating']!=null || $updateRating['content']['isi']==null && $updateRating['rating']==null){
            $data                                   = ['content.isi' => $input['komen_mobile']];
            $user                                   = Comment::where('username', session('akun'))->update($data);
        }else{
            //save data
            $comment->content                       = ['isi' => $input['komen_mobile'], 'status'=> '0'];
            $comment->username                      = $user['username'];
            $comment->email                         = $user['email'];
            $comment->rating                        = $updateRating['rating'];
            $comment->save();
        }
        $this->errors                           = $comment->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';
        
        return $this->generateRedirect(route('profile'));
    }


    public function home()
    {
        $WebsiteConfig                          = new WebsiteConfig;
        $app_version                            = getenv('APP_VERSION');

        //slider
        $datas['slider']                       = $WebsiteConfig::where('version.version_name',$app_version)
                                                    ->where('kategori','slider')
                                                    ->orderBy('published_at','desc')
                                                    ->first()['attributes']['config'];

        //config
        $datas['config']                        = $WebsiteConfig::where('version.version_name',$app_version)
                                                    ->where('kategori','contact')
                                                    ->orderBy('published_at','desc')
                                                    ->first()['attributes']['config'];

        $this->page_datas->datas                = $datas;

        return $this->generateView('frontend.pages.home', Request::route()->getName());
    }

    public function about($category = null, $sub_category = null)
    {
        //get data
        $faq                                    = new Faq;
        $app_version                            = getenv('APP_VERSION');
        $datas                                  = null;

        // //get kategori
        // $datas['kategori']                      = $faq::where('version.version_name', $app_version)
        //                                             ->groupBy('kategori')
        //                                             ->get();

        // //get subkategori
        // $datas['sub_kategori']                  = $faq::where('version.version_name', $app_version)
        //                                             ->where('kategori', $category)
        //                                             ->groupBy('sub_kategori')
        //                                             ->get();

        $query[]                                =   ['$group' => [
                                                        '_id'           =>  [
                                                                                'kategori'     => '$kategori',
                                                                                'sub_kategori' => '$sub_kategori',
                                                                            ],
                                                        'faq'           =>  [
                                                                                '$push'         =>   [
                                                                                                        'no_urut'       => '$no_urut',
                                                                                                        'pertanyaan'    => '$pertanyaan',
                                                                                                        'jawaban'       => '$jawaban',
                                                                                                    ],
                                                                            ]                                                                          
                                                    ]];
        $query[]                                =   ['$group' => [
                                                        '_id'           =>  '$_id.kategori',
                                                        'content'       =>  [
                                                                                '$addToSet'    =>   [
                                                                                                        'sub_kategori'  => '$_id.sub_kategori',
                                                                                                        'faq'           => '$faq'
                                                                                                    ]
                                                                            ]
                                                    ]]; 

        $datas                                  = $faq::raw(function($collection) use ($query) { 
                                                        return $collection->aggregate($query); 
                                                    });

        $this->page_datas->datas                = json_decode(json_encode($datas),true);

        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_source_root . '.about';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function katalog(){
        $katalog                                = Barang::all();
        //dd($katalog);

        $this->page_datas->datas                = $katalog;

        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_source_root . '.katalog';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function deskripsiKatalog($id){
        $katalog                                = Barang::find($id);
        $now                                    = Carbon::today();
        $bulan                                  = $now->month;
        //dd($bulan);
        $inven                                  = Inventory::get();
        //dd($ibulan);
        $array                                  = null;
        foreach ($inven as $key => $tory) {
            $itanggal = Carbon::parse($tory['tanggal']);
            $ibulan = $itanggal->month;
            $string = $itanggal->toDateString();
            //dd($string);
            if($ibulan == $bulan){
                $array[$key] = ['inventory' => $tory , 'tanggal' => $string];
            }
        }
        //dd($array);

        $data = ['id' => $katalog['id'], 'barang' => $katalog , 'inven' => $array];

        //dd($data);

        $this->page_datas->datas                = $data;
        //dd($this->page_datas->datas);

        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_source_root . '.deskripsiKatalog';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function chart(){
        if(is_null(session('akun'))){
            $this->page_attributes->msg             = 'Silahkan login terlebih dahulu';
            return $this->generateRedirect(route('signuped'));
        }
        //dd(session(['key']));
        $chart                                  = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->first()['attributes']['barang'];
        //dd($chart);

        $this->page_datas->datas                = $chart;
        //dd($this->page_datas->datas);

        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_source_root . '.chart';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function addChart($id){
        if(is_null(session('akun'))){
            $this->page_attributes->msg             = 'Silahkan login terlebih dahulu';
            return $this->generateRedirect(route('signuped'));
        }
        //dd(session(['akun']));
        $input                                  = Input::only('hari','tanggalk','jumlah','sign');
        //dd($input);
        if($input['jumlah'] == ""){
            $this->page_attributes->msg             = 'Masukkan jumlah yang disewa';
            return $this->generateRedirect(route('deskripsiKatalog' , $id));
        }

        if($input['hari'] == ""){
            $this->page_attributes->msg             = 'Masukkan lama sewa';
            return $this->generateRedirect(route('deskripsiKatalog' , $id));
        }

        if($input['tanggalk'] == ""){
            $this->page_attributes->msg             = 'Masukkan tanggal sewa';
            return $this->generateRedirect(route('deskripsiKatalog' , $id));
        }
        $barang                                  = Barang::where('_id', $id)
                                                         ->first()['attributes'];
        $new                                     = new Transaksi;
        //dd($barang);
        $lama                                    = null;
        $nama                                    = $barang['nama'];
        $harga                                   = $barang['harga'];
        $jumlah                                  = $input['jumlah'];
        $url                                     = $barang['foto']['url'];
        $hari                                    = $input['hari'];
        $tanggalk                                = $input['tanggalk'];
        
        if($hari == 1){
            $lama = Carbon::parse($tanggalk)->addDays(2);
            //dd($lama);
        }
        elseif($hari == 2){
            $lama = Carbon::parse($tanggalk)->addDays(3);
            //dd($lama);
        }
        elseif($hari == 3){
            $lama = Carbon::parse($tanggalk)->addDays(4);
            //dd($lama);
        }
        elseif($hari == 4){
            $lama = Carbon::parse($tanggalk)->addDays(5);
            //dd($lama);
        }
        elseif($hari == 5){
            $lama = Carbon::parse($tanggalk)->addDays(6);
            //dd($lama);
        }
        elseif($hari == 6){
            $lama = Carbon::parse($tanggalk)->addDays(7);
            //dd($lama);
        }
        elseif($hari == 7){
            $lama = Carbon::parse($tanggalk)->addWeeks(1)->addDays(1);
            //dd($lama);
        }
        elseif($hari == 8){
            $lama = Carbon::parse($tanggalk)->addWeeks(2)->addDays(1);
            //dd($lama);
        }
        elseif($hari == 9){
            $lama = Carbon::parse($tanggalk)->addMonths(1)->addDays(1);
            //dd($lama);
        }
        $tanggalm = $lama->toDateString();
        //dd($tanggalm);
        $array                                   = ['nama' => $nama, 'harga' => $harga ,'jumlah' => $jumlah, 'url' => $url, 'lama-sewa' => $hari                                        ,'tanggal-keluar' => $tanggalk, 'tanggal-masuk' => $tanggalm];
        //dd($array);
        //dd($nama);
        //dd($barang);
        $inven                                  = Inventory::where('tanggal', $tanggalk)
                                                           ->get();
        //dd($inven);
        $chart                                  = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->first()['attributes']['barang'];
        $cek                                    = Transaksi::where('username',session('akun'))
                                                           ->where('status','pending')
                                                           ->first()['attributes']['barang'];

        if(is_null($chart)){
            if(is_null($cek)){
                $brg[$nama]                       = $array;
            }
            else{
                $brg[$nama]                       = $array;
                $new->username                    = session('akun');
                $new->nama                        = null;
                $new->alamat                      = null;
                $new->nomor                       = null;
                $new->barang                      = $brg;
                $new->nota                        = null;
                $new->status                      = 'chart';
                $new->save();
            }
        }
        else{
            foreach ($chart as $key => $data) {
                //dd($key);
            $brg[$key] = $data;
            }
        
            $brg[$nama] = $array;
        }
        //dd($array);
        
        Transaksi::where('username',session('akun'))
                ->where('status','chart')
                ->update(['barang' => $brg]);
        //dd($this->page_datas->datas);
        //$chart->save();
        if($input['sign'] == 'chart'){
        $this->page_attributes->msg             = 'Data telah dihapus';
        return $this->generateRedirect(route('chart'));
        }

        else{
            $this->page_attributes->msg             = 'Data telah dihapus';
            return $this->generateRedirect(route('pembelian'));
        }
    }

    public function deleteChart($nama){
        if(is_null(session('akun'))){
            $this->page_attributes->msg             = 'Silahkan login terlebih dahulu';
            return $this->generateRedirect(route('signuped'));
        }
        //dd(session(['key']));
        $chart                                  = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->first()['attributes'];
        //dd($chart);
        $brg = null;
        foreach ($chart['barang'] as $key => $data) {
            //dd($data);
            if($data['nama']!=$nama){
                $brg[$key] = $data;
            }
        }

        //dd($brg);

        Transaksi::where('username',session('akun'))
                ->where('status','chart')
                ->update(['barang' => $brg]);
        //dd($this->page_datas->datas);
        //$chart->save();
        $this->page_attributes->msg             = 'Data telah dihapus';
            return $this->generateRedirect(route('chart'));
    }

    public function pembelian(){
        $view_source                            = $this->view_source_root . '.isiDataPembelian';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function checkOut(){
        Transaksi::where('username',session('akun'))
                 ->where('status','chart')
                 ->update(['status' => 'pending']);

        $input                                  = Input::only('nama','alamat','no');

        Transaksi::where('username',session('akun'))
                 ->where('status','pending')
                 ->update(['nama' => $input['nama'] , 'alamat' => $input['alamat'] , 'nomor' => $input['no']]);

        $transaksi                              = Transaksi::where('username',session('akun'))
                                                           ->where('status','pending')
                                                           ->get();

        $inven                                  = Inventory::get();



        $this->page_attributes->msg             = 'Data telah dihapus';
        return $this->generateRedirect(route('detailCheckOut')); 
    }

    public function detailCheckOut(){
        $check                                  = Transaksi::where('username',session('akun'))
                                                           ->where('status','pending')
                                                           ->get();
        $total = null;

        foreach ($check as $key => $trans) {
            foreach ($trans['barang'] as $key2 => $barang) {
                $inven                                  = Inventory::get();
                $tes1 = Carbon::parse($barang['tanggal-masuk']);
                $tes2 = Carbon::parse($barang['tanggal-keluar']);
                if($tes1->month > $tes2->month){
                    $var1 = $tes1->day + $tes2->daysInMonth;
                    $var2 = $tes2->day;
                    $tes = $var1 - $var2;
                    //dd($tes);                                                      
                }
                else{
                    $tes = $tes1->day - $tes2->day;
                }
                $var=0;
                foreach ($inven as $key => $tory) {
                    if($tes2<=$tes1){
                        $tanggal = $tes2->toDateString();
                        //dd($tanggal);
                        if($tory['tanggal'] == $tanggal){
                            foreach ($tory['barang'] as $key1 => $value) {
                            //dd($value);
                                
                                    if($barang['nama'] == $value['nama']){
                                        Inventory::where('tanggal' , $tanggal)
                                                 ->where('barang.'.$key1.'.nama'  , $barang['nama'])
                                                 ->update(['barang.'.$key1.'.currentStock' => (int)$value['currentStock'] - (int)$barang['jumlah']]);
                                        //dd($cek);
                                    }
                                }
                        $tes2->addDays(1);
                        $var += 1;
                        }
                    }
                }
                //dd($tanggal);
                for ($i=$var; $i <= $tes; $i++) {
                    $date = $tes2->toDateString();
                        foreach ($trans['barang'] as $key3 => $br) {
                            if($br['nama'] == $barang['nama']){
                                $brg[$key3] = ['nama' => $br['nama'] , 
                                               'initialStock' => '5',
                                               'currentStock' => 5 - (int)$br['jumlah'],
                                               'brokenStock' => '0', 
                                               'outStock' => [$trans['username'] => 
                                                                        ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                         'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $br['lama-sewa'], 'jumlah' => $br['jumlah']], 
                                                                         'tanggal-sewa' => ['tanggal-keluar' => $br['tanggal-keluar'], 'tanggal-masuk' => $br['tanggal-masuk']
                                                                                ]
                                                                            ]
                                                                        ]
                                                                    ];
                            }
                            else{
                                $brg[$key3] = ['nama' => $br['nama'] , 
                                               'initialStock' => '5',
                                               'currentStock' => '5',
                                               'brokenStock' => '0', 
                                               'outStock' => [$trans['username'] => 
                                                                        ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                         'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $br['lama-sewa'], 'jumlah' => $br['jumlah']], 
                                                                         'tanggal-sewa' => ['tanggal-keluar' => $br['tanggal-keluar'], 'tanggal-masuk' => $br['tanggal-masuk']
                                                                                ]
                                                                            ]
                                                                        ]
                                                                    ];
                            }
                        }
                        $new                                    = new Inventory;
                        //dd($date);
                        $new->tanggal = $date;
                        $new->barang  = $brg;
                        $new->save();
                                            //dd($new);
                    $tes2->addDays(1);
                }
            }
        }
        //dd($trans);
        foreach ($check as $key => $trans) {
            foreach ($trans['barang'] as $key5 => $cek) {
                //dd($cek);
                $cek['harga']                         = (int)$cek['harga'];
                $cek['jumlah']                        = (int)$cek['jumlah'];
                $cek['lama-sewa']                     = (int)$cek['lama-sewa'];
                $total                                += $cek['harga'] * $cek['jumlah'] * $cek['lama-sewa']; 
            }
        }

        $array                                  =['transaksi' => $check , 'total' => $total];
        //dd($array);
        $this->page_datas->datas                = $array;

        $view_source                            = $this->view_source_root . '.payment';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function batal(){
        $batal                          = Transaksi::where('username',session('akun'))
                                                           ->where('status','pending')
                                                           ->get();

        $cek                            = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->get();

        if($cek == null){
            $cek->username                    = $input['username'];
            $cek->nama                        = null;
            $cek->alamat                      = null;
            $cek->nomor                       = null;
            $cek->barang                      = null;
            $cek->nota                        = null;
            $cek->status                      = 'chart';
            $cek->save();
        }

        foreach ($batal as $key => $trans) {
            foreach ($trans['barang'] as $key2 => $barang) {
                $inven                                  = Inventory::get();
                $tes1 = Carbon::parse($barang['tanggal-masuk']);
                $tes2 = Carbon::parse($barang['tanggal-keluar']);
                if($tes1->month > $tes2->month){
                    $var1 = $tes1->day + $tes2->daysInMonth;
                    $var2 = $tes2->day;
                    $tes = $var1 - $var2;
                    //dd($tes);                                                      
                }
                else{
                    $tes = $tes1->day - $tes2->day;
                }
                $var=0;
                foreach ($inven as $key => $tory) {
                    if($tes2<=$tes1){
                        $tanggal = $tes2->toDateString();
                        //dd($tanggal);
                        if($tory['tanggal'] == $tanggal){
                            foreach ($tory['barang'] as $key1 => $value) {
                            //dd($value);
                                
                                    if($barang['nama'] == $value['nama']){
                                        Inventory::where('tanggal' , $tanggal)
                                                 ->where('barang.'.$key1.'.nama'  , $barang['nama'])
                                                 ->update(['barang.'.$key1.'.currentStock' => (int)$value['currentStock'] + (int)$barang['jumlah']]);
                                        //dd($cek);
                                    }
                                }
                        $tes2->addDays(1);
                        $var += 1;
                        }
                    }
                }
            }
        }
        //dd($batal);
        foreach ($batal as $key => $batals) {
            $hapus = Transaksi::find($batals['id']);
            $hapus->delete();    
        }
        
        $this->errors                           = $config->getErrors();
        $this->page_attributes->msg             = 'Data telah dihapus';
        return $this->generateRedirect(route('home'));

    }

    public function prosesBayar(){
        $view_source                            = $this->view_source_root . '.prosesPayment';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function bayar(Request $request){
        $param = $request->all();
        $filename = $request->file('file_photo')->getClientOriginalName();
        $destinationPath = '../resources/assets/photos/';
        $proses = $request->file('file_photo')->move($destinationPath, $filename);
        //dd($proses);

        $input = Input::only('jumlah' ,'keterangan');

        $random = random_int(1, 10000);
        //dd($random);
        $cek = Transaksi::get();

        foreach ($cek as $key => $barang) {
            if($barang['nota']['nomor'] == $random){
                $random = random_int(1, 10000);
            }
        }

        Transaksi::where('username' , session('akun'))
                 ->where('status' ,  'pending')
                 ->update(['nota' => ['bukti' => $filename , 'nomor' => $random , 'jumlah' => $input['jumlah'] , 'keterangan' => $input['keterangan'] ]]);

        $this->page_attributes->msg             = 'Data Berhasil Ditambahkan';
        return $this->generateRedirect(route('home'));
    }

    public function registerNewsletter()
    {
        $newsletter                             = new Subscriber;

        //get input
        $input                                  = Input::only('email_mobile','email_desktop');

        //save data
        if(empty($input['email_mobile'])){
            $newsletter->email                  = $input['email_desktop'];
        }else{
            $newsletter->email                  = $input['email_mobile'];
        }
        $app_version                            = getenv('APP_VERSION');
        $versi                                  = new Version;
                                                        
        $newsletter->version                   = $versi::where('version_name',$app_version)
                                                        ->get()['0']['attributes'];
        $hashedToken                           = hash('md5', strtotime('now'));
        $newsletter->unsubscribe_token         = $hashedToken;
        $newsletter->is_subscribe              = true;

        session(['email' => $newsletter['email']]);

        if(is_null($newsletter->admin)){
            $newsletter->admin                     = 'Admins';
        }
        $newsletter->save();
        $this->errors                           = $newsletter->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';
        $newsletter1                            = Subscriber::where('unsubscribe_token', $hashedToken)->get();
        
        foreach($newsletter1 as $nl){
            $this->page_datas->datas = $nl->unsubscribe_token;
        }

        $email = new email;
        $email -> send('Selamat Datang!', 'Anda telah berhasil berlangganan newsletter.       
 -            Terima kasih sudah mendaftar service newsletter kami dan ikuti terus update dari barang-barang terbaru kami!',$newsletter->email, $this->page_datas->datas);


        return $this->generateRedirect(route('registered'));
    }

    public function registeredNewsletter($id = null)
    {
        return $this->generateView('frontend.pages.registered', Request::route()->getName());
    }

    public function flushregisteredNewsletter($id = null)
    {
        session()->pull('email', 'default');
        $this->page_attributes->msg             = 'Newsletter Sukses';
        return $this->generateRedirect(route('home'));
    }

     public function unsubscribeNewsletter($id)
    {
        if($id != null){
            
            $datas                              = Subscriber::where('unsubscribe_token', $id)
                                                            ->get()['0']['attributes'];
            Subscriber::where('unsubscribe_token', $id)->update(['is_subscribe'=> false]);
        
        }
        $email = new email;
        $email -> unSubscribe('Terima Kasih', 'Anda telah berhenti berlangganan newsletter.',
            $datas['email'], null);

        return $this->generateView('frontend.pages.unsubscribed', Request::route()->getName());
    }

    public function unsubscribedNewsletter($id = null)
    {
        return $this->generateView('frontend.pages.unsubscribed', Request::route()->getName());
    }

    public function signup()
    {
        $input                                  = Input::only('email','username','password','conf_password','nama','no','alamat');

        $comment                                = new Comment;
        $transaksi                              = new Transaksi;
        $user                                   = User::where('email', $input['email'])
                                                        ->count();
        $username                                   = User::where('username', $input['username'])
                                                        ->count();
        if($user!=0 || $username!=0){
            $user                                   = User::where('email', $input['email'])
                                                        ->get()['0']['attributes'];
            $username                               = User::where('username', $input['username'])
                                                        ->get()['0']['attributes'];

            if($username['username'] == $input['username']){
                $this->page_attributes->msg             = 'Username sudah ada, coba username lain';
                return $this->generateRedirect(route('newMember'));
            }

            if($user['email'] == $input['email']){
                $this->page_attributes->msg             = 'Email sudah ada, coba email lain';
                return $this->generateRedirect(route('newMember'));
            }
        }

        $user                                   = new User;

        if($input['password'] != $input['conf_password']){
            $this->page_attributes->msg             = 'Password Tidak Sesuai';
            return $this->generateRedirect(route('newMember'));
        }
        //save data
        $user->email                            = $input['email'];
        $user->username                         = $input['username'];
        $user->password                         = $input['password'];
        $user->name                             = $input['nama'];
        $user->phone                            = $input['no'];
        $user->address                          = $input['alamat'];

        $comment->username                      = $input['username'];
        $comment->email                         = $input['email'];
        $comment->rating                        = null;
        $comment->content                       = ['isi'=>null, 'status'=>null];

        $transaksi->username                    = $input['username'];
        $transaksi->nama                        = null;
        $transaksi->alamat                      = null;
        $transaksi->nomor                       = null;
        $transaksi->barang                      = null;
        $transaksi->nota                        = null;
        $transaksi->status                      = 'chart';

        if(is_null($user->admin)){
            $user->admin                     = 'Admins';
        }

        $transaksi->save();
        $comment->save();
        $user->save();
        $this->errors                           = $user->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect(route('signuped'));
    }

    public function signuped($id = null)
    {
        return $this->generateView('frontend.pages.login', Request::route()->getName());
    }
    public function newMember($id = null)
    {
        return $this->generateView('frontend.pages.signup', Request::route()->getName());
    }
    public function login()
    {
        $user                                   = new User;

        //get input
        $input                                  = Input::only('username','password');

        //save data
        $cari                                   = $user::where('username',$input['username'])
                                                        ->where('password',$input['password'])
                                                        ->first()['attributes'];
        //dd($cari);
        if(is_null($cari)){
            $this->errors                           = $user->getErrors();
            $this->page_attributes->msg             = 'Username atau password yang anda masukkan salah';
            return $this->generateRedirect(route('signuped'));                
        }
        else{
            session(['akun' => $input['username']]);
            $this->errors                           = $user->getErrors();
            $this->page_attributes->msg             = 'Login Berhasil';
            return $this->generateRedirect(route('home'));
        }
    }

    public function logout($id = null)
    {
        session()->pull('akun', 'default');
        $this->page_attributes->msg             = 'Logout Berhasil';
        return $this->generateRedirect(route('signuped'));
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
