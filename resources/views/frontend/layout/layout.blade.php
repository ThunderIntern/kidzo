<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		{!! Html::style(elixir('css/frontend.css')) !!}
        <title>@section('title','Welcome')</title>
    <body>
        @include('frontend.widget.header')
		@yield('content')
        @include('frontend.widget.footer')
    </body>
        {!! Html::script(elixir('js/frontend.js')) !!}
</html>
