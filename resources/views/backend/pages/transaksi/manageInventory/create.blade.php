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
				{{ Form::text('nama', null, ['class' => 'form-control']) }}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Stok Ditambahkan</label>
				{{ Form::number('awal', null, ['class' => 'form-control']) }}
			</fieldset>	
		</div>
	</div>
{!! Form::close() !!}
@stop