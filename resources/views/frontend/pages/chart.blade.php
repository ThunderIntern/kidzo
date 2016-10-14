@if(is_null(Session::get('akun')))
<script type="text/javascript ">
 		window.location.href = '{{route("signuped")}}';
</script>
@else
@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				@if(is_null($page_datas->datas['chart']))
				<div class="jumbotron text-center">
					<h2>No Chart Added</h2>
				</div>
				<div  class="col-md-12 col-sm-12 text-center">
					<a href="{{route('detailCheckOut')}}"><button class="btn btn-info mbottom-s">Cek Tagihan</button></a>
				</div>
				@else
				<div class="col-md-12 col-sm-12 mtop-s mbottom-s mleft-20">
					<h2 class="black">Cart</h2>
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
				@foreach ($page_datas->datas['chart'] as $key => $data)
				<div class="col-md-12 col-sm-12 mbottom-s text-center">
					@include("frontend.widget.wchart")
				</div>
				@endforeach
				<div class="col-md-12 col-sm-12 mbottom-s borderBottom1 borderTop1 abu">
					<h5 class="pull-left black mtop-s mbottom-s mleft-20">Subtotal</h5>
					<h5 class="pull-right black mtop-s mbottom-s mright-20">IDR {{$page_datas->datas['subtotal']}}</h5>
				</div>
				<div class="col-md-12 col-sm-12 mbottom-s text-center">
					<a href="{{Route('katalog')}}"><button class="btn btn-secondary pull-left blue">Pilih Produk Lain</button></a>
					<a href="{{Route('pembelian')}}"><button class="btn btn-info pull-right">Checkout</button></a>
				</div>
				@endif
			</div>
		</div>
	</div>
@stop
@endif