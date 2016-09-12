	@if(is_null(Session::get('akun')))
	<?php //dd(Session::get('akun')); ?>
	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('verification')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Forgot Password</h1>
		<p class="pull-left"><b>Username</b></p>
		{!! Form::text('username',null, ['placeholder' => 'Masukkan username anda' , 'class' => 'form-control mbottom-s']) !!}
		<p class="pull-left"><b>Email</b></p>
        {!! Form::text('email',null, ['placeholder' => 'Masukkan email anda' , 'class' => 'form-control mbottom-s']) !!}
		<button class="btn btn-success mbottom-s pull-right" type="submit">Send Verification</button>
    {!! Form::close() !!}
    </div>
    @stop
    @else
    	<script type="text/javascript ">
    		window.location.href = '{{route("home")}}';
		</script>
	@endif