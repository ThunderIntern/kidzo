@extends('backend.pages.transaksi.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-control', ['component' => [
		'title'			=> 'Detail Pembayaran',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('backend.transaksi.pembayaran.index')
												],
								'edit'		=>	[
													'link'	=> route('backend.transaksi.pembayaran.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('backend.transaksi.pembayaran.destroy',['id' => $page_datas->id] )
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
			'content'	=>  ucfirst($page_datas->datas['Barang']['Nama_Barang'])
		]])	
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Jenis Barang',
			'content'	=>  ucfirst($page_datas->datas['Barang']['Jenis_Barang'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Harga',
			'content'	=>  ucfirst($page_datas->datas['Barang']['Harga'])
		]])	
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Jumlah Disewa',
			'content'	=>  ucfirst($page_datas->datas['Jumlah_Disewa'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Status',
			'content'	=>  $page_datas->datas['Status']
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