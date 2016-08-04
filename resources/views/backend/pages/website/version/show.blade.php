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
								'delete'	=> 	[
													'link'	=> route('backend.website.version.destroy',['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('backend.widgets.alertbox')
	<div class="card-block">
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Version Name',
			'content'	=>  ucfirst($page_datas->datas['version_name'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Domain',
			'content'	=>  ucfirst($page_datas->datas['domain'])
		]])
		@include('backend.widgets.components.detail.detail-status',['component' => [
			'title'		=> 'Status',
			'content'	=>  $page_datas->datas['is_active']
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
</div>
@stop