	@extends('frontend.layout.layout')
	@section('content')
	{!! Form::open(['url' => route('signup')]) !!}
		<h1 class="text-center">Sign Up</h1>
		<h2 class="text-center">Username</h2>
            {!! Form::text('username',null, ['class' => 'form-control' ,'placeholder' => 'Username Anda']) !!}
		<h2 class="text-center">Password</h2>
			{!! Form::password('password', ['class' => 'form-control' , 'placeholder' => 'Password Anda']) !!}
		<h2 class="text-center">Confirm Password</h2>
			{!! Form::password('conf_password', ['class' => 'form-control' , 'placeholder' => 'Masukkan Kembali Password Anda']) !!}
		<h2 class="text-center">Email</h2>
			{!! Form::email('email',null, ['class' => 'form-control' , 'placeholder' => 'Example@Example.com']) !!}
		<h2 class="text-center">Name Lengkap</h2>
            {!! Form::text('nama',null, ['class' => 'form-control' , 'placeholder' => 'Nama Lengkap Anda']) !!}
        <h2 class="text-center">Phone Number</h2>
            {!! Form::number('no',null, ['class' => 'form-control' , 'placeholder' => 'Nomor Telepon Anda']) !!}
        <h2 class="text-center">Address</h2>
            {!! Form::textArea('alamat',null , ['class' => 'form-control textarea', 'placeholder' => 'Alamat Anda']) !!}
		<br><br><button class="btn btn-success" type="submit">Daftar</button><br><br>
    {!! Form::close() !!}
    @stop
