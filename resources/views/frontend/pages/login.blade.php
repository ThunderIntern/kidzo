	@if(is_null(Session::get('key')))
	<?php //dd(Session::get('key')); ?>
	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('login')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Login</h1>
        {!! Form::text('username',null, ['placeholder' => 'Username Anda' , 'class' => 'form-control mbottom-s']) !!}
		{!! Form::password('password', ['placeholder' => 'Password Anda' , 'class' => 'form-control mbottom-s']) !!}
		<button class="btn btn-success mbottom-s" type="submit">Log In</button>
    {!! Form::close() !!}
    </div>
    @stop
    @else
    	<script type="text/javascript ">
    		window.location.href = '{{route("home")}}';
		</script>
	@endif