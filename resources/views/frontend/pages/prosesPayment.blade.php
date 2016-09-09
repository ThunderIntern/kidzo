@extends('frontend.layout.layout')
@section('content')
<div class="container">
	<div id="box">
	{!! Form::open(['url' => route('bayar'), 'enctype'=>"multipart/form-data"]) !!}
		<h1 class="text-center mtop-s mbottom-s">Isi Data Pembayaran</h1>
        <input type="file" class="form-control mbottom-s" name="file_photo">
		<p class="pull-left"><b>Jumlah Dibayar</b></p>
        {!! Form::number('jumlah',null, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Jumlah yang akan dibayar']) !!}
        <p class="pull-left"><b>Keterangan</b></p>
        {!! Form::textArea('keterangan',null , ['class' => 'form-control mbottom-s textarea', 'placeholder' => 'EX: Bukti Transfer Pembayaran']) !!}
        <button class="btn btn-success mbottom-s pull-right" type="submit">Send</button>
    {!! Form::close() !!}
    </div>
</div>
@stop