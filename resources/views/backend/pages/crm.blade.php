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
			'0' => ['link' => "#", 'caption' => 'Subscribber'],
			'1' => ['link' => "#", 'caption' => 'Newsletter'],
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