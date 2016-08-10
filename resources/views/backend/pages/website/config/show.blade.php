@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Config',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.website.config.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.website.config.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.website.config.destroy',['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('backend.widgets.alertbox')
	<div class="card-block">
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Phone Number',
			'content'	=>  ucfirst($page_datas->datas['phone'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Email',
			'content'	=>  ucfirst($page_datas->datas['email'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Facebook',
			'content'	=>  ucFirst($page_datas->datas['facebook'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Address',
			'content'	=>  ucFirst($page_datas->datas['address'])
		]])		
	</div>
</div>
@stop