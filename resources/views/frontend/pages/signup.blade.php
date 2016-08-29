	@if(is_null(Session::get('key')))
	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('signup')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Sign Up</h1>
		<p class="pull-left"><b>Username</b></p>
        {!! Form::text('username',null, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}
        <p class="pull-left"><b>Password</b></p>
		{!! Form::password('password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Anda']) !!}
		<p class="pull-left"><b>Confirm Password</b></p>
		{!! Form::password('conf_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Masukkan Kembali Password Anda']) !!}
		<p class="pull-left"><b>Email</b></p>
		{!! Form::email('email',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Example@Example.com']) !!}
		<p class="pull-left"><b>Full Name</b></p>
        {!! Form::text('nama',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nama Lengkap Anda']) !!}
        <p class="pull-left"><b>Phone Number</b></p>
        {!! Form::number('no',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nomor Telepon Anda']) !!}
        <p class="pull-left"><b>Address</b></p>
        {!! Form::textArea('alamat',null , ['class' => 'form-control mbottom-s textarea', 'placeholder' => 'Alamat Anda']) !!}
		<button class="btn btn-success mbottom-s pull-right" type="submit">Daftar</button>
    {!! Form::close() !!}
    </div>
    @stop
    @else
    	<script type="text/javascript ">
    		window.location.href = '{{route("home")}}';
		</script>
	@endif