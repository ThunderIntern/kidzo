<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Functions\email;

use Request;
use App\Http\Controllers\BaseController;
use App\Models\Subscriber;
use App\Models\Faq;
use App\Models\WebsiteConfig;
use App\Models\Version;
use App\Models\User;
use App\Models\Comment;
use App\Models\emailTime;
use App\Models\SortingBarang;
use App\Models\Barang;
use App\Models\Inventory;
use App\Models\Transaksi;
use App\Models\History;
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
            $this->page_attributes->msg             = 'Email anda telah menerima password untuk melakukan login';
            return $this->generateRedirect(route('signuped2'));
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
        
        $this->page_attributes->msg             = 'Silahkan verifikasi email anda untuk mendapat password';

        return $this->generateRedirect(route('signuped2'));
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

        $pengguna                   = User::where('username', session('akun'))
                                            ->get()['0']['attributes'];
        $this->page_datas->name     = $pengguna['name'];
        $this->page_datas->address  = $pengguna['address'];
        $this->page_datas->phone  = $pengguna['phone'];
        $this->page_datas->status  = 'profile';

        
        return $this->generateView('frontend.pages.profile', Request::route()->getName());
    }

    public function updatePassword(){                                              
        //get input
        $input                              = Input::only('password', 'new_password', 'conf_password');
        $user                                = User::where('username', session('akun'))
                                                        ->get()['0']['attributes'];
                                                        
        if($input['password'] != $user['password'] || $input['new_password'] != $input['conf_password']){
            $this->page_datas->status               = 'password';
            $this->page_attributes->msg             = 'Password Tidak Sesuai / Tidak Terisi';
            return $this->generateView('frontend.pages.profile', Request::route()->getName());
        }

        $data                                   = ['password' => $input['new_password'] ];

        $user                                = User::where('username', session('akun'))->update($data);
        
        $this->page_datas->status               ='profile';
        $this->page_attributes->msg             = 'Data telah disimpan';        
        return $this->generateRedirect(route('profile'));
    }

    public function password(){
        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }
        $this->page_datas->status              ='password';

        //generate view
        $view_source                            = $this->view_source_root . '.profile';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);    
    }

    public function historyUser(){
        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('home'));
        }

        $riw                                    = History::where('username', session('akun'))
                                                            ->get()[0]['attributes'];

        $bnyk   = 0;
        $item   = [];
        $item2   = [];
        //menginput data user per keranjang dalam array
        if($riw['history']!=null){
            foreach ($riw['history'] as $riwayat) {
                $this->page_datas->username[$bnyk]             = $riw['username'];
                $this->page_datas->nama[$bnyk]                 = $riwayat['nama'];
                $this->page_datas->alamat[$bnyk]               = $riwayat['alamat'];
                $this->page_datas->nomor[$bnyk]                = $riwayat['nomor'];
                $this->page_datas->nota[$bnyk]                 = $riwayat['nota'];
                $this->page_datas->total[$bnyk]                = $riwayat['total'];

                //menginput data dari setiap jenis barang yang disewa per keranjang
                foreach ($riwayat['barang'] as $riwayat2) {
                    array_push($item, [$riwayat2['nama'], $riwayat2['harga'], $riwayat2['jumlah'],
                     $riwayat2['lama-sewa'], $riwayat2['tanggal-keluar']]);
                }
                //menandai akhir array perkeranjang untuk tampilan
                array_push($item, null);
                //menginput hasil data perjenis mainan dalam 1 keranjang menjadi 1 array
                array_push($item2, $item);
                $bnyk+=1;
                $item=[];
            }
        }else{
            $this->page_datas->username                    = null;
        }
        $this->page_datas->barang               = $item2;
        // dd($this->page_datas->barang);
        $this->page_datas->banyakRiwayat        = $bnyk;
        $this->page_datas->status               ='historyUser';

        //generate view
        $view_source                            = $this->view_source_root . '.profile';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);    
    }

    public function updateSetting(){                                              
        //get input
        $input                                  = Input::only('nama','no','alamat');
        $data                                   = ['name' => $input['nama'],
                                                    'phone' => $input['no'],
                                                    'address' => $input['alamat']
                                                    ];
        $user                                = User::where('username', session('akun'))->update($data);

        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect(route('profile'));
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
        $this->page_datas->status              ='setting';
        //generate view
        $view_source                            = $this->view_source_root . '.profile';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function prosesRating($id, $idMainan, $partyIndividu){
        $newComment                             = new Comment;

        //dd($idMainan);
        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }
        
        $pemakai                               = Comment::where('username', session('akun'))
                                                            ->where('idMainan', $idMainan)
                                                            ->count();
        // dd($pemakai);

        $data                                   = ['rating' => $id];
        $updateRating                           = Comment::where('username', session('akun'))
                                                            ->where('idMainan', $idMainan)
                                                            ->update($data);

        if($partyIndividu==1){
            $this->page_attributes->msg             = null;
            return $this->generateRedirect(route('deskripsiParty', $idMainan));
        }
        if($partyIndividu==2){
            $this->page_attributes->msg             = null;
            return $this->generateRedirect(route('deskripsiKatalog', $idMainan));
        }
    }

    public function prosesKomen($idMainan, $partyIndividu){
        if($idMainan == 'a'){
            $this->page_attributes->msg             = 'Silahkan login terlebih dahulu';
            return $this->generateRedirect(route('signuped2'));
        }
        
        if(session('akun')==null){
            $this->page_attributes->msg             = 'Data telah disimpan';
            return $this->generateRedirect(route('about'));
        }
        $comment                             = new Comment;
        $user                                = User::where('username', session('akun'))
                                                        ->get()['0']['attributes'];

        $updateRating                        = Comment::where('email', $user['email'])
                                                        ->where('idMainan', $idMainan)
                                                        ->get()['0']['attributes'];
        //get input
        $input                                  = Input::only('komen_mobile');

        if($updateRating['content']['isi']==null && $updateRating['rating']!=null || $updateRating['content']['isi']==null && $updateRating['rating']==null){
            $data                                   = ['content.isi' => $input['komen_mobile']];
            $user                                   = Comment::where('username', session('akun'))
                                                                ->where('idMainan', $idMainan)
                                                                ->update($data);
        
        }else{
            
            //save data
            $comment->content                       = ['isi' => $input['komen_mobile'], 'status'=> '0'];
            $comment->idMainan                      = $idMainan;
            $comment->username                      = $user['username'];
            $comment->email                         = $user['email'];
            $comment->rating                        = $updateRating['rating'];
            $comment->save();
        }
        $this->errors                           = $comment->getErrors();
        
        if($partyIndividu==1){
            $this->page_attributes->msg             = null;
            return $this->generateRedirect(route('deskripsiParty', $idMainan));
        }
        if($partyIndividu==2){
            $this->page_attributes->msg             = null;
            return $this->generateRedirect(route('deskripsiKatalog', $idMainan));
        }
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

    public function party($no, $id){
        if($id=='data'){
            if($no == '0'){
                $katalog                                = Barang::where('status' , 'party')
                                                                ->where('gudang' , 'Tidak')
                                                                ->paginate(6);
            }
            elseif($no == '1'){
                $katalog                                = Barang::where('status' , 'party')
                                                                ->where('gudang' , 'Tidak')
                                                                ->whereIn('kategori' , ['0' ,'1'])
                                                                ->paginate(6);
            }
            elseif($no == '2'){
                $katalog                                = Barang::where('status' , 'party')
                                                                ->where('gudang' , 'Tidak')
                                                                ->whereIn('kategori' , ['1' ,'2'])
                                                                ->paginate(6);
            }
            elseif($no == '3'){
                $katalog                                = Barang::where('status' , 'party')
                                                                ->where('gudang' , 'Tidak')
                                                                ->whereIn('kategori' , ['2' ,'3'])
                                                                ->paginate(6);
            }
            elseif($no == '4'){
                $katalog                                = Barang::where('status' , 'party')
                                                                ->where('gudang' , 'Tidak')
                                                                ->where('kategori' , '3+')
                                                                ->paginate(6);
            }
            $this->page_datas->datas                = $katalog;
        }
        //////Sorting rating
        if($id=='rating'){
            $totTiapJenis = 0;
            $topRatingCount                              = Comment::where('rating', '!=', null)
                                                                ->count();
            $topRating                                   = Comment::where('rating', '!=', null)
                                                                ->get();

            //jika semua status rating pada database comment = null
            if($topRatingCount == 0){
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->tampil                = $katalog;
                $this->page_datas->idSorting = $id;

                $view_source                            = $this->view_source_root . '.katalogParty';
                $route_source                           = Request::route()->getName();        
                return $this->generateView($view_source , $route_source);
            }

            //menyimpan id setiap jenis barang dan username dlm array
            $jumTopRating=[];
            foreach ($topRating as $topR) {
                $tanda=0;
                if($jumTopRating!=null){
                    for($x=1;$x<=$banyakUser2;$x++){
                        if($topR['attributes']['idMainan']!=$jumTopRating[$x-1][0]){
                            $tanda=1;
                        }else{
                            $tanda=0;
                            $x=$banyakUser2+1;
                        }
                    }
                }if($jumTopRating==null){
                    array_push($jumTopRating, [$topR['attributes']['idMainan'],$topR['attributes']['username']]);
                    $banyakUser2=1;
                }
                if($tanda==1){
                    array_push($jumTopRating, [$topR['attributes']['idMainan'],$topR['attributes']['username']]);
                    $banyakUser2+=1;
                }
            }
            //dd($jumTopRating);
            $jtRating = count($jumTopRating);

            // menyimpan total rating setiap jenis mainan dalam array
            $totalTiapJenis = [];
            $totTiapJenis = 0;
            for($x=0;$x<$jtRating;$x++){
                $usr = null;
                $jenisMainan = Comment::where('idMainan', $jumTopRating[$x][0])
                                        ->where('rating', '!=', null)
                                        ->get();
                                        
                foreach ($jenisMainan as $jnsMainan) {
                    if($usr == null){
                        $usr = $jnsMainan['attributes']['username'];
                    }

                    if($jnsMainan['attributes']['username'] != $usr){
                        $totTiapJenis += (int)$jnsMainan['attributes']['rating'];
                    }
                    if($totTiapJenis==0){
                        $totTiapJenis += (int)$jnsMainan['attributes']['rating'];
                    }
                }
                array_push($totalTiapJenis, [$jumTopRating[$x][0], $totTiapJenis]);
                $totTiapJenis = 0;
            }
            //melakukan sorting jumlah permintaan tertinggi dari seluruh mainan dari besar ke terkecil
            for($i=count($totalTiapJenis);$i>0;$i--){
                for($x=count($totalTiapJenis)-1;$x>0;$x--){
                    if($totalTiapJenis[$x-1][1]<$totalTiapJenis[$x][1]){
                        $z = $totalTiapJenis[$x-1];
                        $totalTiapJenis[$x-1] = $totalTiapJenis[$x];
                        $totalTiapJenis[$x] = $z;
                    }
                }
            }
            // dd($totalTiapJenis);
            $this->page_datas->urutRating = $totalTiapJenis;
            $this->page_datas->sumUrutRating = count($totalTiapJenis);

            $simUrutRating = [];
            $totBar         = Barang::where('status', 'party')
                                    ->get();
            //mengantisipasi adanya perubahan id dalam database barang saat melakukan db:seed dari database comment(array $totalTiapJenis diambil dari tabel comment)
            for($i=0;$i<count($totalTiapJenis);$i++){
                $cekBar                                = Barang::where('_id', $totalTiapJenis[$i][0])
                                                                ->count();
                $saving                                = Barang::where('_id', $totalTiapJenis[$i][0])
                                                                ->get();
                if($cekBar!=0){
                    array_push($simUrutRating, $saving[0]['attributes']);
                }
            }
            //dd($simUrutRating);


            //menambahkan barang yang tidak ada dalam array $simurutrating dari tabel barang ke dalam $simurutrating
            $tampil             = Barang::where('status' , 'party')
                                        ->where('gudang' , 'Tidak')
                                        ->get();
            $flagg = 0;
            foreach ($tampil as $tmpl) {
                for($x=0;$x<count($simUrutRating);$x++){
                    if($tmpl['attributes']['_id'] != $simUrutRating[$x]['_id']){
                        $flagg = 1;
                    }else{
                        $flagg = 0;
                        $x=count($simUrutRating);
                    }
                }
                if($flagg==1){
                    array_push($simUrutRating, $tmpl['attributes']);
                }
            }
            // dd($simUrutRating);

            //memasukkan data setiap barang dari array ke dalam tabel SortingBarang
            if($simUrutRating != null){
                $restart                      = SortingBarang::truncate();
                for($i=0;$i<count($simUrutRating);$i++){
                    $sort                     = new SortingBarang;
                    $sort['_id']              = $simUrutRating[$i]['_id'];
                    $sort['nama']             = $simUrutRating[$i]['nama'];
                    $sort['isi']              = $simUrutRating[$i]['isi'];
                    $sort['jenis']            = $simUrutRating[$i]['jenis'];
                    $sort['kategori']         = $simUrutRating[$i]['kategori'];
                    $sort['foto']             = [
                                                        'url'    => $simUrutRating[$i]['foto']['url'],
                                                        'link'   => $simUrutRating[$i]['foto']['link']
                                                  ];
                    $sort['harga']            = $simUrutRating[$i]['harga'];
                    $sort['deskripsi']        = $simUrutRating[$i]['deskripsi'];
                    $sort['perawatan']        = $simUrutRating[$i]['perawatan'];
                    $sort['status']           = $simUrutRating[$i]['status'];
                    $sort['gudang']           = $simUrutRating[$i]['gudang'];
                    $sort['admin']            = $simUrutRating[$i]['admin'];
                    $sort->save();
                }
                if($no == '0'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                
                $this->page_datas->tampil   = $katalog;
            }else{
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->tampil                = $katalog;
            }
        }
    //////////////////////////////Terlaris
        if($id=='terlaris'){
            $barangCount                         = Transaksi::where('barang', '!=', null)
                                                        ->count();
            $barang                              = Transaksi::where('barang', '!=', null)
                                                        ->get();

            //jika dalam tabel transaksi seluruh barang yang disewa = null
            if($barangCount == 0){
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->sortAllPermintaan                = $katalog;
                $this->page_datas->idSorting = $id;

                $view_source                            = $this->view_source_root . '.katalogParty';
                $route_source                           = Request::route()->getName();        
                return $this->generateView($view_source , $route_source);
            }

            $bulanAkhir = Carbon::today()->toDateString();
            //dd($bulanAkhir);

            //menghitung jumlah total setiap barang dalam tahun ini
            $namaBarang = [];
            $default = null;
            foreach ($barang as $objek){
                foreach ($objek['attributes']['barang'] as $item){
                    //menghitung jumlah permintaan tertinggi dari setiap barang berdasarkan taun saat ini.
                    if((int)substr($item['tanggal-keluar'], 0,4) == (int)substr($bulanAkhir, 0,4)){
                        $mark=0;
                        if($namaBarang == null){
                            array_push($namaBarang, [$item['nama'], (int)$item['jumlah']*(int)$item['lama-sewa'], (int)$item['jumlah']*(int)$item['lama-sewa']]);
                            $mark=1;
                        }
                        if($mark==0){
                            for($i=0;$i<count($namaBarang);$i++){
                                //jika ada barang baru akn di buat arraynya
                                if($namaBarang[$i]['0'] != $item['nama']){
                                    $flag1 = 1;
                                //menjumlah barang yang memiliki nama sama
                                }else{
                                    $flag1=0;
                                    $totalJumlah = $namaBarang[$i]['2'] + (int)$item['jumlah']*(int)$item['lama-sewa'];
                                    $namaBarang[$i]['2'] = $totalJumlah;
                                    $i=count($namaBarang)+1;
                                }                                
                            }
                            if($flag1==1){
                                array_push($namaBarang, [$item['nama'], (int)$item['jumlah']*(int)$item['lama-sewa'], (int)$item['jumlah']*(int)$item['lama-sewa']]);
                            }
                        }
                    //jika dalam H-1 bulan tidak ada permintaan akan diambil nama secara acak
                    }
                    else{
                        $default = $item['nama'];
                    }
                }
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
            // dd($namaBarang);

            $sortAllPermintaan             = Barang::where('_id', '!=', null)
                                                    ->where('status', 'party')
                                                    ->get();

            //menambahkan nama barang yang tidak pernah masuk dalam tabel transaksi ke dalam 
            //array $namaBarang
            $flagg = 0;
            foreach ($sortAllPermintaan as $tmpl) {
                for($x=0;$x<count($namaBarang);$x++){
                    if($tmpl['attributes']['nama'] != $namaBarang[$x][0]){
                        $flagg = 1;
                    }else{
                        $flagg = 0;
                        $x=count($namaBarang);
                    }
                }
                if($flagg==1){
                    array_push($namaBarang, [$tmpl['attributes']['nama']]);
                }
            }
            //menginput dan membuat array baru seluruh attribut masing-masing barang untuk tampilan
            $namaBarangAttrib = [];
            for($x=0;$x<count($namaBarang);$x++){
                $allPermintaan = Barang::where('nama', $namaBarang[$x][0])
                                        ->get()[0]['attributes'];

                array_push($namaBarangAttrib, $allPermintaan);
            }
             // dd($namaBarangAttrib);

            if($namaBarang != null){
                $restart                      = SortingBarang::truncate();
                for($i=0;$i<count($namaBarangAttrib);$i++){
                    $sort                     = new SortingBarang;
                    $sort['_id']              = $namaBarangAttrib[$i]['_id'];
                    $sort['nama']             = $namaBarangAttrib[$i]['nama'];
                    $sort['isi']              = $namaBarangAttrib[$i]['isi'];
                    $sort['jenis']            = $namaBarangAttrib[$i]['jenis'];
                    $sort['kategori']         = $namaBarangAttrib[$i]['kategori'];
                    $sort['foto']             = [
                                                        'url'    => $namaBarangAttrib[$i]['foto']['url'],
                                                        'link'   => $namaBarangAttrib[$i]['foto']['link']
                                                  ];
                    $sort['harga']            = $namaBarangAttrib[$i]['harga'];
                    $sort['deskripsi']        = $namaBarangAttrib[$i]['deskripsi'];
                    $sort['perawatan']        = $namaBarangAttrib[$i]['perawatan'];
                    $sort['status']           = $namaBarangAttrib[$i]['status'];
                    $sort['gudang']           = $namaBarangAttrib[$i]['gudang'];
                    $sort['admin']            = $namaBarangAttrib[$i]['admin'];
                    $sort->save();
                }
                if($no == '0'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = SortingBarang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }

                $this->page_datas->sortAllPermintaan   = $katalog;
            }else{
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'party')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->sortAllPermintaan                = $katalog;
            }
        }
//////////////////////////

        //menentukan urutan berdasarkan dataTerbaru / rating /terlaris
        $this->page_datas->idSorting = $id;
        $this->page_attributes->page_title      = $this->page_title;

        //generate view
        $view_source                            = $this->view_source_root . '.katalogParty';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function deskripsiParty($id){
        $this->page_datas->partyIndividu        = 1;
        $this->page_datas->idMainan             = 'a';

        $newComment                             = new Comment;
        $this->page_datas->komen                = Comment::where('idMainan', $id)
                                                    ->orderBy('created_at','desc')
                                                    ->get();

        //Menghitung rata-rata rating barang
        $jumRating                              = Comment::where('idMainan', $id)
                                                            ->get();
        $banyak = count($jumRating);
        $totRating=[];
        $jumlahRating = 0;
        $banyakUser2=0;
        
        //mengambil rating dari setiap user yang berbeda        
        foreach ($jumRating as $sumRating) {
            $tanda=0;
            if($totRating!=null){
                for($x=1;$x<=$banyakUser2;$x++){
                    if($sumRating['attributes']['username']!=$totRating[$x-1][0]){

                        $tanda=1;
                    }else{
                        $tanda=0;
                        $x=$banyakUser2+1;
                    }
                }
            }if($totRating==null){
                array_push($totRating, [$sumRating['attributes']['username'],$sumRating['attributes']['rating']]);
                $banyakUser2=1;
            }
            if($tanda==1){
                array_push($totRating, [$sumRating['attributes']['username'],$sumRating['attributes']['rating']]);
                $banyakUser2+=1;
            }
        }
        $banyakUser = count($totRating);
        //menjumlahkan rating setiap user
        for($x=0;$x<$banyakUser;$x++){
            $jumlahRating += $totRating[$x][1];
        }

        //menghitung rating total
        if($banyakUser!=0){
            $totalRating = ($jumlahRating / ($banyakUser*5))*5;
        }else{
            $totalRating = 0;
        }

        $this->page_datas->totalRating = number_format((float)$totalRating, 1, '.','');

        if(session('akun')!=null){
            $emails                                 = Comment::where('username', session('akun'))
                                                                ->get()[0]['attributes']['email'];
            $this->page_datas->ratingJenis          = Comment::where('username', session('akun'))
                                                            ->where('idMainan', $id)
                                                            ->count();
            if($this->page_datas->ratingJenis==null){
                $newComment->username                      = session('akun');
                $newComment->idMainan                      = $id;
                $newComment->email                         = $emails;
                $newComment->rating                        = null;
                $newComment->content                       = ['isi'=>null, 'status'=>null];
                $newComment->save();
            }

            $this->page_datas->id         = Comment::where('username', session('akun'))
                                                            ->where('idMainan', $id)
                                                            ->get()[0]['attributes']['rating'];
        
            $this->page_datas->idMainan             = $id;
        }

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
        $view_source                            = $this->view_source_root . '.deskripsiParty';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function katalog($no, $id){
        if($id=='data'){
            if($no == '0'){
                $katalog                                = Barang::where('status' , 'individu')
                                                                ->where('gudang' , 'Tidak')
                                                                ->paginate(6);
            }
            elseif($no == '1'){
                $katalog                                = Barang::where('status' , 'individu')
                                                                ->where('gudang' , 'Tidak')
                                                                ->whereIn('kategori' , ['0' ,'1'])
                                                                ->paginate(6);
            }
            elseif($no == '2'){
                $katalog                                = Barang::where('status' , 'individu')
                                                                ->where('gudang' , 'Tidak')
                                                                ->whereIn('kategori' , ['1' ,'2'])
                                                                ->paginate(6);
            }
            elseif($no == '3'){
                $katalog                                = Barang::where('status' , 'individu')
                                                                ->where('gudang' , 'Tidak')
                                                                ->whereIn('kategori' , ['2' ,'3'])
                                                                ->paginate(6);
            }
            elseif($no == '4'){
                $katalog                                = Barang::where('status' , 'individu')
                                                                ->where('gudang' , 'Tidak')
                                                                ->where('kategori' , '3+')
                                                                ->paginate(6);
            }
            $this->page_datas->datas                = $katalog;
        }
//////Sorting rating
        if($id=='rating'){
            $totTiapJenis = 0;
            $topRatingCount                              = Comment::where('rating', '!=', null)
                                                                ->count();
            $topRating                                   = Comment::where('rating', '!=', null)
                                                                ->get();

            //jika semua status rating pada database comment = null
            if($topRatingCount == 0){
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->tampil                = $katalog;
                $this->page_datas->idSorting = $id;

                $view_source                            = $this->view_source_root . '.katalog';
                $route_source                           = Request::route()->getName();        
                return $this->generateView($view_source , $route_source);
            }

            //menyimpan id setiap jenis barang dan username dlm array
            $jumTopRating=[];
            foreach ($topRating as $topR) {
                $tanda=0;
                if($jumTopRating!=null){
                    for($x=1;$x<=$banyakUser2;$x++){
                        if($topR['attributes']['idMainan']!=$jumTopRating[$x-1][0]){
                            $tanda=1;
                        }else{
                            $tanda=0;
                            $x=$banyakUser2+1;
                        }
                    }
                }if($jumTopRating==null){
                    array_push($jumTopRating, [$topR['attributes']['idMainan'],$topR['attributes']['username']]);
                    $banyakUser2=1;
                }
                if($tanda==1){
                    array_push($jumTopRating, [$topR['attributes']['idMainan'],$topR['attributes']['username']]);
                    $banyakUser2+=1;
                }
            }
            //dd($jumTopRating);
            $jtRating = count($jumTopRating);

            // menyimpan total rating setiap jenis mainan dalam array
            $totalTiapJenis = [];
            $totTiapJenis = 0;
            for($x=0;$x<$jtRating;$x++){
                $usr = null;
                $jenisMainan = Comment::where('idMainan', $jumTopRating[$x][0])
                                        ->where('rating', '!=', null)
                                        ->get();
                                        
                foreach ($jenisMainan as $jnsMainan) {
                    if($usr == null){
                        $usr = $jnsMainan['attributes']['username'];
                    }

                    if($jnsMainan['attributes']['username'] != $usr){
                        $totTiapJenis += (int)$jnsMainan['attributes']['rating'];
                    }
                    if($totTiapJenis==0){
                        $totTiapJenis += (int)$jnsMainan['attributes']['rating'];
                    }
                }
                array_push($totalTiapJenis, [$jumTopRating[$x][0], $totTiapJenis]);
                $totTiapJenis = 0;
            }
            //melakukan sorting jumlah permintaan tertinggi dari seluruh mainan dari besar ke terkecil
            for($i=count($totalTiapJenis);$i>0;$i--){
                for($x=count($totalTiapJenis)-1;$x>0;$x--){
                    if($totalTiapJenis[$x-1][1]<$totalTiapJenis[$x][1]){
                        $z = $totalTiapJenis[$x-1];
                        $totalTiapJenis[$x-1] = $totalTiapJenis[$x];
                        $totalTiapJenis[$x] = $z;
                    }
                }
            }
            // dd($totalTiapJenis);
            $this->page_datas->urutRating = $totalTiapJenis;
            $this->page_datas->sumUrutRating = count($totalTiapJenis);

            $simUrutRating = [];
            $totBar         = Barang::where('status', 'individu')
                                    ->get();
            //mengantisipasi adanya perubahan id dalam database barang saat melakukan db:seed dari database comment(array $totalTiapJenis diambil dari tabel comment)
            for($i=0;$i<count($totalTiapJenis);$i++){
                $cekBar                                = Barang::where('_id', $totalTiapJenis[$i][0])
                                                                ->count();
                $saving                                = Barang::where('_id', $totalTiapJenis[$i][0])
                                                                ->get();
                if($cekBar!=0){
                    array_push($simUrutRating, $saving[0]['attributes']);
                }
            }
            //dd($simUrutRating);


            //menambahkan barang yang tidak ada dalam array $simurutrating dari tabel barang ke dalam $simurutrating
            $tampil             = Barang::where('status' , 'individu')
                                        ->where('gudang' , 'Tidak')
                                        ->get();
            $flagg = 0;
            foreach ($tampil as $tmpl) {
                for($x=0;$x<count($simUrutRating);$x++){
                    if($tmpl['attributes']['_id'] != $simUrutRating[$x]['_id']){
                        $flagg = 1;
                    }else{
                        $flagg = 0;
                        $x=count($simUrutRating);
                    }
                }
                if($flagg==1){
                    array_push($simUrutRating, $tmpl['attributes']);
                }
            }
            // dd($simUrutRating);

            //memasukkan data setiap barang dari array ke dalam tabel SortingBarang
            if($simUrutRating != null){
                $restart                      = SortingBarang::truncate();
                for($i=0;$i<count($simUrutRating);$i++){
                    $sort                     = new SortingBarang;
                    $sort['_id']              = $simUrutRating[$i]['_id'];
                    $sort['nama']             = $simUrutRating[$i]['nama'];
                    $sort['isi']              = $simUrutRating[$i]['isi'];
                    $sort['jenis']            = $simUrutRating[$i]['jenis'];
                    $sort['kategori']         = $simUrutRating[$i]['kategori'];
                    $sort['foto']             = [
                                                        'url'    => $simUrutRating[$i]['foto']['url'],
                                                        'link'   => $simUrutRating[$i]['foto']['link']
                                                  ];
                    $sort['harga']            = $simUrutRating[$i]['harga'];
                    $sort['deskripsi']        = $simUrutRating[$i]['deskripsi'];
                    $sort['perawatan']        = $simUrutRating[$i]['perawatan'];
                    $sort['status']           = $simUrutRating[$i]['status'];
                    $sort['gudang']           = $simUrutRating[$i]['gudang'];
                    $sort['admin']            = $simUrutRating[$i]['admin'];
                    $sort->save();
                }
                if($no == '0'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                
                $this->page_datas->tampil   = $katalog;
            }else{
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->tampil                = $katalog;
            }
        }
    //////////////////////////////
        if($id=='terlaris'){
            $barangCount                         = Transaksi::where('barang', '!=', null)
                                                        ->count();
            $barang                              = Transaksi::where('barang', '!=', null)
                                                        ->get();

            //jika dalam tabel transaksi seluruh barang yang disewa = null
            if($barangCount == 0){
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->sortAllPermintaan                = $katalog;
                $this->page_datas->idSorting = $id;

                $view_source                            = $this->view_source_root . '.katalog';
                $route_source                           = Request::route()->getName();        
                return $this->generateView($view_source , $route_source);
            }

            $bulanAkhir = Carbon::today()->toDateString();
            //dd($bulanAkhir);

            //menghitung jumlah total setiap barang dalam tahun ini
            $namaBarang = [];
            $default = null;
            foreach ($barang as $objek){
                foreach ($objek['attributes']['barang'] as $item){
                    //menghitung jumlah permintaan tertinggi dari setiap barang berdasarkan taun saat ini.
                    if((int)substr($item['tanggal-keluar'], 0,4) == (int)substr($bulanAkhir, 0,4)){
                        $mark=0;
                        if($namaBarang == null){
                            array_push($namaBarang, [$item['nama'], (int)$item['jumlah']*(int)$item['lama-sewa'], (int)$item['jumlah']*(int)$item['lama-sewa']]);
                            $mark=1;
                        }
                        if($mark==0){
                            for($i=0;$i<count($namaBarang);$i++){
                                //jika ada barang baru akn di buat arraynya
                                if($namaBarang[$i]['0'] != $item['nama']){
                                    $flag1 = 1;
                                //menjumlah barang yang memiliki nama sama
                                }else{
                                    $flag1=0;
                                    $totalJumlah = $namaBarang[$i]['2'] + (int)$item['jumlah']*(int)$item['lama-sewa'];
                                    $namaBarang[$i]['2'] = $totalJumlah;
                                    $i=count($namaBarang)+1;
                                }                                
                            }
                            if($flag1==1){
                                array_push($namaBarang, [$item['nama'], (int)$item['jumlah']*(int)$item['lama-sewa'], (int)$item['jumlah']*(int)$item['lama-sewa']]);
                            }
                        }
                    //jika dalam H-1 bulan tidak ada permintaan akan diambil nama secara acak
                    }
                    else{
                        $default = $item['nama'];
                    }
                }
            }
// dd($namaBarang);

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
            // dd($namaBarang);

            $sortAllPermintaan             = Barang::where('_id', '!=', null)
                                                    ->where('status', 'individu')
                                                    ->get();

            //menambahkan nama barang yang tidak pernah masuk dalam tabel transaksi ke dalam 
            //array $namaBarang
            $flagg = 0;
            foreach ($sortAllPermintaan as $tmpl) {
                for($x=0;$x<count($namaBarang);$x++){
                    if($tmpl['attributes']['nama'] != $namaBarang[$x][0]){
                        $flagg = 1;
                    }else{
                        $flagg = 0;
                        $x=count($namaBarang);
                    }
                }
                if($flagg==1){
                    array_push($namaBarang, [$tmpl['attributes']['nama']]);
                }
            }
            //menginput dan membuat array baru seluruh attribut masing-masing barang untuk tampilan
            $namaBarangAttrib = [];
            for($x=0;$x<count($namaBarang);$x++){
                $allPermintaan = Barang::where('nama', $namaBarang[$x][0])
                                        ->get()[0]['attributes'];

                array_push($namaBarangAttrib, $allPermintaan);
            }
             // dd($namaBarangAttrib);

            if($namaBarang != null){
                $restart                      = SortingBarang::truncate();
                for($i=0;$i<count($namaBarangAttrib);$i++){
                    $sort                     = new SortingBarang;
                    $sort['_id']             = $namaBarangAttrib[$i]['_id'];
                    $sort['nama']             = $namaBarangAttrib[$i]['nama'];
                    $sort['isi']              = $namaBarangAttrib[$i]['isi'];
                    $sort['jenis']            = $namaBarangAttrib[$i]['jenis'];
                    $sort['kategori']         = $namaBarangAttrib[$i]['kategori'];
                    $sort['foto']             = [
                                                        'url'    => $namaBarangAttrib[$i]['foto']['url'],
                                                        'link'   => $namaBarangAttrib[$i]['foto']['link']
                                                  ];
                    $sort['harga']            = $namaBarangAttrib[$i]['harga'];
                    $sort['deskripsi']        = $namaBarangAttrib[$i]['deskripsi'];
                    $sort['perawatan']        = $namaBarangAttrib[$i]['perawatan'];
                    $sort['status']           = $namaBarangAttrib[$i]['status'];
                    $sort['gudang']           = $namaBarangAttrib[$i]['gudang'];
                    $sort['admin']            = $namaBarangAttrib[$i]['admin'];
                    $sort->save();
                }
                if($no == '0'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = SortingBarang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }

                $this->page_datas->sortAllPermintaan   = $katalog;
            }else{
                if($no == '0'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->paginate(6);
                }
                elseif($no == '1'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['0' ,'1'])
                                                                    ->paginate(6);
                }
                elseif($no == '2'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['1' ,'2'])
                                                                    ->paginate(6);
                }
                elseif($no == '3'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->whereIn('kategori' , ['2' ,'3'])
                                                                    ->paginate(6);
                }
                elseif($no == '4'){
                    $katalog                                = Barang::where('status' , 'individu')
                                                                    ->where('gudang' , 'Tidak')
                                                                    ->where('kategori' , '3+')
                                                                    ->paginate(6);
                }
                $this->page_datas->sortAllPermintaan                = $katalog;
            }
        }
//////////////////////////

        //menentukan urutan berdasarkan dataTerbaru / rating /terlaris
        $this->page_datas->idSorting = $id;
        

        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_source_root . '.katalog';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function deskripsiKatalog($id){
        $this->page_datas->partyIndividu        = 2;

        $this->page_datas->idMainan             = 'a';
        //dd($id);
        $newComment                             = new Comment;

//Menghitung rata-rata rating barang
        $jumRating                              = Comment::where('idMainan', $id)
                                                            ->where('rating', '!=', null)
                                                            ->get();
        $banyak = count($jumRating);
        $totRating=[];
        $jumlahRating = 0;
        $banyakUser2=0;
        
        //mengambil rating dari setiap user yang berbeda        
        foreach ($jumRating as $sumRating) {
            $tanda=0;
            if($totRating!=null){
                for($x=1;$x<=$banyakUser2;$x++){
                    if($sumRating['attributes']['username']!=$totRating[$x-1][0]){

                        $tanda=1;
                    }else{
                        $tanda=0;
                        $x=$banyakUser2+1;
                    }
                }
            }if($totRating==null){
                array_push($totRating, [$sumRating['attributes']['username'],$sumRating['attributes']['rating']]);
                $banyakUser2=1;
            }
            if($tanda==1){
                array_push($totRating, [$sumRating['attributes']['username'],$sumRating['attributes']['rating']]);
                $banyakUser2+=1;
            }
        }
        $banyakUser = count($totRating);

        //menjumlahkan rating setiap user
        for($x=0;$x<$banyakUser;$x++){
            $jumlahRating += $totRating[$x][1];
        }
        //menghitung rating total
        if($banyakUser!=0){
            $totalRating = ($jumlahRating / ($banyakUser*5))*5;
        }else{
            $totalRating = 0;
        }

        $this->page_datas->totalRating = number_format((float)$totalRating, 1, '.','');
////////
        if(session('akun')!=null){
            $emails                                 = Comment::where('username', session('akun'))
                                                                ->get()[0]['attributes']['email'];
            $this->page_datas->ratingJenis          = Comment::where('username', session('akun'))
                                                            ->where('idMainan', $id)
                                                            ->count();
            if($this->page_datas->ratingJenis==null){
                $newComment->username                      = session('akun');
                $newComment->idMainan                      = $id;
                $newComment->email                         = $emails;
                $newComment->rating                        = null;
                $newComment->content                       = ['isi'=>null, 'status'=>null];
                $newComment->save();
            }

            $this->page_datas->id         = Comment::where('username', session('akun'))
                                                            ->where('idMainan', $id)
                                                            ->get()[0]['attributes']['rating'];
        
            $this->page_datas->idMainan             = $id;
        }

        // dd($this->page_datas->idMainan);
        $this->page_datas->komen                = Comment::where('idMainan', $id)
                                                    ->orderBy('created_at','desc')
                                                    ->get();

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

        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_source_root . '.deskripsiKatalog';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function chart(){
        if(is_null(session('akun'))){
            $this->page_attributes->msg             = 'Silahkan login terlebih dahulu';
            return $this->generateRedirect(route('signuped2'));
        }
        //dd(session(['key']));

        $chart                                  = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->first()['attributes']['barang'];
        $subtotal = 0;
        //dd($chart);
        if($chart != null){
            foreach ($chart as $key => $brg) {
                if($brg['status'] == 'individu'){
                    $subtotal += (int)$brg['harga'] * (int)$brg['jumlah'];
                }
                else{
                    $subtotal += (int)$brg['harga'];   
                }
            }
        }

        $array = ['chart' => $chart , 'subtotal' => $subtotal];
        $this->page_datas->datas                = $array;
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
            return $this->generateRedirect(route('signuped' , $id));
        }
        $barang                                  = Barang::where('_id', $id)
                                                         ->first()['attributes'];
        if($barang['status'] == 'individu'){
            //dd(session(['akun']));
            $input                                  = Input::only('hari','tanggalk','jumlah','sign');
            //dd($input);
            if($input['jumlah'] == ""){
                $this->page_attributes->msg             = 'Masukkan jumlah yang disewa';
                return $this->generateRedirect(route('deskripsiKatalog' , $id));
            }

            if((int)$input['jumlah'] <= 0){
                $this->page_attributes->msg             = 'Masukkan jumlah yang benar';
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

            $today                                   = Carbon::today();
            $day1                                    = $today->day;
            $month1                                  = $today->month;           
            $year1                                   = $today->year;

            $date                                    = Carbon::parse($input['tanggalk']);
            $day2                                    = $date->day;
            $month2                                  = $date->month;
            $year2                                   = $date->year;
            //dd($day1);
            if($year2<$year1){
                $this->page_attributes->msg             = 'Tanggal sewa salah';
                return $this->generateRedirect(route('deskripsiKatalog' , $id));
            }
            elseif($year2==$year1){
                if($month2<$month1){
                    $this->page_attributes->msg             = 'Tanggal sewa salah';
                    return $this->generateRedirect(route('deskripsiKatalog' , $id));       
                }
                elseif($month2==$month1){
                    if($day2<$day1){
                        $this->page_attributes->msg             = 'Tanggal sewa salah';
                        return $this->generateRedirect(route('deskripsiKatalog' , $id));
                    }
                }
            }

            $inven                                   = Inventory::get();

            $new                                     = new Transaksi;
            //dd($barang);
            $lama                                    = null;
            $nama                                    = $barang['nama'];
            $harga                                   = $barang['harga'];
            $jumlah                                  = $input['jumlah'];
            $url                                     = $barang['foto']['url'];
            $hari                                    = $input['hari'];
            $tanggalk                                = $input['tanggalk'];
            $perawatan                               = $barang['perawatan'];
            $status                                  = $barang['status'];

            $cek                                     = Inventory::where('tanggal' , $tanggalk)
                                                                ->first()['attributes'];
            $cek2                                    = Inventory::orderBy('tanggal' , 'asc')
                                                                ->get();
            $init = null;
            //dd($count);
            foreach ($cek2 as $key => $c) {
                foreach ($c['barang'] as $key2 => $barang) {
                    if($barang['nama'] == $nama){
                        $init = $barang['initialStock'];
                    }   
                }
            }
                //dd($init);

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
            $tanggalp = $lama->addDays((int)$perawatan)->toDateString();

            foreach ($inven as $key => $tory) {
                $tes1 = Carbon::parse($tanggalp);
                $tes2 = Carbon::parse($tanggalk);
                if($tes1->month > $tes2->month){
                    $var1 = $tes1->day + $tes2->daysInMonth;
                    $var2 = $tes2->day;
                    $tes  = $var1 - $var2;
                    //dd($tes);                                                      
                }
                else{
                    $tes = $tes1->day - $tes2->day;
                }
                $var=0;
                if($tes2<=$tes1){
                    $tanggal = $tes2->toDateString();
                    //dd($tanggal);
                    if($tory['tanggal'] == $tanggal){
                        foreach ($tory['barang'] as $key2 => $barang) {
                            if($barang['nama'] == $nama){
                                if((int)$barang['currentStock'] < (int)$jumlah){
                                    $this->page_attributes->msg             = 'Jumlah Barang Tidak Cukup';
                                    return $this->generateRedirect(route('deskripsiKatalog' , $id));
                                }
                            }
                        }
                    $tes2->addDays(1);
                    $var += 1;
                    }
                    else{
                        foreach ($tory['barang'] as $key2 => $barang) {
                            if($barang['nama'] == $nama){
                                if((int)$jumlah > (int)$init){
                                    $this->page_attributes->msg             = 'Jumlah Barang Tidak Cukup';
                                    return $this->generateRedirect(route('deskripsiKatalog' , $id));
                                }
                            }
                        }
                    $tes2->addDays(1);
                    $var += 1;
                    }
                }
            }

            //dd($tanggalm);
            $array                                   = ['nama' => $nama, 'harga' => $harga ,'jumlah' => $jumlah, 'url' => $url, 'lama-sewa' => $hari                                        ,'tanggal-keluar' => $tanggalk, 'tanggal-masuk' => $tanggalm, 'tanggal-perawatan' => $tanggalp , 'status' => $status];
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
                $brg[$nama]                       = $array;
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
        else{
            //dd(session(['akun']));
            $input                                  = Input::only('hari','tanggalk','sign');
            //dd($input);

            if($input['hari'] == ""){
                $this->page_attributes->msg             = 'Masukkan lama sewa';
                return $this->generateRedirect(route('deskripsiKatalog' , $id));
            }

            if($input['tanggalk'] == ""){
                $this->page_attributes->msg             = 'Masukkan tanggal sewa';
                return $this->generateRedirect(route('deskripsiKatalog' , $id));
            }

            $today                                   = Carbon::today();
            $day1                                    = $today->day;
            $month1                                  = $today->month;           
            $year1                                   = $today->year;

            $date                                    = Carbon::parse($input['tanggalk']);
            $day2                                    = $date->day;
            $month2                                  = $date->month;
            $year2                                   = $date->year;
            //dd($day1);
            if($year2<$year1){
                $this->page_attributes->msg             = 'Tanggal sewa salah';
                return $this->generateRedirect(route('deskripsiKatalog' , $id));
            }
            elseif($year2==$year1){
                if($month2<$month1){
                    $this->page_attributes->msg             = 'Tanggal sewa salah';
                    return $this->generateRedirect(route('deskripsiKatalog' , $id));       
                }
                elseif($month2==$month1){
                    if($day2<$day1){
                        $this->page_attributes->msg             = 'Tanggal sewa salah';
                        return $this->generateRedirect(route('deskripsiKatalog' , $id));       
                    }
                }
            }

            $inven                                   = Inventory::get();

            $new                                     = new Transaksi;
            //dd($barang);
            $lama                                    = null;
            $nama                                    = $barang['nama'];
            $harga                                   = $barang['harga'];
            $isi                                     = $barang['isi'];
            $url                                     = $barang['foto']['url'];
            $hari                                    = $input['hari'];
            $tanggalk                                = $input['tanggalk'];
            $perawatan                               = $barang['perawatan'];
            $status                                  = $barang['status'];

            $cek                                     = Inventory::where('tanggal' , $tanggalk)
                                                                ->first()['attributes'];
            $cek2                                    = Inventory::orderBy('tanggal' , 'asc')
                                                                ->get();
            $init = null;
            //dd($count);

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
            $tanggalp = $lama->addDays((int)$perawatan)->toDateString();
            foreach ($isi as $key9 => $is) {
                foreach ($cek2 as $key => $c) {
                    foreach ($c['barang'] as $key2 => $barang) {
                        if($barang['nama'] == $is['nama']){
                            $init = $barang['initialStock'];
                        }   
                    }
                }
                //dd($init);
                foreach ($inven as $key => $tory) {
                    $tes1 = Carbon::parse($tanggalp);
                    $tes2 = Carbon::parse($tanggalk);
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
                    if($tes2<=$tes1){
                        $tanggal = $tes2->toDateString();
                        //dd($tanggal);
                        if($tory['tanggal'] == $tanggal){
                            foreach ($tory['barang'] as $key2 => $barang) {
                                if($barang['nama'] == $is['nama']){
                                    if((int)$barang['currentStock'] < (int)$is['jumlah']){
                                        $this->page_attributes->msg             = 'Jumlah Barang Tidak Cukup';
                                        return $this->generateRedirect(route('deskripsiKatalog' , $id));
                                    }
                                }
                            }
                        $tes2->addDays(1);
                        $var += 1;
                        }
                        else{
                            foreach ($tory['barang'] as $key2 => $barang) {
                                if($barang['nama'] == $is['nama']){
                                    if((int)$is['jumlah'] > (int)$init){
                                        $this->page_attributes->msg             = 'Jumlah Barang Tidak Cukup';
                                        return $this->generateRedirect(route('deskripsiKatalog' , $id));
                                    }
                                }
                            }
                        $tes2->addDays(1);
                        $var += 1;
                        }
                    }
                }
            }
            //dd($tanggalm);
            $array                                   = ['nama' => $nama, 'harga' => $harga ,'isi' => $isi, 'url' => $url, 'lama-sewa' => $hari                                        ,'tanggal-keluar' => $tanggalk, 'tanggal-masuk' => $tanggalm, 'tanggal-perawatan' => $tanggalp , 'status' => $status];
            //dd($array);
            //dd($nama);
            //dd($barang);
            $inven                                  = Inventory::where('tanggal', $tanggalk)
                                                               ->get();
            //dd($inven);
            $chart                                  = Transaksi::where('username',session('akun'))
                                                               ->where('status','chart')
                                                               ->first()['attributes']['barang'];

            if(is_null($chart)){
                $brg[$nama]                       = $array;
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
    }

    public function deleteChart($nama){
        if(is_null(session('akun'))){
            $this->page_attributes->msg             = 'Silahkan login terlebih dahulu';
            return $this->generateRedirect(route('signuped2'));
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

        $cek                            = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->first()['attributes'];
        $transaksi = new Transaksi;
        $transaksi->username                    = session('akun');
        $transaksi->nama                        = null;
        $transaksi->alamat                      = null;
        $transaksi->nomor                       = null;
        $transaksi->barang                      = null;
        $transaksi->nota                        = null;
        $transaksi->total                       = null;
        $transaksi->status                      = 'chart';
        $transaksi->save();

        $input                                  = Input::only('nama','alamat','no');

        Transaksi::where('username',session('akun'))
                 ->where('status','pending')
                 ->update(['nama' => $input['nama'] , 'alamat' => $input['alamat'] , 'nomor' => $input['no']]);

        $transaksi                              = Transaksi::where('username',session('akun'))
                                                           ->where('status','pending')
                                                           ->get();

        $inven                                  = Inventory::get();



        $this->page_attributes->msg             = 'Check Out Berhasil';
        return $this->generateRedirect(route('detailCheckOut')); 
    }

    public function detailCheckOut(){
        $check                                  = Transaksi::where('username',session('akun'))
                                                           ->where('status','pending')
                                                           ->get();
        $total = null;
        $init = null;
        foreach ($check as $key => $trans) {
            foreach ($trans['barang'] as $key2 => $barang) {
                if($barang['status'] == 'individu'){
                    $cek                                    = Inventory::orderBy('tanggal' , 'asc')
                                                                ->get();
                    foreach ($cek as $key7 => $c) {
                        foreach ($c['barang'] as $key9 => $brng) {
                            if($brng['nama'] == $barang['nama']){
                                $init = $brng['initialStock'];
                            }   
                        }
                    }
                    $inven                                  = Inventory::get();
                    $tes1 = Carbon::parse($barang['tanggal-perawatan']);
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
                                        else{
                                            $brg = null;
                                            foreach ($tory['barang'] as $key6 => $brgs) {
                                                $brg[$key6] = $brgs;
                                            }
                                            $brg[$key2] = ['nama' => $barang['nama'] , 
                                                           'initialStock' => $init,
                                                           'currentStock' => (int)$init - (int)$barang['jumlah'],
                                                           'brokenStock' => '0', 
                                                           'outStock' => [$trans['username'] => 
                                                                            ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                             'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $barang['lama-sewa'], 'jumlah' => $barang['jumlah']], 
                                                                             'tanggal-sewa' => ['tanggal-keluar' => $barang['tanggal-keluar'], 'tanggal-masuk' => $barang['tanggal-masuk'] , 'tanggal-perawatan' => $barang['tanggal-perawatan']
                                                                                    ]
                                                                                ]
                                                                            ]
                                                                        ];
                                            Inventory::where('tanggal' , $tanggal)
                                                     ->update(['barang' => $brg]);
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
                                if($br['status'] == 'individu'){
                                    if($br['nama'] == $barang['nama']){
                                        $brg[$key3] = ['nama' => $br['nama'] , 
                                                       'initialStock' => $init,
                                                       'currentStock' => (int)$init - (int)$br['jumlah'],
                                                       'brokenStock' => '0', 
                                                       'outStock' => [$trans['username'] => 
                                                                                ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                                 'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $br['lama-sewa'], 'jumlah' => $br['jumlah']], 
                                                                                 'tanggal-sewa' => ['tanggal-keluar' => $br['tanggal-keluar'], 'tanggal-masuk' => $br['tanggal-masuk'] , 'tanggal-perawatan' => $br['tanggal-perawatan']
                                                                                        ]
                                                                                    ]
                                                                                ]
                                                                            ];
                                    }
                                    else{
                                        $brg[$key3] = ['nama' => $br['nama'] , 
                                                       'initialStock' => $init,
                                                       'currentStock' => $init,
                                                       'brokenStock' => '0', 
                                                       'outStock' => [$trans['username'] => 
                                                                                ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                                 'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $br['lama-sewa'], 'jumlah' => $br['jumlah']], 
                                                                                 'tanggal-sewa' => ['tanggal-keluar' => $br['tanggal-keluar'], 'tanggal-masuk' => $br['tanggal-masuk'] , 'tanggal-perawatan' => $br['tanggal-perawatan']
                                                                                        ]
                                                                                    ]
                                                                                ]
                                                                            ];
                                    }
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
                else{
                    $cek                                    = Inventory::orderBy('tanggal' , 'asc')
                                                                ->get();
                    foreach ($barang['isi'] as $key11 => $isi) {
                        foreach ($cek as $key7 => $c) {
                            foreach ($c['barang'] as $key9 => $brng) {
                                if($brng['nama'] == $isi['nama']){
                                    $init = $brng['initialStock'];
                                }   
                            }
                        }
                        $inven                                  = Inventory::get();
                        $tes1 = Carbon::parse($barang['tanggal-perawatan']);
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
                                        
                                            if($isi['nama'] == $value['nama']){
                                                Inventory::where('tanggal' , $tanggal)
                                                         ->where('barang.'.$key1.'.nama'  , $isi['nama'])
                                                         ->update(['barang.'.$key1.'.currentStock' => (int)$value['currentStock'] - (int)$isi['jumlah']]);
                                                //dd($cek);
                                            }
                                            else{
                                                $brg = null;
                                                foreach ($tory['barang'] as $key6 => $brgs) {
                                                    $brg[$key6] = $brgs;
                                                }
                                                $brg[$key11] = ['nama' => $isi['nama'] , 
                                                               'initialStock' => $init,
                                                               'currentStock' => (int)$init - (int)$isi['jumlah'],
                                                               'brokenStock' => '0', 
                                                               'outStock' => [$trans['username'] => 
                                                                                ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                                 'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $barang['lama-sewa'], 'jumlah' => $isi['jumlah']], 
                                                                                 'tanggal-sewa' => ['tanggal-keluar' => $barang['tanggal-keluar'], 'tanggal-masuk' => $barang['tanggal-masuk'] , 'tanggal-perawatan' => $barang['tanggal-perawatan']
                                                                                        ]
                                                                                    ]
                                                                                ]
                                                                            ];
                                                Inventory::where('tanggal' , $tanggal)
                                                         ->update(['barang' => $brg]);
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
                                    if($br['status'] == 'party'){
                                        foreach($br['isi'] as $key8 =>$is){
                                            if($is['nama'] == $isi['nama']){
                                                $brg[$key8] = ['nama' => $is['nama'] , 
                                                               'initialStock' => $init,
                                                               'currentStock' => (int)$init - (int)$is['jumlah'],
                                                               'brokenStock' => '0', 
                                                               'outStock' => [$trans['username'] => 
                                                                                        ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                                         'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $br['lama-sewa'], 'jumlah' => $is['jumlah']], 
                                                                                         'tanggal-sewa' => ['tanggal-keluar' => $br['tanggal-keluar'], 'tanggal-masuk' => $br['tanggal-masuk'] , 'tanggal-perawatan' => $br['tanggal-perawatan']
                                                                                                ]
                                                                                            ]
                                                                                        ]
                                                                                    ];
                                            }
                                            else{
                                                $brg[$key8] = ['nama' => $is['nama'] , 
                                                               'initialStock' => $init,
                                                               'currentStock' => $init,
                                                               'brokenStock' => '0', 
                                                               'outStock' => [$trans['username'] => 
                                                                                        ['nota' => ['nomor' => '00001', 'jenis' => 'pembayaran'], 
                                                                                         'keterangan' => ['telepon' => $trans['nomor'], 'alamat' => $trans['alamat'], 'lama' => $br['lama-sewa'], 'jumlah' => $is['jumlah']], 
                                                                                         'tanggal-sewa' => ['tanggal-keluar' => $br['tanggal-keluar'], 'tanggal-masuk' => $br['tanggal-masuk'] , 'tanggal-perawatan' => $br['tanggal-perawatan']
                                                                                                ]
                                                                                            ]
                                                                                        ]
                                                                                    ];
                                            }
                                        }
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
            }
        }
        //dd($trans);
        foreach ($check as $key => $trans) {
            foreach ($trans['barang'] as $key5 => $cek) {
                //dd($cek);
                if($cek['status'] == 'individu'){
                    $cek['harga']                         = (int)$cek['harga'];
                    $cek['jumlah']                        = (int)$cek['jumlah'];
                    $cek['lama-sewa']                     = (int)$cek['lama-sewa'];
                    $total                                += $cek['harga'] * $cek['jumlah'] * $cek['lama-sewa'];
                }
                else{
                    $cek['harga']                         = (int)$cek['harga'];
                    $cek['lama-sewa']                     = (int)$cek['lama-sewa'];
                    $total                                += $cek['harga'] * $cek['lama-sewa'];   
                } 
            }
        }
        if(is_null($total)){

        }
        else{
            $random = random_int(1, 100);
            $total = $total - 100 + $random;
        }
        
            Transaksi::where('username',session('akun'))
                     ->where('status','pending')
                     ->update(['total' => $total]);

        $array                                  = ['transaksi' => $check , 'total' => $total];
        
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

        //dd($batal);
        foreach ($batal as $key => $trans) {
            foreach ($trans['barang'] as $key2 => $barang) {
                if($barang['status'] == 'individu'){
                    $inven                                  = Inventory::get();
                    $tes1 = Carbon::parse($barang['tanggal-perawatan']);
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
                                            //dd($key1);
                                            //dd($cek);
                                        }
                                    }
                            $tes2->addDays(1);
                            $var += 1;
                            }
                        }
                    }
                //dd($inven);
                }
                else{
                    foreach($barang['isi'] as $key9 => $isi){
                        $inven                                  = Inventory::get();
                        $tes1 = Carbon::parse($barang['tanggal-perawatan']);
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
                                        
                                            if($isi['nama'] == $value['nama']){
                                                Inventory::where('tanggal' , $tanggal)
                                                         ->where('barang.'.$key1.'.nama'  , $isi['nama'])
                                                         ->update(['barang.'.$key1.'.currentStock' => (int)$value['currentStock'] + (int)$isi['jumlah']]);
                                                //dd($isi['jumlah']);
                                            }
                                        }
                                $tes2->addDays(1);
                                $var += 1;
                                }
                            }
                        }
                    }
                }
            }
        }
        //dd($inven);
        foreach ($batal as $key => $batals) {
            $hapus = Transaksi::find($batals['id']);
            $hapus->delete();    
        }
        $cek                            = Transaksi::where('username',session('akun'))
                                                           ->where('status','chart')
                                                           ->first()['attributes'];
        if(is_null($cek)){
            $transaksi                              = new Transaksi;
            $transaksi->username                    = session('akun');
            $transaksi->nama                        = null;
            $transaksi->alamat                      = null;
            $transaksi->nomor                       = null;
            $transaksi->barang                      = null;
            $transaksi->nota                        = null;
            $transaksi->total                       = null;
            $transaksi->status                      = 'chart';
            $transaksi->save();
        }
        $this->page_attributes->msg             = 'Pembatalan Pesanan Berhasil';
        return $this->generateRedirect(route('home'));

    }

    public function prosesBayar(){
        $view_source                            = $this->view_source_root . '.prosesPayment';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function bayar(Request $request){
        $input = Input::only('jumlah' ,'keterangan' , 'nama');

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
                 ->update(['nota' => ['nomor' => $random , 'jumlah' => $input['jumlah'] , 'keterangan' => $input['keterangan'] , 'atas_nama' => $input['nama'] ]]);

        $this->page_attributes->msg             = 'Pembayaran Berhasil Dilakukan';
        return $this->generateRedirect(route('home'));
    }

    public function registerNewsletter()
    {
        $newsletter                             = new Subscriber;
        $subscriber                             = Subscriber::orderBy('created_at','desc')
                                                            ->get();
        //get input
        $input                                  = Input::only('email_mobile','email_desktop');

        foreach ($subscriber as $value) {
            if($value['attributes']['email'] == $input['email_mobile'] || $value['attributes']['email'] == $input['email_desktop']){
                $this->errors                           = $newsletter->getErrors();
                $this->page_attributes->msg             = 'Data telah disimpan';
                return $this->generateRedirect(route('registered'));
            }
        }
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
            Terima kasih sudah mendaftar service newsletter kami dan ikuti terus update dari barang-barang terbaru kami!',$newsletter->email, $this->page_datas->datas);


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

        return $this->generateRedirect(route('unsubscribed'));
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
        $history                                = new History;
        $user                                   = User::where('email', $input['email'])
                                                        ->count();
        $username                                   = User::where('username', $input['username'])
                                                        ->count();
        //mengecek apakah input username dan email ada yang sama di dalam database
        if($user!=0){
            $user                                   = User::where('email', $input['email'])
                                                        ->get()['0']['attributes'];
            if($user['email'] == $input['email']){
                $this->page_attributes->msg             = 'Email sudah ada, coba email lain';
                return $this->generateRedirect(route('create')); 
            }
        }
        if($username!=0){
            $username                               = User::where('username', $input['username'])
                                                        ->get()['0']['attributes'];

            if($username['username'] == $input['username']){
                $this->page_attributes->msg             = 'Username sudah ada, coba username lain';
                return $this->generateRedirect(route('create')); 
            }
        }

        $user                                   = new User;
        if($input['password'] != $input['conf_password']){
            $this->page_attributes->msg             = 'Password Tidak Sesuai';
            return $this->generateRedirect(route('create')); 
        }
        //save data
        $user->email                            = $input['email'];
        $user->username                         = $input['username'];
        $user->password                         = $input['password'];
        $user->name                             = $input['nama'];
        $user->phone                            = $input['no'];
        $user->address                          = $input['alamat'];

        $comment->username                      = $input['username'];
        $comment->idMainan                      = null;
        $comment->email                         = $input['email'];
        $comment->rating                        = null;
        $comment->content                       = ['isi'=>null, 'status'=>null];

        $transaksi->username                    = $input['username'];
        $transaksi->nama                        = null;
        $transaksi->alamat                      = null;
        $transaksi->nomor                       = null;
        $transaksi->barang                      = null;
        $transaksi->nota                        = null;
        $transaksi->total                       = null;
        $transaksi->status                      = 'chart';

        $history->username                    = $input['username'];
        $history->history                     = null;
        

        if(is_null($user->admin)){
            $user->admin                     = 'Admins';
        }

        $history->save();
        $transaksi->save();
        $comment->save();
        $user->save();
        $this->errors                           = $user->getErrors();
        $this->page_attributes->msg             = 'Data telah disimpan';

        return $this->generateRedirect(route('signuped2'));
    }

    public function signuped($id)
    {
        if(is_null($id)){
            return $this->generateRedirect(route('signuped2'));
        }
        else{
            $this->page_datas->datas                = $id;
            $view_source                            = $this->view_source_root . '.login';
            $route_source                           = Request::route()->getName();        
            return $this->generateView($view_source , $route_source);
        }
    }

    public function signuped2(){
        $this->page_datas->datas                = null;
        $view_source                            = $this->view_source_root . '.login';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function newMember()
    {
        return $this->generateView('frontend.pages.signup', Request::route()->getName());
    }
    public function login($id = null)
    {
        $user                                   = new User;

        //get input
        $input                                  = Input::only('username','password');

        //save data
        $cari                                   = $user::where('username',$input['username'])
                                                        ->where('password',$input['password'])
                                                        ->first()['attributes'];

        $cek                                    = Barang::where('_id' , $id)
                                                        ->first()['attributes'];
        //dd($cari);
        if(is_null($cari)){
            $this->errors                           = $user->getErrors();
            $this->page_attributes->msg             = 'Username atau password yang anda masukkan salah';
            return $this->generateRedirect(route('signuped' , $id));                
        }
        else{
            session(['akun' => $input['username']]);
            $this->errors                           = $user->getErrors();
            $this->page_attributes->msg             = 'Login Berhasil';
            if($cek['status'] == 'individu'){
                return $this->generateRedirect(route('deskripsiKatalog' , $id));
            }
            else{
                return $this->generateRedirect(route('deskripsiParty' , $id));   
            }
        }
    }

    public function login2()
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
            return $this->generateRedirect(route('signuped2'));                
        }
        else{
            session(['akun' => $input['username']]);
            $this->errors                           = $user->getErrors();
            $this->page_attributes->msg             = 'Login Berhasil';
            return $this->generateRedirect(route('home'));   
        }
    }

    public function logout()
    {
        session()->pull('akun', 'default');
        $this->page_attributes->msg             = 'Logout Berhasil';
        return $this->generateRedirect(route('home'));
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
