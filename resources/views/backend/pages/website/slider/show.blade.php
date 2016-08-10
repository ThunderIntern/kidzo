@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> $page_attributes->page_title,
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.website.slider.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.website.slider.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.website.slider.destroy',['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('backend.widgets.alertbox')
	<div class="card-block pt-none">
		<ul class="nav nav-tabs" id="detail-menu " role="tablist">
			<li class="nav-item active">    
				 <a class="nav-link" data-toggle="tab" href="#info" role="tab">Info</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#slider1" role="tab">Slider 1</a>
			</li>
			<li class="nav-item">    
				 <a class="nav-link" data-toggle="tab" href="#slider2" role="tab">Slider 2</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#slider3" role="tab">Slider 3</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#slider4" role="tab">Slider 4</a>
			</li>		
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#slider5" role="tab">Slider 5</a>
			</li>	
		</ul> 
	</div>	
	<div class="card-block">
		<div class="tab-content">
			<div class="tab-pane fade in active" id="info" role="tabpanel">
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Version Name',
					'content'	=>  ucfirst($page_datas->datas['version']['version_name'])
				]])
				@include('backend.widgets.components.detail.detail-pusblishedDate',['component' => [
					'title'		=> 'Published At',
					'content'	=>  $page_datas->datas['published_at']
				]])						
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Created By',
					'content'	=>  ucfirst($page_datas->datas['admin'])
				]])	
				@include('backend.widgets.components.detail.detail-date',['component' => [
					'title'		=> 'Created At',
					'content'	=>  $page_datas->datas['created_at']
				]])			
				@include('backend.widgets.components.detail.detail-date',['component' => [
					'title'		=> 'Last Time Updated',
					'content'	=>  $page_datas->datas['updated_at']
				]])					
			</div>
		  	<div class="tab-pane fade" id="slider1" role="tabpanel">
				<img id="slider1" class="img-fluid pb-m" src="{{ empty($page_datas->datas['config']['slider1']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider1']['url'] }}" alt="" width="100%">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Image URL',
					'content'	=>  ucfirst($page_datas->datas['config']['slider1']['url'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Link To',
					'content'	=>  ucfirst($page_datas->datas['config']['slider1']['link'])
				]])							
		  	</div>
		  	<div class="tab-pane fade" id="slider2" role="tabpanel">
				<img id="slider2" class="img-fluid pb-m" src="{{ empty($page_datas->datas['config']['slider2']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider2']['url'] }}" alt="" width="100%">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Image URL',
					'content'	=>  ucfirst($page_datas->datas['config']['slider2']['url'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Link To',
					'content'	=>  ucfirst($page_datas->datas['config']['slider2']['link'])
				]])							
			</div>
		  	<div class="tab-pane fade" id="slider3" role="tabpanel">
				<img id="slider3" class="img-fluid pb-m" src="{{ empty($page_datas->datas['config']['slider3']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider3']['url'] }}" alt="" width="100%">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Image URL',
					'content'	=>  ucfirst($page_datas->datas['config']['slider3']['url'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Link To',
					'content'	=>  ucfirst($page_datas->datas['config']['slider3']['link'])
				]])							
		  	</div>
		  	<div class="tab-pane fade" id="slider4" role="tabpanel">
				<img id="slider4" class="img-fluid pb-m" src="{{ empty($page_datas->datas['config']['slider4']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider4']['url'] }}" alt="" width="100%">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Image URL',
					'content'	=>  ucfirst($page_datas->datas['config']['slider4']['url'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Link To',
					'content'	=>  ucfirst($page_datas->datas['config']['slider4']['link'])
				]])							
		  	</div>	
		  	<div class="tab-pane fade" id="slider5" role="tabpanel">
				<img id="slider5" class="img-fluid pb-m" src="{{ empty($page_datas->datas['config']['slider5']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider5']['url'] }}" alt="" width="100%">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Image URL',
					'content'	=>  ucfirst($page_datas->datas['config']['slider5']['url'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Link To',
					'content'	=>  ucfirst($page_datas->datas['config']['slider5']['link'])
				]])							
		  	</div>		  		  	
		</div>     	
	</div>
</div>
@stop