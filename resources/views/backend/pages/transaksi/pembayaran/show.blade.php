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
			'title'		=> 'Username',
			'content'	=>  ucfirst($page_datas->datas['username'])
		]])	
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Nama',
			'content'	=>  ucfirst($page_datas->datas['nama'])
		]])		
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Alamat',
			'content'	=>  ucfirst($page_datas->datas['alamat'])
		]])	
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Nomor Telepon',
			'content'	=>  ucfirst($page_datas->datas['nomor'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Total',
			'content'	=>  ucfirst($page_datas->datas['total'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Bukti Transfer',
			'content'	=>  ucfirst($page_datas->datas['bukti'])
		]])
		@include('backend.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Status',
			'content'	=>  $page_datas->datas['status']
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