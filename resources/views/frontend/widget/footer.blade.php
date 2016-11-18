 <!--Document

Normala + normalb :yang akan muncul saat ukuran desktop
Kecila + kecilb  :yang akan muncul saat ukuran mobile
email : mengubah model form email di footer

class
- borderTop5     : border top sebesar 5px
- borderRight1   : border kanan 1 px
- dan sejenisnya . . . .

- bgred : background merah
- red   : merah
- dan sejenisnya . . . .

button:
- butFoot : mengubah model button di footer

-->
{{-- Isi form akan di kirim ke register --}}

{!! Form::open(['url' => route('register')]) !!}

            {{-- Class warna --}}
        <div class="warnaIn">
            <div class="marginBottom5" style="margin-top:-5px">
                <div class="floatLeft width20Per height5 bgred"></div>
                <div class="floatLeft width20Per height5 bggreen"></div>
                <div class="floatLeft width20Per height5 bgorange"></div>
                <div class="floatLeft width20Per height5 bgpurple ungu"></div>
                <div class="floatLeft width20Per height5 bgblue"></div>
            </div>
        </div>

            {{-- isi Footer --}}
<div class="container-fluid bgabu width100Per">
    <div class="container">        
        {{-- Class warna --}}  
        <div class="warnaOut">
            
            <div class="marginBottom5">
                <div class="floatLeft width20Per height5 bgred"></div>
                <div class="floatLeft width20Per height5 bggreen"></div>
                <div class="floatLeft width20Per height5 bgorange"></div>
                <div class="floatLeft width20Per height5 bgpurple ungu"></div>
                <div class="floatLeft width20Per height5 bgblue"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bgabumuda width100Per">
    <div class="container">
            <div class="col-sm-12 bgabumuda">
                <div class="normala">
                    <div class="paddingTop25 pull-left footer-col1">
                        <img src="{{asset('image/frontend/logo.png')}}" class="gambarFoot ">
                    </div>
                    <div class="floatLeft footer-col2">
                        <p><b>PT.KIDZO GEMBIRA SENTOSA</b></p>
                        <p>THE CEO BUILDING, Lv 12</p>
                        <p>Jl.TB Simatupang No. 18C</p>
                        <p>Jakarta Selatan 12430, Indonesia</p>
                        <p>contact[at]kidzo.id</p>
                    </div>
                    <div class="floatLeft footer-col1">
                        <p><b>Kategori Mainan</b></p>
                        <a href="{{Route('katalog' , ['no' => '1', 'id' => 'data'])}}" class="black"><p>0 - 1 Tahun</p></a>
                        <a href="{{Route('katalog' , ['no' => '2', 'id' => 'data'])}}" class="black"><p>1 - 2 Tahun</p></a>
                        <a href="{{Route('katalog' , ['no' => '3', 'id' => 'data'])}}" class="black"><p>2 - 3 Tahun</p></a>
                        <a href="{{Route('katalog' , ['no' => '4', 'id' => 'data'])}}" class="black"><p>3 Tahun Keatas</p></a>
                    </div>
                    <div class="floatLeft footer-col3">
                        <p><b>Newslatter</b></p>
                        <p>Daftarkan email Anda untuk menerima penawaran menarik dari kami !</p>
                        
                        <form class="form-inline">
                            {!! Form::email('email_desktop',null, ['class' => 'form-control pull-left width80Per', 'placeholder' => 'Email Anda']) !!}
                            <button type="submit" class="black bgabu butFoot width20Per">Daftar</button>
                    </div>
                </div>
            </div>{{-- isi Footer ukuran desktop --}}
            {{-- isi Footer ukuran mobile --}}
            <div class="kecila paddingLeft50 bgabumuda  paddingRight50">
                <p><b>Newslatter</b></p>
                <p>Daftarkan email Anda untuk menerima penawaran menarik dari kami !</p>
                <form class="form-inline">
                    {!! Form::email('email_mobile',null, ['class' => 'form-control pull-left width75Per', 'placeholder' => 'Email Anda']) !!}
                    <button type="submit" class="black bgabu butFoot width25Per">Daftar</button>
              </form>
            </div>{{-- isi Footer ukuran mobile --}}
    </div>
</div>

        {{-- Isi footer bawah  --}}
<div class="container-fluid bgabu width100Per">
    <div class="container">
        <div class="col-sm-12 bgabu">
            <div class="paddingTop10">
                {{-- ukuran desktop --}}
                <div class="normalb">
                    <p>2016 KIDZO. All right reserved<span class="floatRight">Develop by : Thunderlab Indonesia</span></p>
                </div>

                {{-- ukuran mobile --}}
                <div class="kecilb">
                    <p>2016 KIDZO. All right reserved</br>Develop by : Thunderlab Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}