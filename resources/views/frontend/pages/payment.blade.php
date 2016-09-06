@extends('frontend.layout.layout')
@section('content')
<div class="col-md-12 col-sm-12 jumbotron text-center">
	<h1>Barang yang akan diproses :</h1>
	@foreach($page_datas->datas['transaksi']['barang'] as $key => $data)
		<h2>Nama Mainan : {{$data['nama']}}</h2>
		<h3>Jumlah Disewa : {{$data['jumlah']}} buah</h3>
		<h3>Lama Penyewaan : {{$data['lama-sewa']}} hari</h3>
		<h3>Tanggal Awal : {{$data['tanggal-keluar']}}</h3>
		<h3>Tanggal Akhir : {{$data['tanggal-masuk']}}</h3>
		<h3>Subtotal : {{$data['jumlah'] * $data['lama-sewa'] * $data['harga']}}</h3>
	@endforeach
	<h3>Total : {{$page_datas->datas['total']}}</h3>
</div>
@stop