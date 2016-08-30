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
				'title' 		=> 'Admin',
				'description' 	=> 'Pengaturan Admin',
				'components' 	=> [
										'1' => ['link' => Route('backend.admin.administrator.index'), 'caption' => 'Administrator'],
										'2' => ['link' => Route('backend.admin.changePassword.index'), 'caption' => 'Change Password'],
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