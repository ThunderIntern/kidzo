@extends('backend.pages.crm.layout')
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
{!! Form::open(['url' => route('backend.subscribber.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.subscribber.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		<div class="card-block">
			<?php
				if(is_null($page_datas->id)){
					$title 		= 'Subscribber Baru';
				}else{
					$title 		= 'Edit Subscribber';
				}
			?>
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.subscribber.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.subscribber.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nama Versi</label>
				{!! Form::text('version_name', $page_datas->datas['version_name'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Domain</label>
				{!! Form::text('domain', $page_datas->datas['domain'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Status</label>
				{{ Form::select('is_active', ['0' => 'Tidak Aktif', '1' => 'Aktif'], $page_datas->datas['is_active'], ['class' => 'form-control c-select']) }}
			</fieldset>			
		</div>
	</div>
{!! Form::close() !!}
@stop