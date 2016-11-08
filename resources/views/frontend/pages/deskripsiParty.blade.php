@extends('frontend.layout.layout')
@section('content')
	<div class="container">
	@include('backend.widgets.alertbox')
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 col-sm-12 mtop-s mbottom-s text-center">
					@include('frontend.widget.deskripsiParty')
				</div>
			</div>
		</div>
	</div>
@stop