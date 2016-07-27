	@extends('frontend.layout.layout')
	@section('content')
	<div class="mbottom">
		<img width="100%" class="img-responsive img-center" src="{{asset('image/frontend/frontend/capture1.jpg')}}"></img>	
	</div>
	<div class="container pleft-l pright-l">
		<div class="row mbottom">
			<div class="col-sm-12 col-md-12 text-center">
				<h2>3 Langkah Mudah Sewa Mainan di Kidzo</h2>
			</div>
		</div>
		<div class="row mbottom">
			<div class="col-sm-12 col-md-4 text-center">
				<a href="#"><img width="100%" class="img-responsive img-circle img-center" src="{{asset('image/frontend/frontend/capture2.jpg')}}"></img><br><br></a>
				<h2>1. Browse</h2><br>
				<h3>Pilih produk permainan yang Anda suka.</h3>
			</div>
			<div class="col-sm-12 col-md-4 text-center">
				<a href="#"><img width="100%" class="img-responsive img-circle img-center" src="{{asset('image/frontend/frontend/capture2.jpg')}}"></img><br><br></a>
				<h2>2. Browse</h2><br>
				<h3>Pilih produk permainan yang Anda suka.</h3>
			</div>
			<div class="col-sm-12 col-md-4 text-center">
				<a href="#"><img width="100%" class="img-responsive img-circle img-center" src="{{asset('image/frontend/frontend/capture2.jpg')}}"></img><br><br></a>
				<h2>3. Browse</h2><br>
				<h3>Pilih produk permainan yang Anda suka.</h3>
			</div>
		</div>
		<div class="row mbottom">
			<div class="col-md-12 col-sm-12 text-center">
				<h2>Kategori Permainan</h2>
				<hr class="garis-bawah" width="100">
			</div>
		</div>
		<div class="row mbottom">
			<div class="col-md-12">
				<div class="col-sm-12 col-md-3 text-center">
					<div class="row">
						<div class="col-12 kotak padding">
							<a href="#"><h1 class="green bg0 kotakKategori">0 - 1<br>tahun</h1></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 text-center">
					<div class="row">
						<div class="col-12 kotak padding">
							<a href="#"><h1 class="orange bg3 kotakKategori">1 - 2<br>tahun</h1></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 text-center">
					<div class="row">
						<div class="col-12 kotak padding">
							<a href="#"><h1 class="purple bg1 kotakKategori">2 - 3<br>tahun</h1></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 text-center">
					<div class="row">
						<div class="col-12 kotak padding">
							<a href="#"><h1 class="aqua bg2 kotakKategori">3 + <br>tahun</h1></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="bgblue mbottom">
			<div class="container pleft-l pright-l">
				<div class="row">
					<div class="col-sm-12 col-md-8">
						<h2 class="white ptop">Party Time</h2>
						<h3 class="white ptop pbottom font-mobile">
							wfhasbucgbasiuvgbicsuabvicuabsuivcbiausbv iuasbvuiabiuvbiaubvisuabviubasiuvuiasbvib asiuviubasviuasibviuasbviuabsivbiabvibais ucvyudsgvgwugvbuidviuvbiusbviubiuvbiubviu ewbvuebwuvbwuibfaggfauygufaygfugasuygfyua sguyfgasggfugsaufygsaugfuyahsbfhsabfjhbsa jhbfjshsjhfjhsjgsjhfgsjgsjhgfjgjhgsjfgjsa</h3>
						<a href="#"><button class="btn-lg bgwhite blue mbutton-bottom">Lebih Lanjut</button></a>
					</div>
					<div class="col-md-4 desktop">
						<a href="#"><img width="100%" class="img-responsive img-m-top img-center" src="{{asset('image/frontend/frontend/capture3.jpg')}}"></img></a>
					</div>
				</div>
			</div>
		</div>
	<div class="container pleft-l pright-l">
		<div class="row mbottom">
			<div class="col-sm-12 col-md-12 text-center">
				<h2>Mainan Terbaru</h2>
				<hr class="garis-bawah" width="100">
			</div>
		</div>
		<div class="row mbottom">
			<div class="col-md-12">
				@for($i=0;$i<4;$i++)
				<div class="col-sm-12 col-md-3">
					@include('frontend.widget.truck')
				</div>
				@endfor
			</div>
		</div>
		<div class="row mbottom">
			<div class="col-md-12 desktop">
				<h2 class="blue"><b>Temukan <a class="orange">1900</a> Koleksi Mainan Lainnya !</b>
				<a href="#"><button class="btn btn-primary btn-lg white pull-right">Lihat Koleksi</button></a></h2>
			</div>
			<div class="col-sm-12 mobile text-center">
				<h2 class="blue"><b>Temukan <a class="orange">1900</a> Koleksi Mainan Lainnya !</b></h2>
			</div>
			<div class="col-sm-12 mobile text-center">
				<a href="#"><button class="btn btn-primary btn-lg white">Lihat Koleksi</button></a>
			</div>
		</div>
	</div>
    @stop
