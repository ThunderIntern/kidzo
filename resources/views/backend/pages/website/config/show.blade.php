@extends('backend.pages.website.layout')
@section('page_content')
<div>
	<div class="card">
		<div class="card-block">
			<h4 class="card-title">
				Detail
			</h4>
			<hr>
 
			<a href="{{Route('backend.website.config.index')}}" class="btn btn-primary-outline">
				<i class="fa fa-chevron-left"></i> 
				Back
			</a>
			<button type="submit" class="btn btn-primary-outline pull-right">
				<i class="fa fa-pencil"></i>
				Edit
			</button>
			<hr class="thick">
		</div>
	</div>
</div>
@stop