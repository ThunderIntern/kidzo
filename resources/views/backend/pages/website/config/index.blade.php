@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-add-search', ['component' => [
		'title'			=> 'Config / Page 1',
		'link-add'		=> route('backend.website.config.create'),
		'link-search'	=> '#',
	]])
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