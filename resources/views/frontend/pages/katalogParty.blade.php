@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="col-md-3 col-sm-3 borderRight1" style="min-height: calc(95vh)">
				<h5 class="mtop-s"><b>Kategori</b></h5>
				<a href="{{Route('party' , ['no' => '0'])}}"><h5 class="mleft-s black">Semua</h5></a>
				<a href="{{Route('party' , ['no' => '1'])}}"><h5 class="mleft-s black">0 - 1 Tahun</h5></a>
				<a href="{{Route('party' , ['no' => '2'])}}"><h5 class="mleft-s black">1 - 2 Tahun</h5></a>
				<a href="{{Route('party' , ['no' => '3'])}}"><h5 class="mleft-s black">2 - 3 Tahun</h5></a>
				<a href="{{Route('party' , ['no' => '4'])}}"><h5 class="mleft-s black">3 Tahun Keatas</h5></a>
			</div>
			<div class="col-md-9 col-sm-9">
				<div class="col-md-12 mtop-s">
					<h1>Koleksi Party</h1>
					<hr class="garis-bawah-ungu pull-left mtop-0" width="50">
				</div>
				<div class="col-md-12">
					@foreach ($page_datas->datas as $key => $data)
					<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
						@include('frontend.widget.party')
					</div>
					@endforeach
				</div>
				<div class="col-md-12 text-right pagination">
					{{$page_datas->datas->render()}}
				</div>
			</div>
		</div>
	</div>
@stop