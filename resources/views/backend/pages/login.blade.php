@if(is_null(Session::get('key')))
<?php //dd(Session::get('key')); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{!! Html::style(elixir('css/backend.css')) !!}
        <title>CMS LOGIN</title>
    </head>
    <body>
    <div id="box">
        <h1 class="mtop25">CMS LOGIN</h1>
        {!! Form::open(['url' => route('logincms')]) !!}
        <div class="jumbotron text-center">
            {!! Form::text('username',null, array('class' => 'form-control mbottom10' , 'placeholder' => 'Username')) !!}
            {{ Form::password('password', array('class' => 'form-control mbottom10' , 'placeholder' => 'Password')) }}
            <button class="btn btn-primary text-uppercase form-control" type="submit">Login</button>
        </div>
        {!! Form::close() !!}
    </div>
    </body>
    {!! Html::script(elixir('js/backend.js')) !!}
</html>
 @else
    <script type="text/javascript ">
        window.location.href = '{{route("backend.dashboard")}}';
    </script>
@endif