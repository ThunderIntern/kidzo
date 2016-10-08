@extends('frontend.layout.layout')
@section('content')
<div class="container-fluid pleft-0 pbottom-0">
    <div class="desktop col-md-12 pright-0 pleft-0">
        <?php $segment2 =  Request::segment(2);  ?>
        <div class="col-md-3 paddingTop35">
            <ul class="paddingTop15 list-unstyled pul">
                <h6 class="pul mbottom-xs"><b>Menu Saya</b></h6>
                <li class="pil black mbottom-xs">
                    <a class="black <?php if($segment2=='') echo 'blue';?>" href="{{route('profile')}}"><h6>Profil</h6></a>
                </li>
                <li class="pil black mbottom-xs">
                    <a class="black <?php if($segment2=='setting') echo 'blue';?>" href="{{route('setting')}}"><h6>Pengaturan</h6></a>
                </li>
                <li class="pil black mbottom-xs">
                    <a class="black <?php if($segment2=='password') echo 'blue';?>" href="{{route('password')}}"><h6>Ubah Password</h6></a>
                </li>
                <li class="pil black mbottom-xs">
                    <a class="black <?php if($segment2=='historyUser') echo 'blue';?>" href="{{route('historyUser')}}"><h6>Histori Transaksi</h6></a>
                </li>
                <li class="pil black mbottom-xs">
                    <a class="black" href="{{route('logout')}}"><h6>Keluar</h6></a>
                </li>
            </ul>           
        </div>
        <div class="col-md-9 paddingBottom100 paddingLeft30 paddingRight30 borderLeft1" style="padding-bottom: 60vh">
            <div class="desktop row mbottom-s paddingTop50">
                <div class="col-md-12">
                    <h1>Pengaturan</h1>
                    <hr class="garis-bawah-blue pull-left mtop-0" width="50">
                </div>
            </div>
<!--            <div class="row mbottom-m paddingLeft20">
                <div class="col-md-12 paddingLeft20">
                    <form method="GET" action="#" accept-charset="UTF-8" class="p-y-0">
                        <div class="input-group">
                            <input type="text" name="search" value="" class="form-control" placeholder="Cari Informasi Tentang Kami">
                            <span class="input-group-btn">
                                <button class="btn bgabu black paddingLeft30 paddingRight30" type="submit">Cari</button>
                            </span>
                        </div>
                    </form>

                </div>
            </div>   -->
            <div class="content-faq">
                <ul class="list-unstyled" style="margin-left:-20px;">
                    {!! Form::open(['url' => route('updateSetting')]) !!}
                        <li class="pil black blue">
                            <h6>Username</h6>
                        </li>
                        <li class="pil black mbottom-s">
                            <h6>{!!$page_datas->username!!}</h6>
                        </li>
                        <li class="pil black blue">
                            <h6>Email</h6>
                        </li>
                        <li class="pil black mbottom-s">
                            <h6>{!!$page_datas->email!!}</h6>
                        </li>
                        <li class="pil black blue">
                            <h6>Nama Pelanggan</h6>
                        </li>
                        <li class="pil black mbottom-s">
                            <h6>{!! Form::text('nama',$page_datas->name, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}</h6>
                        </li>
                        <li class="pil black blue">
                            <h6>Address</h6>
                        </li>
                        <li class="pil black mbottom-s">
                            <h6>{!! Form::text('alamat',$page_datas->address, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}</h6>
                        </li>
                        <li class="pil black blue">
                            <h6>Phone Number</h6>
                        </li>
                        <li class="pil black mbottom-s">
                            <h6>{!! Form::text('no',$page_datas->phone, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}</h6>
                        </li>
                        <li class="pil black mbottom-s">
                            <button type="submit" class="editProfile" style="background-color:white; border-radius:5px; padding-left:15px; padding-right:15px; border: 1px solid #46A0CF; color: #46A0CF;">Save</button>
                        </li>
                    {!! Form::close() !!}
                </ul>

            </div>
        </div>
    </div>
    <div class="mobile col-sm-12 paddingBottom50 paddingRight30 paddingLeft30"> 
        <div class="row mbottom-s paddingTop50">
            <div class="col-sm-12 text-center">
                <h1><b>About Us</b></h1>
                <hr class="garis-bawah-ungu ptop-0" width="70">
            </div>
        </div>
        <div class="row mbottom-s">
            <div class="col-sm-12">
                <h5>Kategori</h5>
            </div>
            <div class="col-sm-12">
                <select class="butFoot width100Per dropdown-toggle" type="text"><option value="Profil">Profil</option></select>
            </div>
        </div>
        <div class="row mbottom-s">
            <div class="col-sm-12">
                <h5>Cari dikategori ini</h5>
            </div>
            <div class="col-sm-12">
                <form class="form-inline">
                    <input class="form-control width80Per pull-left" type="text" placeholder="Apa yang ingin Anda Cari?"></input><button type="submit" class="bgabu butFoot width20Per">Cari</button>
                </form>
            </div>
        </div>
        <hr class="width100Per">
        @include('frontend.widget.text', ['datas' => [
        '0' => ['header' => "Apa itu Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
        '1' => ['header' => "Mengapa Harus Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
        '2' => ['header' => "Apakah Kidzo Terpercaya ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
        ]])
    </div>
</div>
<div style="clear:both"></div>
@stop