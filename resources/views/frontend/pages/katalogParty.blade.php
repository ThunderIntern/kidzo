@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="col-md-3 col-sm-3 borderRight1 paddingTop35" style="min-height: calc(95vh) ">
				<h6 class="mbottom-xs mtop-s"><b>Kategori</b></h6>
				@if($page_datas->idSorting == "data")
					<a href="{{Route('party' , ['no' => '0', 'id' => 'data'])}}"><h6 class="mbottom-xs mleft-s black">Semua</h6></a>
					<a href="{{Route('party' , ['no' => '1', 'id' => 'data'])}}"><h6 class="mbottom-xs mleft-s black">0 - 1 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '2', 'id' => 'data'])}}"><h6 class="mbottom-xs mleft-s black">1 - 2 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '3', 'id' => 'data'])}}"><h6 class="mbottom-xs mleft-s black">2 - 3 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '4', 'id' => 'data'])}}"><h6 class="mbottom-xs mleft-s black">3 Tahun Keatas</h6></a>
				@endif
				@if($page_datas->idSorting == "harga")
					<a href="{{Route('party' , ['no' => '0', 'id' => 'harga'])}}"><h6 class="mbottom-xs mleft-s black">Semua</h6></a>
					<a href="{{Route('party' , ['no' => '1', 'id' => 'harga'])}}"><h6 class="mbottom-xs mleft-s black">0 - 1 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '2', 'id' => 'harga'])}}"><h6 class="mbottom-xs mleft-s black">1 - 2 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '3', 'id' => 'harga'])}}"><h6 class="mbottom-xs mleft-s black">2 - 3 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '4', 'id' => 'harga'])}}"><h6 class="mbottom-xs mleft-s black">3 Tahun Keatas</h6></a>
				@endif
				@if($page_datas->idSorting == "terlaris")
					<a href="{{Route('party' , ['no' => '0', 'id' => 'terlaris'])}}"><h6 class="mbottom-xs mleft-s black">Semua</h6></a>
					<a href="{{Route('party' , ['no' => '1', 'id' => 'terlaris'])}}"><h6 class="mbottom-xs mleft-s black">0 - 1 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '2', 'id' => 'terlaris'])}}"><h6 class="mbottom-xs mleft-s black">1 - 2 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '3', 'id' => 'terlaris'])}}"><h6 class="mbottom-xs mleft-s black">2 - 3 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '4', 'id' => 'terlaris'])}}"><h6 class="mbottom-xs mleft-s black">3 Tahun Keatas</h6></a>
				@endif
				@if($page_datas->idSorting == "rating")
					<a href="{{Route('party' , ['no' => '0', 'id' => 'rating'])}}"><h6 class="mbottom-xs mleft-s black">Semua</h6></a>
					<a href="{{Route('party' , ['no' => '1', 'id' => 'rating'])}}"><h6 class="mbottom-xs mleft-s black">0 - 1 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '2', 'id' => 'rating'])}}"><h6 class="mbottom-xs mleft-s black">1 - 2 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '3', 'id' => 'rating'])}}"><h6 class="mbottom-xs mleft-s black">2 - 3 Tahun</h6></a>
					<a href="{{Route('party' , ['no' => '4', 'id' => 'rating'])}}"><h6 class="mbottom-xs mleft-s black">3 Tahun Keatas</h6></a>
				@endif
			</div>
			<div class="col-md-9 col-sm-9 paddingTop35">
				<div class="col-md-12 mtop-s">
					<h1>Koleksi Party</h1>
					<hr class="garis-bawah pull-left mtop-0" width="50">
				</div>
				<div class="col-md-12">
					<div class="col-md-9">
						<p class='text-right'>Urutkan berdasarkan : </p>
					</div>
					<div class="col-md-3">
						<div class="dropdown">  {{-- Tombol search --}}
	                        <a href="#">
	                            <button onclick="myFunction5()" class="bgabumuda padding10 black dropbtn  dropdown-toggle" type="button" data-toggle="collapse" style="width:170px;">
	                                @if($page_datas->idSorting == "data") Mainan Terbaru @endif
	                                @if($page_datas->idSorting == "harga") Harga @endif
	                                @if($page_datas->idSorting == "terlaris") Terlaris @endif
	                                @if($page_datas->idSorting == "rating") Rating @endif
	                                <span class="caret"></span>
	                            </button>
	                        </a>                                
	                    </div> {{-- Tombol search --}}
	                </div>
				</div>
				<div class="col-md-12">
					@if($page_datas->idSorting == "data")
						@foreach ($page_datas->datas as $key => $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.party')
							</div>
						@endforeach
					@endif
					@if($page_datas->idSorting == "harga")
						@foreach ($page_datas->sortHarga as $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.party')
							</div>
						@endforeach
					@endif
					@if($page_datas->idSorting == "rating")
						@foreach ($page_datas->tampil as $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.party')
							</div>
						@endforeach
					@endif
					@if($page_datas->idSorting == "terlaris")
						@foreach ($page_datas->sortAllPermintaan as $data)
							<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
								@include('frontend.widget.party')
							</div>
						@endforeach
					@endif
				</div>
				<div class="col-md-12 text-right pagination">
					@if($page_datas->idSorting == "data")
						{{$page_datas->datas->render()}}
					@endif
					@if($page_datas->idSorting == "harga")
						{{$page_datas->sortHarga->render()}}
					@endif
					@if($page_datas->idSorting == "rating")
						{{$page_datas->tampil->render()}}
					@endif
					@if($page_datas->idSorting == "terlaris")
						{{$page_datas->sortAllPermintaan->render()}}
					@endif
				</div>
				{{-- Yang keluar saat tombol search ditekan --}}
	                <div id="myDropdown5" class="dropdown-content marginTop130 marginRight30"> 
	                    <ul class="nav navbar-nav">
	                        <li class="nav-item borderTop5">
	                        </li>
	                        <li class="nav-item hoverHome">
	                            <a class="nav-link pull-right paddingLeft30" href="{{Route('party' , ['no' => '0', 'id' => 'data'])}}">
	                                <div class="red">Mainan Terbaru</div>
	                            </a>
	                        </li>
	                        <li class="nav-item hoverMainan ">
	                            <a class="nav-link pull-right paddingLeft30" href="{{Route('party' , ['no' => '0', 'id' => 'harga'])}}">
	                                <div class="green">Harga</div>
	                            </a>
	                        </li>
	                        <li class="nav-item hoverParty ">
	                            <a class="nav-link pull-right paddingLeft30" href="{{Route('party' , ['no' => '0', 'id' => 'terlaris'])}}">
	                                <div class="orange">Terlaris</div>
	                            </a>
	                        </li>
	                        <li class="nav-item hoverTentang ">
	                            <a class="nav-link pull-right paddingLeft30" href="{{Route('party' , ['no' => '0', 'id' => 'rating'])}}">
	                                <div class="purple">Rating</div>
	                            </a>
	                        </li>
	                    </ul>
	                </div>
			</div>
		</div>
		</div>
	</div>
@stop

<script>
	function myFunction5() {
	    document.getElementById("myDropdown5").classList.toggle("show");
	}
</script>