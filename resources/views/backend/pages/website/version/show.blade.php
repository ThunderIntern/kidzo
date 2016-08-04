@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Version',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.website.version.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.website.version.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[],
							]		
	]])
	</div>
	<div class="card-block">
		<div class="row">
			<div class="col-xs-3 ">
				<span class="text-uppercase"><strong>Version Name</strong></span>
			</div>
			<div class="col-xs-9">
				{!! ucfirst($page_datas->datas['version_name']) !!}
			</div>		
			<div class="col-xs-12"><hr></div>
		</div>
		<div class="row">
			<div class="col-xs-3 ">
				<span class="text-uppercase"><strong>Domain</strong></span>
			</div>
			<div class="col-xs-9">
				{!! ucfirst($page_datas->datas['domain']) !!}
			</div>		
			<div class="col-xs-12"><hr></div>
		</div>
		<div class="row">
			<div class="col-xs-3 ">
				<span class="text-uppercase"><strong>Status</strong></span>
			</div>
			<div class="col-xs-9">
				{!! ucfirst($page_datas->datas['is_active']) !!}
			</div>		
			<div class="col-xs-12"><hr></div>
		</div>
		<div class="row">
			<div class="col-xs-3 ">
				<span class="text-uppercase"><strong>Created At</strong></span>
			</div>
			<div class="col-xs-9">
				{!! ucfirst($page_datas->datas['created_at']) !!}
			</div>		
			<div class="col-xs-12"><hr></div>
		</div>
		<div class="row">
			<div class="col-xs-3 ">
				<span class="text-uppercase"><strong>Last Time Updated</strong></span>
			</div>
			<div class="col-xs-9">
				{!! ucfirst($page_datas->datas['created_at']) !!}
			</div>		
			<div class="col-xs-12"><hr></div>
		</div>			
	</div>
</div>
@stop