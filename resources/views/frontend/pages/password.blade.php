	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('updatePassword')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Ubah Password</h1>
        {!! Form::password('password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Lama Anda']) !!}
        {!! Form::password('new_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Baru Anda']) !!}
		{!! Form::password('conf_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Masukkan Kembali Password Baru Anda']) !!}
		<button class="btn btn-success mbottom-s" type="submit">Daftar</button>
    {!! Form::close() !!}
    </div>
    @stop
