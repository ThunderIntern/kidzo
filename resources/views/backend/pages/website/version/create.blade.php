@extends('backend.pages.website.layout')
@section('page_content')

@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.website.version.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.website.version.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.website.version.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.website.version.store', ['id' => $page_datas->id])
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