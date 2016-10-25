@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="col-md-3 col-sm-3 borderRight1" style="min-height: calc(95vh)">
				<h5 class="mtop-s"><b>Kategori</b></h5>
				@if($page_datas->idSorting == "data")
					<a href="{{Route('katalog' , ['no' => '0', 'id' => 'data'])}}"><h5 class="mleft-s black">Semua</h5></a>
					<a href="{{Route('katalog' , ['no' => '1', 'id' => 'data'])}}"><h5 class="mleft-s black">0 - 1 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '2', 'id' => 'data'])}}"><h5 class="mleft-s black">1 - 2 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '3', 'id' => 'data'])}}"><h5 class="mleft-s black">2 - 3 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '4', 'id' => 'data'])}}"><h5 class="mleft-s black">3 Tahun Keatas</h5></a>
				@endif
				@if($page_datas->idSorting == "terlaris")
					<a href="{{Route('katalog' , ['no' => '0', 'id' => 'terlaris'])}}"><h5 class="mleft-s black">Semua</h5></a>
					<a href="{{Route('katalog' , ['no' => '1', 'id' => 'terlaris'])}}"><h5 class="mleft-s black">0 - 1 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '2', 'id' => 'terlaris'])}}"><h5 class="mleft-s black">1 - 2 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '3', 'id' => 'terlaris'])}}"><h5 class="mleft-s black">2 - 3 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '4', 'id' => 'terlaris'])}}"><h5 class="mleft-s black">3 Tahun Keatas</h5></a>
				@endif
				@if($page_datas->idSorting == "rating")
					<a href="{{Route('katalog' , ['no' => '0', 'id' => 'rating'])}}"><h5 class="mleft-s black">Semua</h5></a>
					<a href="{{Route('katalog' , ['no' => '1', 'id' => 'rating'])}}"><h5 class="mleft-s black">0 - 1 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '2', 'id' => 'rating'])}}"><h5 class="mleft-s black">1 - 2 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '3', 'id' => 'rating'])}}"><h5 class="mleft-s black">2 - 3 Tahun</h5></a>
					<a href="{{Route('katalog' , ['no' => '4', 'id' => 'rating'])}}"><h5 class="mleft-s black">3 Tahun Keatas</h5></a>
				@endif
			</div>
			<div class="col-md-9 col-sm-9">
				<div class="col-md-12 mtop-s">
					<h1>Koleksi Mainan</h1>
					<hr class="garis-bawah-ungu pull-left mtop-0" width="50">
				</div>
				<div class="col-md-12">
					<p class='text-right marginRight15'>Urutkan berdasarkan : 
						@if($page_datas->idSorting == "data")
							<a href="{{Route('katalog' , ['no' => '0', 'id' => 'terlaris'])}}"><button class="btn btn-primary text-center" style="width:150px;">Data Terbaru</button></a>
						@endif
						@if($page_datas->idSorting == "terlaris")
							<a href="{{Route('katalog' , ['no' => '0', 'id' => 'rating'])}}"><button class="btn btn-primary text-center" style="width:150px;">Terlaris</button></a>
						@endif
						@if($page_datas->idSorting == "rating")
							<a href="{{Route('katalog' , ['no' => '0', 'id' => 'data'])}}"><button class="btn btn-primary text-center" style="width:150px;">Rating</button></a>
						@endif
					</p>
				</div>
				<div class="col-md-12">
					@if($page_datas->idSorting == "data")
						@foreach ($page_datas->datas as $key => $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.katalog')
							</div>
						@endforeach
					@endif
					@if($page_datas->idSorting == "rating")
						@foreach ($page_datas->tampil as $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.katalog')
							</div>
						@endforeach
					@endif
					@if($page_datas->idSorting == "terlaris")
						@foreach ($page_datas->sortAllPermintaan as $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.katalog')
							</div>
						@endforeach
					@endif
				</div>
				<div class="col-md-12 text-right pagination">
					@if($page_datas->idSorting == "data")
						{{$page_datas->datas->render()}}
					@endif
					@if($page_datas->idSorting == "rating")
						{{$page_datas->tampil->render()}}
					@endif
					@if($page_datas->idSorting == "terlaris")
						{{$page_datas->sortAllPermintaan->render()}}
					@endif
				</div>
			</div>
		</div>
	</div>
@stop