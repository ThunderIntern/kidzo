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

<!-- tab -->
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
</ul>   
<!-- content -->
<div class="row">
	<div class="col-sm-12">
		<div class="card card-block">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="home" role="tabpanel">
			
				</div>
			  	<div class="tab-pane fade" id="profile" role="tabpanel">
			  		2
			  	</div>
			  	<div class="tab-pane fade" id="FAQ" role="tabpanel">
					3
				</div>
			  	<div class="tab-pane fade" id="version" role="tabpanel">
					@forelse ($page_datas->versions as $key => $data)
						<p class="text-muted mb-l mt-m">
							{{ $data['version_name'] }}
						</p>		
						@include('backend.widgets.components.detail.detail-text',['component' => [
							'title'		=> 'Domain',
							'content'	=>  ucfirst($data['domain'])
						]])							  	
						@include('backend.widgets.components.detail.detail-text',['component' => [
							'title'		=> 'Created By',
							'content'	=>  ucfirst($data['admin'])
						]])
						@include('backend.widgets.components.detail.detail-date',['component' => [
							'title'		=> 'Created At',
							'content'	=> $data['created_at']
						]])
					@empty
						<p class="text-muted mb-l">
							Tidak ada data
						</p>
					@endforelse									
			  	</div>
				<!-- cont. here	-->
			</div>          
		</div>          
	</div>          
</div> 
@stop
