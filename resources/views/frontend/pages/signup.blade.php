	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('signup')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Sign Up</h1>
        {!! Form::text('username',null, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}
		{!! Form::password('password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Anda']) !!}
		{!! Form::password('conf_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Masukkan Kembali Password Anda']) !!}
		{!! Form::email('email',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Example@Example.com']) !!}
        {!! Form::text('nama',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nama Lengkap Anda']) !!}
        {!! Form::number('no',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nomor Telepon Anda']) !!}
        {!! Form::textArea('alamat',null , ['class' => 'form-control mbottom-s textarea', 'placeholder' => 'Alamat Anda']) !!}
		<button class="btn btn-success mbottom-s" type="submit">Daftar</button>
    {!! Form::close() !!}
    </div>
    @stop
