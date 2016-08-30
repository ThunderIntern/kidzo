@extends('backend.layout.layout')
@section('content')
<div class="container-fluid">
	<div class="row clearfix">
		&nbsp;
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-lg-3">
			@include('backend.widgets.sidebar', [
				'title' 		=> 'Transaksi',
				'description' 	=> 'Pengaturan Transaksi',
				'components' 	=> [
										'1' => ['link' => Route('backend.transaksi.pembayaran.index'), 'caption' => 'Pemabayaran'],
										'2' => ['link' => Route("backend.transaksi.manageBarang.index"), 'caption' => 'Manage Barang'],
										'3' => ['link' => Route("backend.transaksi.manageInventory.index"), 'caption' => 'Manage Inventory'],
									]
			])
		</div>
 
		<div class="col-xs-12 col-lg-9">
			<div class="row mb-s">
				<div class="col-sm-12">
					@yield('page_content')
				</div>
			</div>
		</div>
	</div>
</div>
@stop