@if(is_null(Session::get('akun')))
<script type="text/javascript ">
 		window.location.href = '{{route("signuped")}}';
</script>
@else
@extends('frontend.layout.layout')
@section('content')
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				@if(is_null($page_datas->datas))
				<div class="jumbotron">
					<h2 class="text-center">No Chart Added</h2>
				</div>
				@else
				@foreach ($page_datas->datas as $key => $data)
				<div class="col-md-4 col-sm-12 mtop-s mbottom-s text-center">
					@include("frontend.widget.wchart")
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
@stop
@endif