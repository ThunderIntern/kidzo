@extends('frontend.layout.layout')
@section('content')
<div class="container">
	<div id="box">
	{!! Form::open(['url' => route('checkOut')]) !!}
		<h1 class="text-center mtop-s mbottom-s">Isi Data Penyewaan</h1>
		<p class="pull-left"><b>Nama Penerima</b></p>
        {!! Form::text('nama',null, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Nama Penerima']) !!}
        <p class="pull-left"><b>Alamat Penerima</b></p>
        {!! Form::textArea('alamat',null , ['class' => 'form-control mbottom-s textarea', 'placeholder' => 'EX : Jl.Blimbing 124 Malang Jawa Timur / 65478']) !!}
        <p class="pull-left"><b>Nomor Telepon Yang Dapat Dihubungi</b></p>
        {!! Form::number('no',null, ['class' => 'form-control mbottom-s' , 'placeholder' => 'Nomor Telepon Anda']) !!}
		<button class="btn btn-success mbottom-s pull-right" type="submit">Save</button>
    {!! Form::close() !!}
    </div>
</div>
@stop