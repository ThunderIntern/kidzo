<!--Document

Normala + normalb :yang akan muncul saat ukuran desktop
Kecila + kecilb  :yang akan muncul saat ukuran mobile
email : mengubah model form email di footer

class
- borderTopLima     : border top sebesar 5px
- borderRightSatu   : border kanan 1 px
- dan sejenisnya . . . .

- bgred : background merah
- red   : merah
- dan sejenisnya . . . .

button:
- butFoot : mengubah model button di footer

-->

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        {!! Html::script(elixir('js/app.js')) !!}
        {!! Html::style(elixir('css/app.css')) !!}
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    </head>
    <body>
        <div class="row">
            <div class="col-sm-12">
                <div class="floatLeft widthDuaPuluh heightLima bgred"></div>
                <div class="floatLeft widthDuaPuluh heightLima bggreen"></div>
                <div class="floatLeft widthDuaPuluh heightLima bgorange"></div>
                <div class="floatLeft widthDuaPuluh heightLima bgpurple ungu"></div>
                <div class="floatLeft widthDuaPuluh heightLima bgblue"></div>
            </div>
        </div>

        <footer>
        <div class="row ">
                <div class="container-fluid">
                    <div class="col-sm-12 paddingSamping bgsky">
                        <div class="normala">
                            <div class="paddingTop25 floatLeft width17">
                                <div class="col-sm-1"></div>
                                <img src="logo.png" class="gambar">
                            </div>
                            <div class="floatLeft width26">
                                <p><b>PT.KIDZO GEMBIRA SENTOSA</b></p>
                                <p>THE CEO BUILDING, Lv 12</p>
                                <p>Jl.TB Simatupang No. 18C</p>
                                <p>Jakarta Selatan 12430, Indonesia</p>
                                <p>contact[at]kidzo.id</p>
                            </div>
                            <div class="floatLeft width17">
                                <p><b>Kategori Mainan</b></p>
                                <a href="#"><p>0 - 1 Tahun</p></a>
                                <a href="#"><p>1 - 2 Tahun</p></a>
                                <a href="#"><p>2 - 3 Tahun</p></a>
                                <a href="#"><p>3 Tahun Keatas</p></a>
                            </div>
                            <div class="floatLeft width40">
                                <p><b>Newslatter</b></p>
                                <p>Daftarkan email Anda untuk menerima penawaran menarik dari kami !</p>
                                <form class="form-inline" role="form">
                                    <input type="text" class="form email width330" placeholder="Email Anda">
                                    <button type="submit" class="bgabu butFoot">Daftar</button>
                                </form>
                            </div>
                        </div>
                            <div class="kecila">
                                <p><b>Newslatter</b></p>
                                <p>Daftarkan email Anda untuk menerima penawaran menarik dari kami !</p>
                                
                                    <input type="text" class="form email width330" placeholder="Email Anda">
                                    <button type="submit" class="bgabu butFoot">Daftar</button>
                            </div>
                        
                    </div>
                </div>
        </div>


        <div class="row">
            <div class="container-fluid paddingTop10 paddingLeft50 paddingRight50 bgabu">
                <div class="col-sm-12">
                    <div class="normalb">
                        <p>2016 KIDZO. All right reserved<span class="floatRight">Develop by : Thunderlab Indonesia</span></p>
                    </div>

                    <div class="kecilb">
                        <p>2016 KIDZO. All right reserved</br>Develop by : Thunderlab Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
        </footer>
    </body>
</html>
