@extends('backend.pages.website.layout')
@section('page_content')

@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.website.FAQ.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.website.FAQ.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.website.FAQ.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.website.FAQ.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Version Name</label>
				{!! Form::text('version', $page_datas->datas['version']['version_name'], ['class' => 'form-control']) !!}
			</fieldset>							
			<fieldset class="form-group">
				<label for="name">Kategori</label>
				{!! Form::text('kategori', $page_datas->datas['kategori'], ['class' => 'form-control']) !!}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Sub Kategori</label>
				{!! Form::text('sub_kategori', $page_datas->datas['sub_kategori'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nomor Urut</label>
				{!! Form::text('no_urut', $page_datas->datas['no_urut'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Pertanyaan</label>
				{!! Form::text('pertanyaan', $page_datas->datas['pertanyaan'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jawaban</label>
				{!! Form::textarea('jawaban', $page_datas->datas['jawaban'], ['class' => 'form-control']) !!}
			</fieldset>		
		</div>
	</div>
{!! Form::close() !!}
@stop