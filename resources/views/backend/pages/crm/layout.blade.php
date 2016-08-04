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
			'title' 		=> 'CRM',
			'description' 	=> 'Pengaturan Newsletter',
			'components' => [
								'0' => ['link' => Route('backend.crm.subscribber.index'), 'caption' => 'Subscribber'],
								'1' => ['link' => Route('backend.crm.newsletter.index'), 'caption' => 'Newsletter'],
		]])
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