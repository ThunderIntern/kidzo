<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		{!! Html::style(elixir('css/app.css')) !!}
        <title>@section('title','Welcome')</title>
		<style>
            .text{
                font-family: 'Lato';
            }
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

            @media (max-width: 768px){
                .dekstop{
                    display: none;
                }
                .normala, .normalb{
                    display:none;
                }
                .kecila{
                    padding-top: 50px;
                    padding-bottom: 50px;
                }
                .kecilb{
                    text-align: center;
                    padding-bottom: 15px;
                    padding-top: 15px;
                }
                .email{
                    border-bottom-left-radius: 5px;
                    border-top-left-radius: 5px;
                    border:1px solid #E2E2E2;
                    padding:5px 10px;
                }
                button{
                    border-bottom-right-radius: 5px;
                    border-top-right-radius: 5px;
                    border:1px solid #E2E2E2;
                    padding:5px 10px;
                    margin-left: -5px;
                }
            }

            @media(min-width: 992px){
                .mobile{
                    display: none;
                }
                .kecila, .kecilb{
                    display:none;
                }
                .normala{
                    padding-top: 30px;
                    padding-bottom: 170px;
                }
                .email{
                    border-bottom-left-radius: 5px;
                    border-top-left-radius: 5px;
                    border:1px solid #E2E2E2;
                    padding:5px 10px;
                }
                button{
                    border-bottom-right-radius: 5px;
                    border-top-right-radius: 5px;
                    border:1px solid #E2E2E2;
                    padding:5px 10px;
                    margin-left: -5px;
                }
            }
		</style>
	</head>
    <body>
		@include('frontend.widget.header')
		@yield('content')
		@include('frontend.widget.footer')
    </body>
    {!! Html::script(elixir('js/app.js')) !!}
</html>
