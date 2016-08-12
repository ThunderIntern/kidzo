@extends('backend.pages.crm.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Newsletter',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.crm.newsletter.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.crm.newsletter.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.crm.newsletter.destroy',['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	<?php
		// var_dump($page_datas);
	?>
	@include('backend.widgets.alertbox')
	<div class="card-block">
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Judul',
			'content'	=>  ucfirst($page_datas->datas['Judul'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Version Name',
			'content'	=>  ucfirst($page_datas->datas['version']['version_name'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Content',
			'content'	=>  ucfirst($page_datas->datas['content'])
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