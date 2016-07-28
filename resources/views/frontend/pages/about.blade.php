@extends('frontend.layout.layout')
@section('content')
<div class="container-fluid">
	<div class="col-md-12 bgsky pright-0 pleft-0">
		<div class="desktop col-md-4">
			@include('frontend.widget.sidebar')
		</div>
		<div class="col-md-8 bgwhite">
			<div class="desktop row mbottom-s paddingTop50 paddingLeft30">
				<div class="col-md-12">
					<h2><b>Tentang Kami</b></h2>
					<hr class="garis-bawah-biru pull-left" width="100">
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
					<input class="butFoot width80Per" type="text" placeholder="Apa yang ingin Anda Cari?"></input><button type="submit" class="bgabu butFoot width20Per">Cari</button>
				</div>
			</div>
			<hr class="mobile width100Per">
			<div class="row mbottom-s paddingLeft50">
				<div class="col-md-12 col-sm-12">
					<h5 class="blue">Apa itu Kidzo?</h5>
				</div>
				<div class="col-md-12 col-sm-12">
					<h5>jafnjaskbncibas jndinidsb iusbcnisuabi nwifcsuvbidsb</h5>
				</div>
			</div>
			<div class="row mbottom-s paddingLeft50">
				<div class="col-md-12 col-sm-12">
					<h5 class="blue">Mengapa Harus Kidzo?</h5>
				</div>
				<div class="col-md-12 col-sm-12">
					<h5>jafnjaskbncibas jndinidsb iusbcnisuabi nwifcsuvbidsb</h5>
				</div>
			</div>
			<div class="row mbottom-xl paddingLeft50">
				<div class="col-md-12 col-sm-12">
					<h5 class="blue">Apakah Kidzo Terpercaya?</h5>
				</div>
				<div class="col-md-12 col-sm-12">
					<h5>jafnjaskbncibas jndinidsb iusbcnisuabi nwifcsuvbidsb</h5>
				</div>
			</div>
		</div>
	</div>
</div>
@stop