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
{!! Form::open(['url' => route('backend.transaksi.pembayaran.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.transaksi.pembayaran.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.transaksi.pembayaran.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.transaksi.pembayaran.store', ['id' => $page_datas->id])
														]
									]
			]])			
			<fieldset class="form-group">
				<label for="name">Status</label>
				{{ Form::select('status', ['chart' => 'chart', 'pending' => 'pending' , 'processed' => 'processed', 'delivered' => 'delivered'], $page_datas->datas['status'], ['class' => 'form-control c-select']) }}		
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop