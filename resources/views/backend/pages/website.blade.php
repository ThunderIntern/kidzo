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
		@include('backend.widgets.sidebar', ['components' => [
			'0' => ['link' => "http://localhost:8000/admin/website/config/{id}", 'caption' => 'Config'],
			'1' => ['link' => "http://localhost:8000/admin/slider", 'caption' => 'Sliders'],
			'2' => ['link' => "http://localhost:8000/admin/about", 'caption' => 'About'],
			'3' => ['link' => "http://localhost:8000/admin/website/manage_version", 'caption' => 'Version'],
		]])
		</div>
 
		<div class="col-xs-12 col-lg-9">
			<div class="row mb-s">
				<div class="col-sm-12">
					<div class="row">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop