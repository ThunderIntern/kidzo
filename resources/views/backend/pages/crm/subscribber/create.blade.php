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
{!! Form::open(['url' => route('backend.crm.subscribber.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.crm.subscribber.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
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
															'link'	=> route('backend.crm.subscribber.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.crm.subscribber.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Email</label>
				{!! Form::text('email', $page_datas->datas['email'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Version Name</label>
				@include('backend.widgets.selectize', ['components' => [
					'type'		=> 'version',
					'name'		=> 'version',
					'init_data'	=> $page_datas->datas['version'],
					'ajax_url'	=> route('backend.ajax.getVersion'),
				]])
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Unsubscribe Token</label>
				{{ Form::date('unsubscribe_token', $page_datas->datas['unsubscribe_token'], ['class' => 'form-control']) }}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Is Subscribe</label>
				{{ Form::select('is_subscribe', ['0' => 'Unsubscribed', '1' => 'Subscribed'], $page_datas->datas['is_subscribe'], ['class' => 'form-control c-select']) }}
			</fieldset>		
		</div>
	</div>
{!! Form::close() !!}
@stop