
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Start of Zopim Live Chat Script-->
        <script type="text/javascript">
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="//v2.zopim.com/?49sPCi58YCcchToBgubnDnkN5xWzfhmL";z.t=+new Date;$.
            type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
        </script>
        <!--End of Zopim Live Chat Script-->
        <meta http-equiv="Content-Type" content="text/html" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        {!! Html::script(elixir('js/frontend.js')) !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        
        
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Bubblegum+Sans'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
		{!! Html::style(elixir('css/frontend.css')) !!}
        <title>@section('title','Welcome')</title>
    </head>
    <body>
        @include('frontend.widget.header')
		@yield('content')
        @include('frontend.widget.footer')
    </body>
    <script>
        @yield('scripts')
    </script>
</html>
