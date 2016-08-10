@extends('backend.pages.website.layout')
@section('page_content')

@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.website.config.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.website.config.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'	=>	[
														'link'	=> route('backend.website.config.index')
													],
										'save'	=>	[
														'link'	=> route('backend.website.config.store'), ['id' => $page_datas->id]
													]													
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nomor Telepon</label>
				{!! Form::text('no', null, ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Email</label>
				{{ Form::email('email', null, ['class' => 'form-control']) }}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Facebook</label>
				{{ Form::text('facebook', null, ['class' => 'form-control']) }}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Alamat</label>
				{!! Form::text('alamat', null, ['class' => 'form-control']) !!}
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
		</div>
	</div>
{!! Form::close() !!}
@stop