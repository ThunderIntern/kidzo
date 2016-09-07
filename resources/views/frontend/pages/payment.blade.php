@extends('frontend.layout.layout')
@section('content')
<div class="col-md-12 col-sm-12 jumbotron text-center">
	<h1>Barang yang akan diproses :</h1>
	@foreach($page_datas->datas['transaksi'] as $key => $data)
		@foreach($data['barang'] as $key2 => $data2)
			<h2>Nama Mainan : {{$data2['nama']}}</h2>
			<h3>Jumlah Disewa : {{$data2['jumlah']}} buah</h3>
			<h3>Lama Penyewaan : {{$data2['lama-sewa']}} hari</h3>
			<h3>Tanggal Awal : {{$data2['tanggal-keluar']}}</h3>
			<h3>Tanggal Akhir : {{$data2['tanggal-masuk']}}</h3>
			<h3>Subtotal : {{$data2['jumlah'] * $data2['lama-sewa'] * $data2['harga']}}</h3>
		@endforeach
	@endforeach
	<h3>Total : {{$page_datas->datas['total']}}</h3>
</div>
@stop