	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('updatePassword')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Ubah Password</h1>
		<p class="pull-left"><b>Old Password</b></p>
        {!! Form::password('password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Lama Anda']) !!}
        <p class="pull-left"><b>New Password</b></p>
        {!! Form::password('new_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Baru Anda']) !!}
        <p class="pull-left"><b>Confirm Password</b></p>
		{!! Form::password('conf_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Masukkan Kembali Password Baru Anda']) !!}
		<button class="btn btn-success mbottom-s pull-right" type="submit">Register</button>
    {!! Form::close() !!}
    </div>
    @stop
