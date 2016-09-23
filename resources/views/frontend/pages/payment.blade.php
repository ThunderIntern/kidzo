@extends('frontend.layout.layout')
@section('content')
<div class="container">
	<div class="col-md-12 col-sm-12 jumbotron text-center">
		@if(is_null($page_datas->datas['total']))
		<h1 class="mbottom-s">Tidak Ada Tagihan</h1>
		<a href="{{route('chart')}}"><button class="btn btn-success">Kembali Ke Chart</button></a>
		@else
		<h1>Barang yang akan diproses :</h1>
		@foreach($page_datas->datas['transaksi'] as $key => $data)
			@foreach($data['barang'] as $key2 => $data2)
				<h2>Nama Mainan : {{$data2['nama']}}</h2>
				<h3>Lama Penyewaan : {{$data2['lama-sewa']}} hari</h3>
				<h3>Tanggal Awal : {{$data2['tanggal-keluar']}}</h3>
				<h3>Tanggal Akhir : {{$data2['tanggal-masuk']}}</h3>
				@if($data2['status'] == 'party')
				<h3>Subtotal : {{$data2['lama-sewa'] * $data2['harga']}}</h3>
				@else
				<h3>Jumlah Disewa : {{$data2['jumlah']}} buah</h3>
				<h3>Subtotal : {{$data2['jumlah'] * $data2['lama-sewa'] * $data2['harga']}}</h3>
				@endif
			@endforeach
		@endforeach
		<h3 class="mbottom-m">Total : {{$page_datas->datas['total']}}</h3>
		<div class="text-center">
			<a href="{{route('batal')}}"><button class="btn btn-danger">Batalkan Pesanan</button></a>
			<a href="{{route('prosesBayar')}}"><button class="btn btn-success">Bayar Tagihan</button></a>
		</div>
		@endif
	</div>
</div>
@stop