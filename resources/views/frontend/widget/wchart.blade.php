<div class="col-md-2 col-sm-2">
	<img style="width: 125px; height: 125px" class="img-responsive img-center pull-left" src="{{asset($data['url'])}}"></img>
</div>
<div class="col-md-4 col-sm-4">
	<h5 class="blue text-left">{{$data['nama']}}</h5>
	<h5 class="black text-left">Pinjam : {{$data['tanggal-keluar']}}</h5>
	<h5 class="black text-left">Kembali : {{$data['tanggal-masuk']}}</h5>
</div>
<div class="col-md-2 col-sm-2">
	<h5 class="text-right">IDR {{$data['harga']}} / Hari</h5>
</div>
<div class="col-md-2 col-sm-2">
	@if($data['status'] == 'party')
	@else
	<h5 class="black">{{$data['jumlah']}}</h5>
	@endif
</div>
<div class="col-md-2 col-sm-2">
	@if($data['status'] == 'party')
	<h5 class="text-right">IDR {{$data['harga']}}</h5>
	@else
	<h5 class="text-right">IDR {{(int)$data['harga'] * (int)$data['jumlah']}}</h5>
	@endif
</div>