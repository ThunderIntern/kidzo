<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{!! Html::script(elixir('js/app.js')) !!}
		{!! Html::style(elixir('css/app.css')) !!}
		{!! Html::style(elixir('css/app1.css')) !!}
        <title>@section('title','Welcome')</title>
		<style>
            .satu{
                
                padding-top:25px;
                float :left;
                width:17%;
            }
            .dua{
                float :left;
                width:26%;
            }
            .tiga{
                float :left;
                width:17%;
            }
            .empat{
                float :left;
                width:40%;
            }
            .a, .b, .c, .d, .e{
                float :left;
                width:20%;
                height:5px;
            }
            .foot{
                padding-left: 50px; 
                padding-right: 50px;
                padding-top: 10px;
            }
			.background{
				background: url(../../image/capture1.jpg);
				background-size: cover;
				min-height: 650px;
			}
			.background2{
				background: url(../../image/capture3.jpg);
				background-size: cover;
				min-height: 550px;
			}
			.textcontent{
				padding-left: 10px;
			}
			.home, .mainan, .party, .tentang{
                border-top: 5px solid;
                border-right: 1px solid #ebebe0;
            }
            .login{
                border-top: 5px solid;
            }
            .fa{
                padding-top: 15px;
            }
		</style>
	</head>
    <body>
		@include('frontend.pages.header')
		@yield('content')
		@include('frontend.pages.footer')
    </body>
</html>
