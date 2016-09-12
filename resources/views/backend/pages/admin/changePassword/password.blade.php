	@extends('backend.pages.admin.layout')
	@section('page_content')
	<div class="card">
		<div class="card-block">
	{!! Form::open(['method'=>'PUT', 'url' => route('backend.admin.changePassword.update', ['id' => 'asdfg'])]) !!}
		<h1 class="text-center mtop-s">Ubah Password</h1>
		<p class="pull-left mbottom10"><b>Old Password</b></p>
        {!! Form::password('password', ['class' => 'form-control mbottom10' , 'placeholder' => 'Password Lama Anda']) !!}
        <p class="pull-left mbottom10"><b>New Password</b></p>
        {!! Form::password('new_password', ['class' => 'form-control mbottom10' , 'placeholder' => 'Password Baru Anda']) !!}
        <p class="pull-left mbottom10"><b>Confirm Password</b></p>
		{!! Form::password('conf_password', ['class' => 'form-control' , 'placeholder' => 'Masukkan Kembali Password Baru Anda']) !!}</br>
		<button class="btn btn-success" type="submit">Register</button>
    {!! Form::close() !!}
	    </div>
	</div>
    @stop
