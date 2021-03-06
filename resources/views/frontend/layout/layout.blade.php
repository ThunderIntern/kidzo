<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Start of Zopim Live Chat Script-->
        <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '36a97727-509f-4f3f-98ca-1ae109ae1e77', f: true }); done = true; } }; })();
        </script>
        <!--End of Zopim Live Chat Script-->
        
        
        <meta http-equiv="Content-Type" content="text/html" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        {!! Html::script(elixir('js/frontend.js')) !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
        
        
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Bubblegum+Sans'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
		{!! Html::style(elixir('css/frontend.css')) !!}
        <title>@section('title','Welcome')</title>
    </head>
    <body>
        @include('frontend.widget.header')
        <div style="min-height: calc(90vh - 70px)">
		@yield('content')
        </div>
        @include('frontend.widget.footer')
    </body>
    <script>
        @yield('scripts')
    </script>
</html>
