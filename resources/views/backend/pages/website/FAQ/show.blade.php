@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Version',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.website.FAQ.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.website.FAQ.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.website.FAQ.destroy',['id' => $page_datas->id] )
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
			'title'		=> 'Version Name',
			'content'	=>  ucfirst($page_datas->datas['version']['version_name'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Nomor Urut',
			'content'	=>  ucfirst($page_datas->datas['no_urut'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Pertanyaan',
			'content'	=>  ucFirst($page_datas->datas['pertanyaan'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Jawaban',
			'content'	=>  ucFirst($page_datas->datas['jawaban'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Kategori',
			'content'	=>  ucFirst($page_datas->datas['kategori'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Sub Kategori',
			'content'	=>  ucFirst($page_datas->datas['sub_kategori'])
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