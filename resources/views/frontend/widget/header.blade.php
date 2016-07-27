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
        <div class="container-fluid">
            <nav class="navbar navbar">
                <div class="desktop">
                    <div class="col-sm-12">
                        <img src="{{asset('image/frontend/frontend/logo.png')}}" class="pull-left">

                        <div class="menu tengah">
                            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#tes">
                                &#9776;
                            </button>
                            <div class="collapse navbar-toggleable-xs" id="tes">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item borderTop5 borderRight1 red">
                                        <a class="nav-link black" href="#">Home</a>
                                    </li>
                                    <li class="nav-item borderTop5 borderRight1 green">
                                        <a class="nav-link black" href="#">Mainan</a>
                                    </li>
                                    <li class="nav-item borderTop5 borderRight1 orange">
                                        <a class="nav-link black" href="#">Party Pack</a>
                                    </li>
                                    <li class="nav-item borderTop5 borderRight1 purple">
                                        <a class="nav-link black" href="#">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item borderTop5 blue">
                                        <a class="nav-link black" href="#">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="icon pull-right">
                            <a href="#"><i class="fa fa-shopping-cart fa-2x paddingRight50" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>


                <div class="mobile">
                    <div class="col-sm-12">
                        <img src="{{asset('image/frontend/frontend/logo.png')}}" class="floatLeft paddingLeft10">
                        <div class="floatRight paddingRight10">
                            <a href="#"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                            <button class="navbar-toggler hidden-sm-up buttonNav" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
                            &#9776;
                            </button>
                            <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item borderTop5 borderRight1 red">
                                        <a class="nav-link black" href="#">Home</a>
                                    </li>
                                    <li class="nav-item borderTop5 borderRight1 green">
                                        <a class="nav-link black" href="#">Mainan</a>
                                    </li>
                                    <li class="nav-item borderTop5 borderRight1 orange">
                                        <a class="nav-link black" href="#">Party Pack</a>
                                    </li>
                                    <li class="nav-item borderTop5 borderRight1 purple">
                                        <a class="nav-link black" href="#">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item borderTop5 blue">
                                        <a class="nav-link black" href="#">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>