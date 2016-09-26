@extends('backend.pages.transaksi.layout')
@section('page_content')
<div class="row">
	<div class="col-sm-3">
		@include('backend.widgets.cards.stat-mini', ['components' => ['title' => 'card 1', 'value' => 'some value']])
	</div>
	<div class="col-sm-3">
		@include('backend.widgets.cards.stat-mini', ['components' => ['title' => 'card 1', 'value' => 'some value']])
	</div>      
	<div class="col-sm-3">
		@include('backend.widgets.cards.stat-mini', ['components' => ['title' => 'card 1', 'value' => 'some value']])
	</div>
	<div class="col-sm-3">
		@include('backend.widgets.cards.stat-mini', ['components' => ['title' => 'card 1', 'value' => 'some value']])
	</div>                          
</div>

<!-- tab -->
<ul class="nav nav-tabs" id="detail-menu " role="tablist">
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#home" role="tab">Pembayaran</a>
	</li>
	<li class="nav-item">    
		 <a class="nav-link" data-toggle="tab" href="#manageBarang" role="tab">Manage Barang</a>
	</li>
	<li class="nav-item">    
		 <a class="nav-link" data-toggle="tab" href="#manageParty" role="tab">Manage Party Pack</a>
	</li>
	<li class="nav-item">    
		 <a class="nav-link" data-toggle="tab" href="#manageInventory" role="tab">Manage Inventory</a>
	</li>
</ul>   
<!-- content -->
<div class="row">
	<div class="col-sm-12">
		<div class="card card-block">
			<div class="tab-content">
				<div class="tab-pane fade" id="home" role="tabpanel">
			  		1
			  	</div>
			  	<div class="tab-pane fade" id="manageBarang" role="tabpanel">
					2
				</div>
				<div class="tab-pane fade" id="manageParty" role="tabpanel">
					3
				</div>
				<div class="tab-pane fade" id="manageInventory" role="tabpanel">
					4
				</div>
				<!-- cont. here	-->
			</div>          
		</div>          
	</div>          
</div> 
@stop
