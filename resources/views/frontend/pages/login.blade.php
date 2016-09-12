	@if(is_null(Session::get('akun')))
	<?php //dd(Session::get('akun')); ?>
	@extends('frontend.layout.layout')
	@section('content')
	<div id="box" >
	{!! Form::open(['url' => route('login')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Login</h1>
		@include('frontend.widget.alertbox')</br>
		<p class="pull-left"><b>Username</b></p>
        {!! Form::text('username',null, ['placeholder' => 'Username Anda' , 'class' => 'form-control mbottom-s']) !!}
        <p class="pull-left"><b>Password</b></p>
		{!! Form::password('password', ['placeholder' => 'Password Anda' , 'class' => 'form-control mbottom-s']) !!}

		<button class="btn btn-success mbottom-s pull-right" type="submit">Log In</button>
		<a href="{{route('forgot')}}" class="pull-left"><b>Forgot Password</b></a></br></br>
		
		<a href="{{route('create')}}" class="pull-left"><b>Create Account</b></a>

    {!! Form::close() !!}
		
    </div>
    @stop
    @else
    	<script type="text/javascript ">
    		window.location.href = '{{route("home")}}';
		</script>
	@endif