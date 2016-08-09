@extends('backend.pages.website.layout')
@section('page_content')

@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.website.slider.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.website.slider.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
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
					<img id="slider1" class="img-fluid preview-slider" src="{{ empty($page_datas->datas['config']['slider1']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider1']['url'] }}" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas['config']['slider1']['url'], ['class' => 'form-control image_input', 'data-canvas' => 'slider1']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas['config']['slider1']['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>

				<div class="col-xs-12 text-muted mb-l">
					Slider 2
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img id="slider2" class="img-fluid preview-slider" src="{{ empty($page_datas->datas['config']['slider2']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider2']['url'] }}" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas['config']['slider2']['url'], ['class' => 'form-control image_input', 'data-canvas' => 'slider2']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas['config']['slider2']['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>
				
				<div class="col-xs-12 text-muted mb-l">
					Slider 3
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img id="slider3" class="img-fluid preview-slider" src="{{ empty($page_datas->datas['config']['slider3']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider3']['url'] }}" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas['config']['slider3']['url'], ['class' => 'form-control image_input', 'data-canvas' => 'slider3']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas['config']['slider3']['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>

				<div class="col-xs-12 text-muted mb-l">
					Slider 4
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img id="slider4" class="img-fluid preview-slider" src="{{ empty($page_datas->datas['config']['slider4']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider4']['url'] }}" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas['config']['slider4']['url'], ['class' => 'form-control image_input', 'data-canvas' => 'slider4']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas['config']['slider4']['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>	

				<div class="col-xs-12 text-muted mb-l">
					Slider 5
				</div>
				<div class="col-xs-12 col-lg-4 mb-l">
					<img id="slider5" class="img-fluid preview-slider" src="{{ empty($page_datas->datas['config']['slider5']['url']) ? 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500' : $page_datas->datas['config']['slider5']['url'] }}" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-lg-8">
					<fieldset class="form-group">
						<label for="image">Image URL</label>
						{!! Form::text('sliders_image[]', $page_datas->datas['config']['slider5']['url'], ['class' => 'form-control image_input', 'data-canvas' => 'slider5']) !!}
						<small class="text-muted">Size: 1000x500. Max filesize 80kb</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Link to</label>
						{!! Form::text('sliders_link[]', $page_datas->datas['config']['slider5']['link'], ['class' => 'form-control']) !!}
					</fieldset>
				</div>											

			</div>				
		</div>
	</div>
{!! Form::close() !!}
@stop

