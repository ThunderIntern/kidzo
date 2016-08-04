<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bubblegum+Sans" />
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>  
		{!! Html::style(elixir('css/frontend.css')) !!}
        <title>@section('title','Welcome')</title>
    <body>
        @include('frontend.widget.header')
		@yield('content')
        @include('frontend.widget.footer')
    </body>
        {!! Html::script(elixir('js/frontend.js')) !!}
</html>
