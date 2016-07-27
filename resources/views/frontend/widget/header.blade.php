<!--Document

Desktop :yang akan muncul saat ukuran desktop
Mobile  :yang akan muncul saat ukuran mobile

class
- borderTopLima     : border top sebesar 5px
- borderRightSatu   : border kanan 1 px
- dan sejenisnya . . . .
- bgred : background merah
- red   : merah

button:
- buttonNav : button di navbar saat ukuran mobile

-->
        <div class="row">
            
            <nav class="navbar navbar">
                <div class="container-fluid">
                    <div class="desktop">
                        <div class="col-sm-4">
                            <div class="col-sm-1"></div>
                            <img src="logo.png">
                        </div>
                        <div class="col-sm-4">
                            <nav class="navbar navbar-light">
                                <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#tes">
                                    &#9776;
                                </button>
                                <div class="collapse navbar-toggleable-xs" id="tes">
                                    <ul class="nav navbar-nav">
                                        <li class="nav-item borderTopLima borderRightSatu red">
                                            <a class="nav-link" href="#">Home</a>
                                        </li>
                                        <li class="nav-item borderTopLima borderRightSatu green">
                                            <a class="nav-link" href="#">Mainan</a>
                                        </li>
                                        <li class="nav-item borderTopLima borderRightSatu orange">
                                            <a class="nav-link" href="#">Party Pack</a>
                                        </li>
                                        <li class="nav-item borderTopLima borderRightSatu purple">
                                            <a class="nav-link" href="#">Tentang Kami</a>
                                        </li>
                                        <li class="nav-item borderTopLima blue">
                                            <a class="nav-link" href="#">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-6"></div>
                            <ul class="nav navbar-nav">
                                <div class="col-sm-2"><a href="#"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><a href="#"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a></div>
                            </ul>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>


                    <div class="mobile">
                        <div class="col-sm-12">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-3">
                                <img src="logo.png">
                                <div class="floatRight">
                                    <a href="#"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                                        <button class="navbar-toggler hidden-sm-up buttonNav" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
                                        &#9776;
                                        </button>
                                        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                                            <ul class="nav navbar-nav">
                                                <li class="nav-item borderTopLima borderRightSatu red">
                                                    <a class="nav-link" href="#">Home</a>
                                                </li>
                                                <li class="nav-item borderTopLima borderRightSatu green">
                                                    <a class="nav-link" href="#">Mainan</a>
                                                </li>
                                                <li class="nav-item borderTopLima borderRightSatu orange">
                                                    <a class="nav-link" href="#">Party Pack</a>
                                                </li>
                                                <li class="nav-item borderTopLima borderRightSatu purple">
                                                    <a class="nav-link" href="#">Tentang Kami</a>
                                                </li>
                                                <li class="nav-item borderTopLima blue">
                                                    <a class="nav-link" href="#">Login</a>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>