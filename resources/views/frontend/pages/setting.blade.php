	@extends('frontend.layout.layout')
	@section('content')
	<div id="box">
	{!! Form::open(['url' => route('updateSetting')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Setting</h1>
		{!! Form::email('email',$page_datas->email, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Example@Example.com', 'readonly'=> 'read']) !!}
        {!! Form::text('username',$page_datas->username, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}
        {!! Form::text('nama',$page_datas->name, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nama Lengkap Anda']) !!}
        {!! Form::number('no',$page_datas->phone, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nomor Telepon Anda']) !!}
        {!! Form::textArea('alamat',$page_datas->address , ['class' => 'form-control mbottom-s textarea', 'placeholder' => 'Alamat Anda']) !!}
		<button class="btn btn-success mbottom-s" type="submit">Save</button>
    {!! Form::close() !!}
    </div>
    @stop
