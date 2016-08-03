@extends('backend.pages.website.layout')
@section('page_content')

{!! Form::open(['url' => route('backend.website.version.store', ['id' => $page_datas->id]) ]) !!}
	<div class="card">
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> 'Version',
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
				<label for="name">Published at <small class="text-primary">Kosongkan untuk tidak dipublish</small></label>
				<input class="form-control" data-inputmask="'mask':'d-m-y h:s'" name="published_at" type="text" value="">
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Title</label>
				<input class="form-control" name="title" type="text">
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop