@extends('frontend.layout.layout')
@section('content')
<div class="container">
		<div class="col-md-12">
			<div class="row">
				@if(is_null($page_datas->datas['total']))
				<div class="jumbotron text-center">
					<h2>Tidak Ada Tagihan</h2>
				</div>
				<div  class="col-md-12 col-sm-12 text-center">
					<a href="{{route('chart')}}"><button class="btn btn-success">Kembali Ke Chart</button></a>
				</div>
				@else
				<div class="col-md-12 col-sm-12 mtop-s mbottom-s mleft-20">
					<h2 class="black">Detail Checkout</h2>
					<hr class="garis-bawah-hitam pull-left mtop-0" width="50">
				</div>
				<div class="col-md-12 col-sm-12 mbottom-s borderBottom1 abu">
					<div class="col-md-6 col-sm-6">
						<h3 class="pull-left black">Item</h3>
					</div>
					<div class="col-md-2 col-sm-2 text-right">
						<h3 class="black">Price</h3>
					</div>
					<div class="col-md-2 col-sm-2 text-center">
						<h3 class="black">Qty</h3>
					</div>
					<div class="col-md-2 col-sm-2 text-right">
						<h3 class="black">Total</h3>
					</div>
				</div> 
				@foreach ($page_datas->datas['transaksi'] as $key => $transaksi)
					@foreach ($transaksi['barang'] as $key2 => $data)
						<div class="col-md-12 col-sm-12 mbottom-s text-center">
							@include("frontend.widget.wpayment")
						</div>
					@endforeach
				@endforeach
				<div class="col-md-12 col-sm-12 mbottom-s borderBottom1 borderTop1 abu">
					<h5 class="pull-left black mtop-s mbottom-s mleft-20">Subtotal</h5>
					<h5 class="pull-right black mtop-s mbottom-s mright-20">IDR {{$page_datas->datas['total']}}</h5>
				</div>
				<div class="col-md-12 col-sm-12 mbottom-s text-center">
					<a href="{{Route('batal')}}"><button class="btn btn-secondary pull-left red">Batal</button></a>
					<a href="{{Route('prosesBayar')}}"><button class="btn btn-secondary pull-right green">Bayar Tagihan</button></a>
				</div>
				@endif
			</div>
		</div>
	</div>
@stop