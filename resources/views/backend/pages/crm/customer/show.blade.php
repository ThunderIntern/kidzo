@extends('backend.pages.crm.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail User',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.crm.customer.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.crm.customer.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.crm.customer.destroy',['id' => $page_datas->id] )
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
			'title'		=> 'Email',
			'content'	=>  ucfirst($page_datas->datas['email'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Username',
			'content'	=>  ucfirst($page_datas->datas['username'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Password',
			'content'	=>  $page_datas->datas['password']
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