@extends('backend.pages.crm.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-add-search', ['component' => [
		'title'			=> 'Comment / Page' . $page_datas->datas->currentPage(),
		'link-add'		=> '#	',
		'link-search'	=> route('searchComment'),
	]])
	</div>
	@include('backend.widgets.alertbox')
	<div class="card-block">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-md-1">#</th>
						<th class="col-md-3">Email</th>
						<th class="col-md-4">Content</th>
						<th class="col-md-2">Status</th>
						<th class="col-md-2 text-xs-right">Control</th>

					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->datas as $key => $data)
					@if($data['content']['isi']!=null)
						<tr>
							<td class="col-md-1">
								{{($page_datas->datas->perpage() * ($page_datas->datas->currentPage()-1)) + ($key + 1)}}
							</td>
							<td class="col-md-3">
								<a href="{{route('backend.crm.comment.show', ['id' => $data['id']])}}">
									{{ucfirst($data['email'])}}
								</a>
							</td>
							<td class="col-md-4">
								{{$data['content']['isi']}}
							</td>
							<td class="col-md-2">
								{{ (($data['content']['status']==True) ? 'Approved' : 'Pending') }}
							</td>
							<td class="col-md-2 text-xs-right">
								<a href="{{route('backend.crm.comment.edit', ['id' => $data['id']])}}" class="btn btn-primary-outline btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
						        </a>	
								<a href="#" class="btn btn-primary-outline btn-sm" data-toggle="modal" data-target="#modalDelete" data-action="{!! route('backend.crm.comment.destroy',['id' => $data['id']]) !!}">
									<i class="fa fa-times" aria-hidden="true"></i>
						        </a>
							</td>
						</tr>										
					@endif
					@empty
						<tr>
							<td COLSPAN=4>
								Tidak ada data
							</td>
						</tr>
					@endforelse								
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

@section('modal')
	@include('backend.modals.delete')
@append