@extends('frontend.layout.layout')
@section('content')
<div class="container-fluid pleft-0 pbottom-0">
	<div class="col-md-12 bgsky pright-0 pleft-0">
		<div class="desktop col-md-3 paddingTop35">
			@include('frontend.widget.sidebar', ['datas' => [
			'0' => ['header' => "Kidzo", 'content' => 'Profil', 'link' => '#'],
			'1' => ['header' => "", 'content' => 'Jasa Kami', 'link' => '#'],
			'2' => ['header' => "", 'content' => 'Alamat', 'link' => '#'],
			'3' => ['header' => "", 'content' => 'Kontak', 'link' => '#'],
			'4' => ['header' => "Mainan", 'content' => 'Kualitas Mainan', 'link' => '#'],
			'5' => ['header' => "", 'content' => 'Penyimpanan Mainan', 'link' => '#'],
			'6' => ['header' => "Menyewa", 'content' => 'Cara Menyewa', 'link' => '#'],
			'7' => ['header' => "", 'content' => 'Persyaratan Menyewa', 'link' => '#'],
			'8' => ['header' => "Pembayaran", 'content' => 'Cara Pembayaran', 'link' => '#'],
			'9' => ['header' => "", 'content' => 'Ketentuan Pembayaran', 'link' => '#'],
			'10' => ['header' => "Pengiriman", 'content' => 'Metode Pengiriman', 'link' => '#'],
			'11' => ['header' => "", 'content' => 'Biaya Pengiriman', 'link' => '#'],
			]]);
		</div>
		<div class="col-md-9 bgwhite paddingBottom100">
			<div class="desktop row mbottom-s paddingTop50 paddingLeft30">
				<div class="col-md-12">
					<h2><b>Tentang Kami</b></h2>
					<hr class="garis-bawah-ungu pull-left" width="100">
				</div>
			</div>
			<div class="mobile row mbottom-s paddingTop50">
				<div class="col-sm-12 text-center">
					<h2><b>About Us</b></h2>
					<hr class="garis-bawah-biru" width="100">
				</div>
			</div>
			<div class="desktop row mbottom-s paddingLeft50">
				<div class="col-md-12">
					<h2>Profil</h2>
				</div>
			</div>
			<div class="mobile row mbottom-s">
				<div class="col-sm-12">
					<h5>Kategori</h5>
				</div>
				<div class="col-sm-12">
					<select class="butFoot width100Per dropdown-toggle" type="text"><option value="Profil">Profil</option></select>
				</div>
			</div>
			<div class="row mbottom-s paddingLeft50">
				<div class="col-md-12 col-sm-12">
					<h5>Cari dikategori ini</h5>
				</div>
				<div class="col-md-12 col-sm-12">
					<input class="butFoot width85Per" type="text" placeholder="Apa yang ingin Anda Cari?"></input><button type="submit" class="bgabu butFoot width15Per">Cari</button>
				</div>
			</div>
			<hr class="mobile width100Per">
			@include('frontend.widget.text', ['datas' => [
			'0' => ['header' => "Apa itu Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
			'1' => ['header' => "Mengapa Harus Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
			'2' => ['header' => "Apakah Kidzo Terpercaya ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
			]])
		</div>
	</div>
</div>
@stop