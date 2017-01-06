@if(is_null(Session::get('email')))
<script type="text/javascript ">
   	window.location.href = '{{route("home")}}';
</script>
@else
@extends('frontend.layout.layout')
@section('content')

	<div class="container pleft-l pright-l">
		<div class="row mtop-s mbottom-s">
			<div class="col-md-12 col-sm-12 text-center">
				<h1>Terima Kasih</h1>
				<hr class="garis-bawah" width="70">
			</div>
		</div>
		<div class="bgblue mbottom-s" style="border-radius:5px">
			<div class="pleft-l pright-l">
				<div class="pleft-s pright-s">
					<h2 class="white ptop pbottom font-mobile text-center">
						Anda Telah Berhenti Berlangganan<br>Terima Kasih Telah Mendaftar Newsletter Kidzo
					</h2>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row mbottom-s mtop-s">
		<div class="col-md-12 col-sm-12 text-center">
			<h1>Mungkin Anda Suka</h1>
			<hr class="garis-bawah" width="70">
		</div>
	</div>

	<div class="container pleft-l pright-l">
	<div class="row mbottom-l">
			<div class="col-md-12">
				@for($i=0;$i<4;$i++)
				<div class="col-sm-12 col-md-3">
					@include('frontend.widget.truck')
				</div>
				@endfor
			</div>
		</div>
		<div class="row mbottom-l">
			<div class="col-md-12 desktop">
				<h2 class="blue"><b>Temukan <a class="orange">{{$page_datas->mainan}}</a> Koleksi Mainan Lainnya !</b>
				<a href="{{Route('katalog' , ['no' => '0', 'id' => 'data'])}}"><button class="btn btn-primary btn-lg white pull-right butKoleksi">Lihat Koleksi</button></a></h2>
			</div>
			<div class="col-sm-12 desktop text-center">
				<a href="{{Route('katalog' , ['no' => '0', 'id' => 'data'])}}"><button class="btn btn-primary btn-lg white butKoleksi2">Lihat Koleksi</button></a>
			</div>
			<div class="col-sm-12 mobile text-center">
				<h2 class="blue"><b>Temukan <a class="orange">{{$page_datas->mainan}}</a> Koleksi Mainan Lainnya !</b></h2>
			</div>
			<div class="col-sm-12 mobile text-center">
				<a href="{{Route('katalog' , ['no' => '0', 'id' => 'data'])}}"><button class="btn btn-primary btn-lg white">Lihat Koleksi</button></a>
			</div>	
		</div>
	</div>
@stop
@endif