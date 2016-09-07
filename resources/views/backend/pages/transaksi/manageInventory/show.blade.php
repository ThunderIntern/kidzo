@extends('backend.pages.transaksi.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Inventory',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.transaksi.manageInventory.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.transaksi.manageInventory.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.transaksi.manageInventory.destroy',['id' => $page_datas->id] )
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
			'title'		=> 'Tanggal',
			'content'	=>  ucfirst($page_datas->datas['tanggal'])
		]])
		@foreach($page_datas->datas['barang'] as $key => $data)
			@include('backend.widgets.components.detail.detail-text',['component' => [
				'title'		=> 'Nama Barang',
				'content'	=>  ucfirst($data['nama'])
			]])
			@include('backend.widgets.components.detail.detail-text',['component' => [
				'title'		=> 'Stok Awal',
				'content'	=>  $data['initialStock']
			]])
			@include('backend.widgets.components.detail.detail-text',['component' => [
				'title'		=> 'Stok Sekarang',
				'content'	=>  $data['currentStock']
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