	@extends('frontend.layout.layout')
	@section('content')
	<div class="dekstop">
		<img width="100%" class="img-responsive img-center" src="image/capture1.jpg"></img>	
	</div>
	<div class="mobile">
		<img width="100%" class="img-responsive img-center" src="image/capture1.jpg"></img>	
	</div>
	<br><br>
	<div class="container-fluid">
		<div class="col-sm-12 text-center">
			<h2>3 Langkah Mudah Sewa Mainan di Kidzo</h2>
			<br><br>
		</div>
		<div class="col-sm-4 text-center">
			<a href="#"><img width="250" class="img-responsive img-circle img-center" src="image/capture2.jpg"></img><br><br></a>
			<h2>1. Browse</h2><br>
			<h3>Pilih produk permainan yang Anda suka.</h3>
		</div>
		<div class="col-sm-4 text-center">
			<a href="#"><img width="250" class="img-responsive img-circle img-center" src="image/capture2.jpg"></img><br><br></a>
			<h2>2. Browse</h2><br>
			<h3>Pilih produk permainan yang Anda suka.</h3>
		</div>
		<div class="col-sm-4 text-center">
			<a href="#"><img width="250" class="img-responsive img-circle img-center" src="image/capture2.jpg"></img><br><br></a>
			<h2>3. Browse</h2><br>
			<h3>Pilih produk permainan yang Anda suka.</h3>
		</div>
		<div class="col-sm-12 text-center">
			<br><br>
			<h2>Kategori Permainan</h2>
			<hr class="garis-bawah" width="100">
			<br><br>
		</div>
		<div class="dekstop">
			<div class="col-sm-2"></div>
			<a href="#"><div class="col-sm-2 bg0 kotak-left">
				<h1 class="text-center green">0 - 1<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-2 bg3 kotak">
				<h1 class="text-center orange">1 - 2<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-2 bg1 kotak">
				<h1 class="text-center purple">2 - 3<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-2 bg2 kotak-right">
				<h1 class="text-center aqua">3 +<br>tahun</h1>
			</div></a>
			<div class="col-sm-2"></div>
		</div>
		<div class="mobile">
			<a href="#"><div class="col-sm-12 bg0 kotak-mobile">
				<h1 class="text-center green">0 - 1<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-12 bg3 kotak-mobile">
				<h1 class="text-center orange">1 - 2<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-12 bg1 kotak-mobile">
				<h1 class="text-center purple">2 - 3<br>tahun</h1>
			</div></a>
			<a href="#"><div class="col-sm-12 bg2 kotak-mobile">
				<h1 class="text-center aqua">3 +<br>tahun</h1>
			</div></a>
		</div>
	</div>
	<br><br><br><br>
	<div class="bgblue dekstop">
		<div class="container-fluid">
			<div class="col-sm-8">
				<h2 class="white ptop">Party Time</h2>
				<h3 class="white ptop pbottom">
					wfhasbucgbasiuvgbicsuabvicuabsuivcbiausbv iuasbvuiabiuvbiaubvisuabviubasiuvuiasbvib asiuviubasviuasibviuasbviuabsivbiabvibais ucvyudsgvgwugvbuidviuvbiusbviubiuvbiubviu ewbvuebwuvbwuibfaggfauygufaygfugasuygfyua sguyfgasggfugsaufygsaugfuyahsbfhsabfjhbsa jhbfjshsjhfjhsjgsjhfgsjgsjhgfjgjhgsjfgjsa</h3>
				<a href="#"><button class="btn-lg bgwhite blue mbottom">Lebih Lanjut</button></a>
			</div>
			<div class="col-sm-4">
				<a href="#"><img class="img-responsive img-center img-m-top" src="image/capture3.jpg"></img></a>
			</div>
		</div>
	</div>
	<div class="bgblue mobile">
		<div class="container-fluid"  width="100%">
			<div class="col-sm-12">
				<h2 class="white ptop">Party Time</h2>
				<h3 class="white font-mobile ptop pbottom">
					wfhasbucgbasiuvgbicsuabvicuabsuivcbiausbv iuasbvuiabiuvbiaubvisuabviubasiuvuiasbvib asiuviubasviuasibviuasbviuabsivbiabvibais ucvyudsgvgwugvbuidviuvbiusbviubiuvbiubviu ewbvuebwuvbwuibfaggfauygufaygfugasuygfyua sguyfgasggfugsaufygsaugfuyahsbfhsabfjhbsa jhbfjshsjhfjhsjgsjhfgsjgsjhgfjgjhgsjfgjsa</h3>
				<a href="#"><button class="btn-lg bgwhite blue mbottom">Lebih Lanjut</button></a>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<div class="container-fluid">
		<div class="col-sm-12 text-center">
			<h2>Mainan Terbaru</h2>
			<hr class="garis-bawah" width="100">
			<br><br>
		</div>
		<div class="dekstop">
			<div class="col-sm-2"></div>
			<div class="col-sm-2 kotak-left">
				@include('frontend.widget.truck')
			</div>
			@for($i=0;$i<2;$i++)
			<div class="col-sm-2 kotak">
				@include('frontend.widget.truck')
			</div>
			@endfor
			<div class="col-sm-2 kotak-right">
				@include('frontend.widget.truck')
			</div>
			<div class="col-sm-2"></div>
		</div>
		<div class="mobile">
			@for($i=0;$i<4;$i++)
			<div class="col-sm-12">
				@include('frontend.widget.truck')
			</div>
			@endfor
		</div>
	</div>
	<br><br>
	<div class="container dekstop mbottom">
		<h2 class="blue"><b class="mleft mright">Temukan <a class="orange">1900</a> Koleksi Mainan Lainnya !</b><a href="#"><button class="text-right btn btn-primary btn-lg white">Lihat Koleksi</button></a></h2>
	</div>
	<div class="col-sm-12 mobile text-center mbottom">
		<h2 class="blue font-mobile" width="100%"><b>Temukan <a class="orange">1900</a> Koleksi Mainan Lainnya !<br></b></h2>
	</div>
	<div class="col-sm-12 mobile text-center mbottom">
		<a href="#"><button class="btn btn-primary btn-lg white">Lihat Koleksi</button></a>
	</div>
    @stop
