	@extends('frontend.layout.layout')
	@section('content')
	{!! Form::open(['url' => route('login')]) !!}
		<h1 class="text-center">Login</h1>
		<h2>Username</h2>
            {!! Form::text('username',null, ['placeholder' => 'Username Anda']) !!}
		<h2>Password</h2>
			{!! Form::password('password',null, ['placeholder' => 'Password Anda']) !!}
		<br><br><button class="btn btn-success" type="submit">Log In</button><br><br>
    {!! Form::close() !!}
    @stop
