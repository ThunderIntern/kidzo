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
        
            <div class="desktop marginBottom75">
                <nav class="navbar navbar  navbar-fixed-top paddingBottom1 bgwhite">
                    <div class="col-sm-12">
                        <img src="{{asset('image/frontend/logo.png')}}" class="paddingTop5 pull-left posisiAbs">

                        <div class="menu tengah">
                            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#tes">
                                &#9776;
                            </button>
                            <div class="collapse navbar-toggleable-xs" id="tes">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item borderTop5 green"></li>
                                    <li class="nav-item borderTop5 red paddingBottom25  paddingTop25">
                                        <a class="marginRight-10 paddingRight10 black paddingBottom20 paddingTop20 borderRight1" href="{{Route('home')}}">Home</a>
                                   </li>
                                    <li class="nav-item borderTop5 green paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black borderRight1" href="#">Mainan</a>
                                    </li>
                                    <li class="nav-item borderTop5 orange paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black borderRight1" href="#">Party Pack</a>
                                    </li>
                                    <li class="nav-item borderTop5 purple paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black borderRight1" href="{{Route('about')}}">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item borderTop5 blue paddingBottom25 paddingTop25">
                                        <a class="marginRight-10 paddingRight10 paddingBottom20 paddingTop20 black" href="#">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tombol pull-right">
                            <a href="#">
                                <button class="navbar-toggler padding30 dropbtn" type="button">
                                    <i class="fa fa-shopping-cart fa-lg black" aria-hidden="true"></i>
                                </button>
                            </a>
                            <div class="dropdown">
                                <a href="#">
                                    <button onclick="myFunction()" class="dropbtn navbar-toggler padding30" type="button">
                                        <i class="fa fa-search fa-lg black" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <div id="myDropdown" class="dropdown-content" style="width:250px">
                                    <form class="form-inline">
                                            {!! Form::email('email_mobile',null, ['class' => 'form-control width80Per', 'placeholder'=>'Cari Produk']) !!}
                                            <button type="submit" class="black bgabu butFoot">Cari</button>
                                            <a href="#" class="textCenter">Advance Search</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="mobile marginBottom85">
                <nav class="navbar navbar  navbar-fixed-top paddingBottom1 bgwhite">
                    <div class="col-sm-12">
                        <img src="{{asset('image/frontend/logo.png')}}" class="paddingTop5 floatLeft paddingLeft10">
                        <div class="floatRight paddingRight10">
                            <button class="navbar-toggler padding30 dropbtn" type="button">
                                <a href="#"><i class="fa fa-shopping-cart fa-lg paddingRight10 black" aria-hidden="true"></i></a>
                            </button>
                            <button class="navbar-toggler padding10" type="button" data-toggle="modal" data-target="#myModal2">
                                &#9776;
                            </button>
                            <!-- Modal -->
                            <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br></br>
                                            <div class="icon pull-right">
                                                <button class="navbar-toggler padding10" type="button">
                                                    <a href="#"><i class="dropbtn black fa fa-shopping-cart fa-lg paddingRight50" aria-hidden="true"></i></a>
                                                </button>
                                                <button class="navbar-toggler padding10 dropbtn" type="button">
                                                    <a href="#"><i class="black fa fa-search fa-lg" aria-hidden="true"></i></a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="nav navbar-nav">
                                                <li class="nav-item borderTop5 green">
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link black pull-right" href="{{Route('home')}}">Home</a>
                                                </li>
                                                <li class="nav-item borderTop1 green">
                                                    <a class="nav-link black pull-right" href="#">Mainan</a>
                                                </li>
                                                <li class="nav-item borderTop1 orange">
                                                    <a class="nav-link black pull-right" href="#">Party Pack</a>
                                                </li>
                                                <li class="nav-item borderTop1 purple">
                                                    <a class="nav-link black pull-right" href="{{Route('about')}}">Tentang Kami</a>
                                                </li>
                                                <li class="nav-item borderTop1 blue">
                                                    <a class="nav-link black pull-right" href="#">Login</a>
                                                </li></br></br></br></br></br></br></br></br></br></br></br></br></br>
                                            </ul>
                                        </div>
                                    </div><!-- modal-content -->
                                </div><!-- modal-dialog -->
                            </div><!-- modal -->
                        </div>
                    </div>
                </nav>
            </div>
            
<script>
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      
    }
  }
}
</script>