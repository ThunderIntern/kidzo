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
{!! Form::open(['url' => route('backend.transaksi.manageBarang.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.transaksi.manageBarang.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.transaksi.manageBarang.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.transaksi.manageBarang.store', ['id' => $page_datas->id])
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
				<label for="name">Link Barang</label>
				{{ Form::text('link', $page_datas->datas['foto']['link'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Harga Barang</label>
				{{ Form::number('harga', $page_datas->datas['harga'], ['class' => 'form-control']) }}
			</fieldset>			
			<fieldset class="form-group">
				<label for="name">Deskripsi</label>
				{!! Form::textarea('deskripsi', $page_datas->datas['deskripsi'], ['class' => 'form-control summernote', 'rows' => '10']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop