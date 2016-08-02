@extends('backend.pages.website.layout')
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

	<ul class="nav nav-tabs" id="detail-menu " role="tablist">
	<li class="nav-item active">    
		 <a class="nav-link" data-toggle="tab" href="#home" role="tab">Config</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#profile" role="tab">Slider</a>
	</li>
	<li class="nav-item">    
		 <a class="nav-link" data-toggle="tab" href="#FAQ" role="tab">FAQ</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#version" role="tab">Version</a>
	</li>
	<!-- cont. here	-->
	</ul>   
	<div class="row" style="margin-top: -2px;">
	<div class="col-sm-12">
		<div class="card card-block">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="home" role="tabpanel">
					1
				</div>
			  	<div class="tab-pane fade" id="profile" role="tabpanel">
			  		2
			  	</div>
			  	<div class="tab-pane fade" id="FAQ" role="tabpanel">
					3
				</div>
			  	<div class="tab-pane fade" id="version" role="tabpanel">
			  		4
			  	</div>
				<!-- cont. here	-->
			</div>          
		</div>          
	</div>          
</div> 
@stop
