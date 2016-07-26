	@extends('frontend.layout.layout')
	@section('content')
	<div>
		<img width="100%" class="img-responsive img-center" src="{{asset('image/frontend/frontend/capture1.jpg')}}"></img>	
	</div>
	<div class="container-fluid mtop mbottom">
		<div class="col-sm-12 col-md-12 text-center">
			<h2>3 Langkah Mudah Sewa Mainan di Kidzo</h2>
			<br><br>
		</div>
		<div class="col-sm-4 col-md-4 text-center">
			<a href="#"><img width="250" class="img-responsive img-circle img-center" src="{{asset('image/frontend/frontend/capture2.jpg')}}"></img><br><br></a>
			<h2>1. Browse</h2><br>
			<h3>Pilih produk permainan yang Anda suka.</h3>
		</div>
		<div class="col-sm-4 col-md-4 text-center">
			<a href="#"><img width="250" class="img-responsive img-circle img-center" src="{{asset('image/frontend/frontend/capture2.jpg')}}"></img><br><br></a>
			<h2>2. Browse</h2><br>
			<h3>Pilih produk permainan yang Anda suka.</h3>
		</div>
		<div class="col-sm-4 col-md-4 text-center">
			<a href="#"><img width="250" class="img-responsive img-circle img-center" src="{{asset('image/frontend/frontend/capture2.jpg')}}""></img><br><br></a>
			<h2>3. Browse</h2><br>
			<h3>Pilih produk permainan yang Anda suka.</h3>
		</div>
		<div class="col-md-12 col-sm-12 text-center mtop mbottom">
			<br><br>
			<h2>Kategori Permainan</h2>
			<hr class="garis-bawah" width="100">
			<br><br>
		</div>
			<div class="col-sm-12 col-md-2"></div>
			<a href="#"><div class="col-sm-12 col-md-2 bg0 kotak">
				<h1 class="text-center green">0 - 1<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-12 col-md-2 bg3 kotak">
				<h1 class="text-center orange">1 - 2<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-12 col-md-2 bg1 kotak">
				<h1 class="text-center purple">2 - 3<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-12 col-md-2 bg2 kotak">
				<h1 class="text-center aqua">3 +<br>tahun</h1>
			</div></a>
			<div class="col-sm-12 col-md-2"></div>
	</div>
	<div class="bgblue mtop">
		<div class="container-fluid">
			<div class="col-sm-12 col-md-8">
				<h2 class="white ptop">Party Time</h2>
				<h3 class="white ptop pbottom font-mobile">
					wfhasbucgbasiuvgbicsuabvicuabsuivcbiausbv iuasbvuiabiuvbiaubvisuabviubasiuvuiasbvib asiuviubasviuasibviuasbviuabsivbiabvibais ucvyudsgvgwugvbuidviuvbiusbviubiuvbiubviu ewbvuebwuvbwuibfaggfauygufaygfugasuygfyua sguyfgasggfugsaufygsaugfuyahsbfhsabfjhbsa jhbfjshsjhfjhsjgsjhfgsjgsjhgfjgjhgsjfgjsa</h3>
				<a href="#"><button class="btn-lg bgwhite blue mbottom">Lebih Lanjut</button></a>
			</div>
			<div class="col-md-4 desktop">
				<a href="#"><img class="img-responsive img-center img-m-top pbottom" src="{{asset('image/frontend/frontend/capture3.jpg')}}"></img></a>
			</div>
		</div>
	</div>
	<div class="container-fluid mtop">
		<div class="col-sm-12 col-md-12 text-center">
			<h2>Mainan Terbaru</h2>
			<hr class="garis-bawah" width="100">
			<br><br>
		</div>
			<div class="col-sm-12 col-md-2"></div>
			@for($i=0;$i<4;$i++)
			<div class="col-sm-12 col-md-2 kotak">
				@include('frontend.widget.truck')
			</div>
			@endfor
			<div class="col-sm-12 col-md-2"></div>
	</div>
	<div class="container-fluid mbottom mtop">
		<div class="col-sm-12 col-md-6 text-center">
			<h2 class="blue"><b>Temukan <a class="orange">1900</a> Koleksi Mainan Lainnya !</b></h2>
		</div>
		<div class="col-md-2"></div>
		<div class="col-sm-12 col-md-4 text-center">
			<a href="#"><button class="btn btn-primary btn-lg white">Lihat Koleksi</button></a>
		</div>
	</div>
    @stop
