@extends('backend.pages.admin.layout')
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
		<a class="nav-link" data-toggle="tab" href="#admin" role="tab">Administrator</a>
	</li>
	<li class="nav-item">    
		 <a class="nav-link" data-toggle="tab" href="#Password" role="tab">Change Password</a>
	</li>
</ul>   
<!-- content -->
<div class="row">
	<div class="col-sm-12">
		<div class="card card-block">
			<div class="tab-content">
				<div class="tab-pane fade" id="admin" role="tabpanel">
			  		1
			  	</div>
			  	<div class="tab-pane fade" id="Password" role="tabpanel">
					2
				</div>
				<!-- cont. here	-->
			</div>          
		</div>          
	</div>          
</div> 
@stop
