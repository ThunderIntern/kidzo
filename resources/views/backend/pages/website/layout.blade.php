@extends('backend.layout.layout')
@section('content')
<div class="container-fluid">
	<div class="row clearfix">
		&nbsp;
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-lg-3">
			@include('backend.widgets.sidebar', [
				'title' 		=> 'Website',
				'description' 	=> 'Pengaturan Website',
				'components' 	=> [
										'1' => ['link' => Route('backend.website.config.index'), 'caption' => 'Config'],
										'2' => ['link' => Route('backend.website.slider.index'), 'caption' => 'Slider'],
										'3' => ['link' => Route("backend.website.FAQ.index"), 'caption' => 'FAQ'],
										'4' => ['link' => Route("backend.website.version.index"), 'caption' => 'Version'],
									]
			])
		</div>
 
		<div class="col-xs-12 col-lg-9">
			<div class="row mb-s">
				<div class="col-sm-12">
					@yield('page_content')
				</div>
			</div>
		</div>
	</div>
</div>
@stop