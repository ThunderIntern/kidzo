@extends('backend.pages.transaksi.layout')
@section('page_content')
<div class="container-fluid">
	<div class="row clearfix">
		&nbsp;
	</div>
</div>

<div class="container-fluid">
<!-- content -->
</div><?php 
// dd($page_datas->id);
?>
@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.transaksi.manageInventory.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.transaksi.manageInventory.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.transaksi.manageInventory.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.transaksi.manageInventory.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama', $page_datas->datas['Nama_Barang'], ['class' => 'form-control']) }}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Tanggal Masuk</label>
				{{ Form::date('tm', $page_datas->datas['Tanggal_Masuk'], ['class' => 'form-control']) }}
			</fieldset>				
			<fieldset class="form-group">
				<label for="name">Tanggal Keluar</label>
				{{ Form::date('tk', $page_datas->datas['Tanggal_Keluar'], ['class' => 'form-control']) }}				
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nomor Nota</label>
				{{ Form::number('no', $page_datas->datas['Nota']['Nomor Nota'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Isi Nota</label>
				{{ Form::number('isi', $page_datas->datas['Nota']['Isi Nota'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Keterangan Nomor Telepon Penyewa</label>
				{{ Form::number('notel', $page_datas->datas['Keterangan']['Nomor Telepon'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Keterangan Lama Sewa</label>
				{{ Form::text('lama', $page_datas->datas['Keterangan']['Lama Sewa'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Keterangan Alamat Penyewa</label>
				{!! Form::textarea('deskripsi', $page_datas->datas['Keterangan']['Alamat Penyewa'], ['class' => 'form-control', 'rows' => '10']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Stok Awal</label>
				{{ Form::number('awal', $page_datas->datas['Initial_Stock'], ['class' => 'form-control']) }}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Stok Sekarang</label>
				{{ Form::number('sekarang', $page_datas->datas['Current_Stock'], ['class' => 'form-control']) }}
			</fieldset>	
		</div>
	</div>
{!! Form::close() !!}
@stop