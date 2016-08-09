@extends('backend.pages.website.layout')
@section('page_content')

@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.website.slider.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.website.slider.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
<?php
 // dd($page_datas);
?>
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.website.slider.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.website.slider.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nama Versi</label>
				@include('backend.widgets.selectize', ['components' => [
					'type'		=> 'version',
					'name'		=> 'version',
					'init_data'	=> $page_datas->datas['version'],
					'ajax_url'	=> route('backend.ajax.getVersion'),
				]])
			</fieldset>
			<div class="row">
				<div class="col-xs-12 text-muted mb-l">
					Slider 1
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img class="img-fluid preview-slider" src="" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas[0]['url'], ['class' => 'form-control']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas[0]['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 text-muted mb-l">
					Slider 2
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img class="img-fluid preview-slider" src="" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas[1]['url'], ['class' => 'form-control']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas[1]['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 text-muted mb-l">
					Slider 3
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img class="img-fluid preview-slider" src="" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas[2]['url'], ['class' => 'form-control']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas[2]['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>
			</div>	
			
			<div class="row">
				<div class="col-xs-12 text-muted mb-l">
					Slider 4
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img class="img-fluid preview-slider" src="" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas[3]['url'], ['class' => 'form-control']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas[3]['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>
			</div>	
			
			<div class="row">
				<div class="col-xs-12 text-muted mb-l">
					Slider 5
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img class="img-fluid preview-slider" src="" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas[4]['url'], ['class' => 'form-control']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas[4]['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>
			</div>							

		</div>
	</div>
{!! Form::close() !!}
@stop