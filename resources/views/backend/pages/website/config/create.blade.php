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
				<label for="name">Version Name</label>
				@include('backend.widgets.selectize', ['components' => [
					'type'		=> 'version',
					'name'		=> 'version',
					'init_data'	=> $page_datas->datas['version'],
					'ajax_url'	=> route('backend.ajax.getVersion'),
				]])
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nomor Telepon</label>
				{!! Form::text('no', $page_datas->datas['config']['phone'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Email</label>
				{{ Form::email('email', $page_datas->datas['email'], ['class' => 'form-control']) }}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Facebook</label>
				{{ Form::text('facebook', $page_datas->datas['config']['facebook'], ['class' => 'form-control']) }}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Alamat</label>
				{!! Form::textArea('alamat', $page_datas->datas['config']['address'], ['class' => 'form-control textarea']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop