	@extends('frontend.layout.layout')
	@section('content')
		<h1 class="text-center">Selamat Datang</h1>
		<br><br><a href="{{route('logout')}}"><button class="btn btn-success" type="submit">Log Out</button></a><br><br>
    @stop
