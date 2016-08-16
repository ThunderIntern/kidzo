<!--Document

Desktop :yang akan muncul saat ukuran desktop
Mobile  :yang akan muncul saat ukuran mobile

class
- borderTop5     : border top sebesar 5px
- borderRight1   : border kanan 1 px
- dan sejenisnya . . . .

- bgred : background merah
- red   : merah
- dan sejenisnya . . . .

button:
- buttonNav : button di navbar yang muncul saat ukuran mobile

-->
            <!-- Tampilan saat desktop -->
            <div class="desktop paddingBottom80">
                <div class="navbar container-fluid bgwhite posisiFix width100Per height87 zindex1 paddingBottom7">
                <nav class="paddingBottom1 navbar-fixed-top bgwhite container">                
                    <div class="col-sm-12">
                        <a href="{{Route('home')}}"><img src="{{asset('image/frontend/logo.png')}}" class="gambarHead marginTop5 pull-left posisiAbs"></a>
        
                        <div class="menu tengah"> {{-- posisi menu di tengah layar pas--}}
                            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#tes">
                                &#9776;                                                 
                            </button>
                            <?php $segment1 =  Request::segment(1);  ?>
                            <div class="collapse navbar-toggleable-xs" id="tes">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item borderTop5 green"></li>
                                    <li class="homeHover nav-item borderTop5 red paddingBottom25  paddingTop25">
                                        <a class="marginRight-10 paddingRight10 black paddingBottom20 paddingTop20 borderRight1 <?php if($segment1=='home') echo 'red';?>" href="{{Route('home')}}">Home</a>
                                   </li>
                                    <li class="mainanHover nav-item borderTop5 green paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black borderRight1 <?php if($segment1=='mainan') echo 'green';?>" href="#">Mainan</a>
                                    </li>
                                    <li class="partyHover nav-item borderTop5 orange paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black borderRight1 <?php if($segment1=='party') echo 'orange';?>" href="#">Party Pack</a>
                                    </li>
                                    <li class="tentangHover nav-item borderTop5 purple paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black borderRight1 <?php if($segment1=='about') echo 'purple';?>" href="{{Route('about')}}">Tentang Kami</a>
                                    </li>
                                    <li class="loginHover nav-item borderTop5 blue paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black <?php if($segment1=='login') echo 'blue';?>" href="{{Route('signuped')}}">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="pull-right"> {{-- Tombol shoping cart + search --}}
                            <a href="#">        {{-- Tombol shoping cart --}}        
                                <button class="navbar-toggler padding30 dropbtn right-navbar-button" type="button">
                                    <i class="fa fa-shopping-cart fa-lg black" aria-hidden="true"></i>
                                </button>
                            </a>
                            <div class="dropdown">  {{-- Tombol search --}}
                                <a href="javascript:void(0)">
                                    <button onclick="dropSearch(this)" class="dropbtn navbar-toggler padding30 right-navbar-button" type="button">
                                        <i class="fa fa-search fa-lg black" aria-hidden="true"></i>
                                    </button>
                                </a>
                                {{-- Yang keluar saat tombol search ditekan --}}
                                <div id="myDropdown" class="dropdown-content box drop-search"> 
                                        <form method="GET" action="#" accept-charset="UTF-8" class="p-y-0">
                                            <div class="input-group">
                                                <input type="text" name="search" value="" class="form-control navbar-input-search" placeholder="Pencarian Produk">
                                                <span class="input-group-btn">
                                                    <button class="btn navbar-btn-search" type="submit">Cari</button>
                                                </span>
                                            </div>
                                        </form>

                                        <a href="#" class="textCenter navbar-advance-search">Advance Search</a>
                                </div>
                            </div> {{-- Tombol search --}}
                        </div>{{-- Tombol shoping cart + search --}}
                        <div id="myDropdown" class="dropdown-content box width25Per marginTop79 marginRight15"> 
                            <form class="form-inline">
                                    {!! Form::text('email_mobile',null, ['class' => 'form-control width80Per', 'placeholder'=>'Cari Produk']) !!}
                                    <button type="submit" class="black bgabu butFoot width20Per">Cari</button>
                                    <a href="#" class="textCenter">Advance Search</a>
                            </form>
                        </div>
                    </div>
                </nav>
                </div>
            </div>
            <!---->

            {{-- Saat ukuran mobile --}}
            <div class="mobile marginBottom75"> 
                <nav class="navbar navbar-fixed-top paddingBottom1 bgwhite">
                    <div class="col-sm-12">
                        
                        <a href="{{Route('home')}}"><img src="{{asset('image/frontend/logo.png')}}" class="gambarHead marginTop5 pull-left"></a>

                        <div class="floatRight paddingRight10">
                            {{-- Button shoping --}}
                            <button class="navbar-toggler padding30 dropbtn" type="button">
                                <a href="#"><i class="fa fa-shopping-cart fa-lg paddingRight10 black" aria-hidden="true"></i></a>
                            </button>


                            <div class="dropdown">  {{-- Tombol search --}}
                                <a href="#">
                                    <button onclick="myFunction3()" class="black dropbtn navbar-toggler padding30" type="button" data-toggle="collapse">
                                        &#9776;
                                    </button>
                                </a>                                
                            </div> {{-- Tombol search --}}
                        </div>
                    </div>
                    {{-- Yang keluar saat tombol search ditekan --}}
                    <div id="myDropdown3" class="dropdown-content box marginTop77"> 
                                    <form class="form-inline marginTop15 paddingLeft30 paddingRight30">
                                            {!! Form::text('email_mobile',null, ['class' => 'form-control width80Per floatLeft', 'placeholder'=>'Cari Mainan']) !!}
                                            <button type="submit" class="black bgabu width20Per butFoot floatLeft"><i class="fa fa-search fa-lg black" aria-hidden="true"></i></button>
                                        </br></br><button type="submit" class="buttonAdvan width100Per">
                                        <a href="#" class="textCenter">
                                            <div style="color:#808080">Pencarian Lanjutan</div>
                                        </a></button>
                                    </form>
                                    </br></br>
                                     <ul class="nav navbar-nav">
                                        <li class="nav-item borderTop5">
                                        </li>
                                        <li class="nav-item hoverHome">
                                            <a class="nav-link pull-left paddingLeft30" href="{{Route('home')}}">
                                                <div class="red">Home</div>
                                            </a>
                                        </li>
                                        <li class="nav-item hoverMainan ">
                                            <a class="nav-link pull-left paddingLeft30" href="#">
                                                <div class="green">Mainan</div>
                                            </a>
                                        </li>
                                        <li class="nav-item hoverParty ">
                                            <a class="nav-link pull-left paddingLeft30" href="#">
                                                <div class="orange">Party Package</div>
                                            </a>
                                        </li>
                                        <li class="nav-item hoverTentang ">
                                            <a class="nav-link pull-left paddingLeft30" href="{{Route('about')}}">
                                                <div class="purple">Tentang Kami</div>
                                            </a>
                                        </li>
                                        <li class="nav-item hoverLogin">
                                            <a class="nav-link pull-left paddingLeft30" href="{{Route('signuped')}}">
                                                <div class="blue">Login</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                </nav>
            </div>{{-- Saat ukuran mobile --}}
            
            
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function dropSearch(e) {
    $('#myDropdown').slideToggle('show');
    if($(e).hasClass( 'active' )){
        $(e).removeClass("active");
    }else{
        $(e).addClass("active");
    }
}
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}
function myFunction3() {
    document.getElementById("myDropdown3").classList.toggle("show");
}

</script>