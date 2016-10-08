@extends('frontend.layout.layout')
@section('content')
<div class="container-0 pbottom-0">
	<div class="desktop col-md-12 pri0">
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
					<a class="black <?php if($segment2=='password') echo 'blue';?>" href="{{route('password')}}"><h6>Ubah Password</h6></a>
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
			<div class="desktop row mbottom-s paddingTop50">
				<div class="col-md-12">
					<h1>Histori</h1>
					<hr class="garis-bawah-blue pull-left mtop-0" width="50">
				</div>
			</div>
<!-- 			<div class="row mbottom-m 0">
				<div class="col-md-12 0">
	                <form method="GET" action="#" accept-charset="UTF-8" class="p-y-0">
	                    <div class="input-group">
	                        <input type="text" name="search" value="" class="form-control" placeholder="Cari Informasi Tentang Kami">
	                        <span class="input-group-btn">
	                            <button class="btn bgabu black 0 paddingRight30" type="submit">Cari</button>
	                        </span>
	                    </div>
	                </form>

				</div>
			</div>	 -->
			<div class="content-faq">
				@if($page_datas->username!=null)
					@for($x=0;$x<$page_datas->banyakRiwayat;$x++)
						<div class="col-md-6">
							<div class="col-md-12">
								<h5><b>Tujuan Pengiriman</b></h5>
							</div>
							<div class="col-md-12">
								<h6>Nama Penerima : {!!$page_datas->nama[$x]!!}</h6>
							</div>
							<div class="col-md-12">
								<h6>Alamat Tujuan &nbsp &nbsp: {!!$page_datas->alamat[$x]!!}</h6>
							</div>
							<div class="col-md-12">
								<h6>Telepon &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {!!$page_datas->nomor[$x]!!}</h6>
							</div>
						</div></br></br></br></br></br>

						<div class="col-md-12 borderAbu">
							<div class="col-md-2">
								<h5><b>Nama Produk</b></h5>
							</div>
							<div class="col-md-2">
								<h5><b>Tanggal Sewa</b></h5>
							</div>
							<div class="col-md-2" >
								<h5><b>Harga</b></h5>
							</div>
							<div class="col-md-2">
								<h5><b>Kuantitas</b></h5>
							</div>
							<div class="col-md-2">
								<h5><b>Lama Sewa</b></h5>
							</div>
							<div class="col-md-2">
								<h5><b>Subtotal</b></h5>
							</div>
						</div>
						<?php 
							$i = 0; 
							$tot = 0;
						?>
						@while($page_datas->barang[$x][$i]!=null)
							<div class="col-md-12 borderBottom1 borderLeft1 borderRight1">
								<div class="col-md-2">
									<h6>{!!$page_datas->barang[$x][$i][0]!!}</h6>
								</div>
								<div class="col-md-2">
									<h6>{!!$page_datas->barang[$x][$i][4]!!}</h6>
								</div>
								<div class="col-md-2">
									<h6>{!!$page_datas->barang[$x][$i][1]!!}</h6>
								</div>
								<div class="col-md-2">
									<h6>{!!$page_datas->barang[$x][$i][2]!!}</h6>
								</div>
								<div class="col-md-2">
									<h6>{!!$page_datas->barang[$x][$i][3]!!}</h6>
								</div>
								<div class="col-md-2">
									<h6>{!!(int)$page_datas->barang[$x][$i][1]*(int)$page_datas->barang[$x][$i][2]*(int)$page_datas->barang[$x][$i][3];
										$tot += (int)$page_datas->barang[$x][$i][1]*(int)$page_datas->barang[$x][$i][2]*(int)$page_datas->barang[$x][$i][3];!!}</h6>
								</div>
							</div>
							<?php $i++; ?>
						@endwhile
						<div class="col-md-12 borderBottom1 borderRight1 borderLeft1">
							<div class="col-md-10 text-center">
								<h6><b>TOTAL</b></h6>
							</div>
							<div class="col-md-2">
								<h6><b>{!!$tot!!}</b></h6>
							</div>
						</div></br></br></br></br></br></br></br>
					@if($x+1 != $page_datas->banyakRiwayat)
						<hr>
					@endif
					@endfor
				@endif

				@if($page_datas->username==null)
					<h4 class="text-center">Tidak ada riwayat transaksi</h4>
				@endif
			</div>
		</div>
	</div>
	<div class="mobile col-sm-12 paddingBottom50 paddingRight30 0">	
		<div class="row mbottom-s paddingTop50">
			<div class="col-sm-12 text-center">
				<h1><b>About Us</b></h1>
				<hr class="garis-bawah-ungu ptop-0" width="70">
			</div>
		</div>
		<div class="row mbottom-s">
			<div class="col-sm-12">
				<h5>Kategori</h5>
			</div>
			<div class="col-sm-12">
				<select class="butFoot width100Per dropdown-toggle" type="text"><option value="Profil">Profil</option></select>
			</div>
		</div>
		<div class="row mbottom-s">
			<div class="col-sm-12">
				<h5>Cari dikategori ini</h5>
			</div>
			<div class="col-sm-12">
				<form class="form-inline">
					<input class="form-control width80Pe type="text" placeholder="Apa yang ingin Anda Cari?"></input><button type="submit" class="bgabu butFoot width20Per">Cari</button>
				</form>
			</div>
		</div>
		<hr class="width100Per">
		@include('frontend.widget.text', ['datas' => [
		'0' => ['header' => "Apa itu Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
		'1' => ['header' => "Mengapa Harus Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
		'2' => ['header' => "Apakah Kidzo Terpercaya ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
		]])
	</div>
</div>
	<div style="clear:both"></div>
@stop