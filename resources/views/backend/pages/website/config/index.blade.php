@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
		<h4 class="card-title">
			Config / Page 1
			<a href="{{Route('backend.website.config.create')}}" class="pull-right btn btn-primary-outline">
				<i class="fa fa-plus"></i>
			</a>
		</h4>
		<div class="card-text">
			<form method="GET" action="http://cms.capcus.id/dashboard/contents/articles" accept-charset="UTF-8" class="m-t-2 p-y-0">
				<div class="input-group">
					<input type="text" name="search" value="" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<div class="card-block">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-md-1">#</th>
						<th class="col-md-9">Published At</th>
						<th class="col-md-2">Edited By</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="col-md-1">1</td>
						<td class="col-md-9"><a href="{{Route('backend.website.config.show',['id' => '1'])}}">01-Aug-2016</td>
						<td class="col-md-2">Admin</td>
					</tr>
					<tr>
						<td class="col-md-1">2</td>
						<td class="col-md-9">01-Aug-2016</td>
						<td class="col-md-2">Admin</td>
					</tr>
					<tr>
						<td class="col-md-1">3</td>
						<td class="col-md-9">01-Aug-2016</td>
						<td class="col-md-2">Admin</td>
					</tr>										
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop