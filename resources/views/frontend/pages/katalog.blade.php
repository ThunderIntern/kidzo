@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="col-md-3 col-sm-3">
				
			</div>
			<div class="col-md-9 col-sm-9">
				<div class="row">
					@foreach ($page_datas->datas as $key => $data)
					<div class="col-md-4 col-sm-12 mtop-s mbottom-s">
						@include('frontend.widget.katalog')
					</div>
					@endforeach
				</div>
				<div class="row text-center">
					{{$page_datas->datas->render()}}
				</div>
			</div>
		</div>
	</div>
@stop