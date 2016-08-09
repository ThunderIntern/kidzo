{{-- Menampung kiriman dari function/email.php --}}
@extends('email.layout.layout')
@section('content')
<div class="isi">
	<h3 style="text-align:center;">{{$judul}}</h3></br>
	<p  style="padding-left:70px;">{{$konten}}</p>
</div>
@stop