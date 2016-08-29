	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('updateSetting')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Setting</h1>
		<p class="pull-left"><b>Email</b></p>
		{!! Form::email('email',$page_datas->email, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Example@Example.com', 'readonly'=> 'read']) !!}
		<p class="pull-left"><b>Username</b></p>
        {!! Form::text('username',$page_datas->username, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}
        <p class="pull-left"><b>Full Name</b></p>
        {!! Form::text('nama',$page_datas->name, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nama Lengkap Anda']) !!}
        <p class="pull-left"><b>Phone Number</b></p>
        {!! Form::number('no',$page_datas->phone, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nomor Telepon Anda']) !!}
        <p class="pull-left"><b>Address</b></p>
        {!! Form::textArea('alamat',$page_datas->address , ['class' => 'form-control mbottom-s textarea', 'placeholder' => 'Alamat Anda']) !!}
        <a href="{{route('password')}}" class="pull-left"><b>Change Password</b></a>
		<button class="btn btn-success mbottom-s pull-right" type="submit">Save</button>
    {!! Form::close() !!}
    </div>
    @stop
