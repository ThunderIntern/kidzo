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
{!! Form::open(['url' => route('backend.crm.log.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.crm.log.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			<?php
				if(is_null($page_datas->id)){
					$title 		= 'Log Baru';
				}else{
					$title 		= 'Edit Log';
				}
			?>
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.crm.log.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.crm.log.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Username</label>
				{!! Form::text('username', $page_datas->datas['username'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Email</label>
				{!! Form::email('email', $page_datas->datas['email'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Phone</label>
				{!! Form::number('phone', $page_datas->datas['phone'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Content</label>
				{!! Form::text('content', $page_datas->datas['content'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Status</label>
				{{ Form::select('status', ['False' => 'Pending', 'True' => 'Contacted'], $page_datas->datas['status'], ['class' => 'form-control c-select']) }}
			</fieldset>		
		</div>
	</div>
{!! Form::close() !!}
@stop