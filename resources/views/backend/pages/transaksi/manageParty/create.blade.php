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
{!! Form::open(['url' => route('backend.transaksi.manageParty.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.transaksi.manageParty.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.transaksi.manageParty.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.transaksi.manageParty.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama', $page_datas->datas['nama'], ['class' => 'form-control']) }}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Jenis Barang</label>
				{{ Form::text('jenis', $page_datas->datas['jenis'], ['class' => 'form-control']) }}
			</fieldset>				
			<fieldset class="form-group">
				<label for="name">Url Barang</label>
				{{ Form::text('url', $page_datas->datas['foto']['url'], ['class' => 'form-control']) }}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Harga Barang</label>
				{{ Form::number('harga', $page_datas->datas['harga'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Lama Perawatan</label>
				{{ Form::number('lama', $page_datas->datas['perawatan'], ['class' => 'form-control']) }}
			</fieldset>				
			<fieldset class="form-group">
				<label for="name">Deskripsi</label>
				{!! Form::textarea('deskripsi', $page_datas->datas['deskripsi'], ['class' => 'form-control summernote', 'rows' => '10']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Isi Party Pack</label>
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama1', $page_datas->datas['isi']['0']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah1', $page_datas->datas['isi']['0']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama2', $page_datas->datas['isi']['1']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah2', $page_datas->datas['isi']['1']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama3', $page_datas->datas['isi']['2']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah3', $page_datas->datas['isi']['2']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama4', $page_datas->datas['isi']['3']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah4', $page_datas->datas['isi']['3']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama5', $page_datas->datas['isi']['4']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah5', $page_datas->datas['isi']['4']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama6', $page_datas->datas['isi']['5']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah6', $page_datas->datas['isi']['5']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama Barang</label>
				{{ Form::text('nama7', $page_datas->datas['isi']['6']['nama'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jumlah Barang</label>
				{{ Form::number('jumlah7', $page_datas->datas['isi']['6']['jumlah'], ['class' => 'form-control']) }}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop