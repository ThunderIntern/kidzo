@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				@foreach ($page_datas->datas as $key => $data)
				<div class="col-md-4 col-sm-12 mtop-s mbottom-s text-center">
					@include('frontend.widget.party')
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop