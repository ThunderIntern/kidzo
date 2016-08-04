<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{!! Html::style(elixir('css/backend.css')) !!}
        <title>@section('title','Dashboard')</title>
    </head>
    <body>
        @include('backend.widgets.topbar')
        @yield('content')
		@yield('modal')
    </body>
    {!! Html::script(elixir('js/backend.js')) !!}
    <script>
        @yield('scripts')
    </script>
</html>
