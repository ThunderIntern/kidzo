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
	<div class="card-block pt-none">
		<ul class="nav nav-tabs" id="detail-menu " role="tablist">
			<li class="nav-item active">    
				 <a class="nav-link" data-toggle="tab" href="#info" role="tab">Info</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#barang1" role="tab">Barang 1</a>
			</li>
			<li class="nav-item">    
				 <a class="nav-link" data-toggle="tab" href="#barang2" role="tab">Barang 2</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#barang3" role="tab">Barang 3</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#barang4" role="tab">Barang 4</a>
			</li>		
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#barang5" role="tab">Barang 5</a>
			</li>	
		</ul> 
	</div>	
	<div class="card-block">
		<div class="tab-content">
			<div class="tab-pane fade in active" id="info" role="tabpanel">
				@include('backend.widgets.components.detail.detail-pusblishedDate',['component' => [
					'title'		=> 'Data Barang Pada Tanggal',
					'content'	=>  $page_datas->datas['Tanggal']
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
		  	<div class="tab-pane fade" id="barang1" role="tabpanel">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Nama Barang',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang1']['Nama Barang'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Stok Awal',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang1']['initialStock'])
				]])
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Stok Awal',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang1']['currentStock'])
				]])
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Stok Awal',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang1']['brokenStock'])
				]])							
		  	</div>
		  	<div class="tab-pane fade" id="barang2" role="tabpanel">				
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Nama Barang',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang2']['Nama Barang'])
				]])	
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Stok Awal',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang2']['initialStock'])
				]])
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Stok Awal',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang2']['currentStock'])
				]])
				@include('backend.widgets.components.detail.detail-text',['component' => [
					'title'		=> 'Stok Awal',
					'content'	=>  ucfirst($page_datas->datas['Barang']['Barang2']['brokenStock'])
				]])							
			</div>		  		  	
		</div>     	
	</div>
</div>
@stop