@extends('frontend.layout.layout')
@section('content')
<div class="container pleft-0 pbottom-0">
	<div class="col-md-12 pright-0 pleft-0">
		<?php $segment2 =  Request::segment(2);  ?>
		<div class="col-md-3 paddingTop35">
			<ul class="paddingTop15 list-unstyled pul">
				<h6 class="pul mbottom-xs"><b>Menu Saya</b></h6>
				<li class="pil black mbottom-xs">
					<a class="black <?php if($segment2=='') echo 'blue';?>" href="{{route('profile')}}"><h6>Profil</h6></a>
				</li>
				<li class="pil black mbottom-xs">
					<a class="black <?php if($segment2=='setting') echo 'blue';?>" href="{{route('setting')}}"><h6>Pengaturan</h6></a>
				</li>
				<li class="pil black mbottom-xs">
					<a class="black <?php if($segment2=='password' || $segment2=='newPassword') echo 'blue';?>" href="{{route('password')}}"><h6>Ubah Password</h6></a>
				</li>
				<li class="pil black mbottom-xs">
					<a class="black <?php if($segment2=='historyUser') echo 'blue';?>" href="{{route('historyUser')}}"><h6>Histori Transaksi</h6></a>
				</li>
				<li class="pil black mbottom-xs">
					<a class="black" href="{{route('logout')}}"><h6>Keluar</h6></a>
				</li>
			</ul>			
		</div>
		<div class="col-md-9 paddingBottom100 paddingLeft30 paddingRight30 borderLeft1" style="padding-bottom: 60vh">
			<div class="row mbottom-s paddingTop50">
				<div class="col-md-12">
					<h1>Profile</h1>
					<hr class="garis-bawah-blue pull-left mtop-0" width="50">
				</div>
			</div>
			<div class="content-faq">
				@include('frontend.widget.profile')
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
@stop