@extends('backend.pages.website.layout')
@section('page_content')
{!! Form::open(['url' => route('backend.website.config.store') ]) !!}
<div>
	<div class="card">
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> 'Create Config',
				'controls'		=> 	[
										'back'	=>	[
														'link'	=> route('backend.website.config.index')
													],
										'save'	=>	[
														'link'	=> route('backend.website.config.store')
													]													
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nomor Telepon</label>
				{!! Form::text('no', null, ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Alamat</label>
				{!! Form::text('alamat', null, ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Email</label>
				{{ Form::email('email', null, ['class' => 'form-control']) }}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Facebook</label>
				{{ Form::text('facebook', null, ['class' => 'form-control']) }}
			</fieldset>		
		</div>
	</div>
</div>
@stop