@extends('backend.pages.transaksi.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Barang',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.transaksi.manageParty.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.transaksi.manageParty.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.transaksi.manageParty.destroy',['id' => $page_datas->id] )
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
			'title'		=> 'Nama Barang',
			'content'	=>  ucfirst($page_datas->datas['nama'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Jenis Barang',
			'content'	=>  ucfirst($page_datas->datas['jenis'])
		]])		
		<img src="{{$page_datas->datas['foto']['url']}}"></img>
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Foto Barang',
			'content'	=>  ucfirst($page_datas->datas['foto']['url'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Harga',
			'content'	=>  ucfirst($page_datas->datas['harga'])
		]])	
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Deskripsi',
			'content'	=>  ucfirst($page_datas->datas['deskripsi'])
		]])	
		@foreach($page_datas->datas['isi'] as $key => $isi)
			@include('backend.widgets.components.detail.detail-text',['component' => [
				'title'		=> 'Nama Barang',
				'content'	=>  ucfirst($isi['nama'])
			]])
			@include('backend.widgets.components.detail.detail-text',['component' => [
				'title'		=> 'Jumlah Barang',
				'content'	=>  ucfirst($isi['jumlah'])
			]])
		@endforeach
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