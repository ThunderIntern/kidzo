@extends('backend.pages.crm.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-add-search', ['component' => [
		'title'			=> 'Newsletter / Page 1',
		'link-add'		=> route('backend.crm.newsletter.create'),
		'link-search'	=> '#',
	]])
	</div>
	<div class="card-block">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-md-1">#</th>
						<th class="col-md-3">Email</th>
						<th class="col-md-3">Version</th>
						<th class="col-md-3">Status</th>
						<th class="col-md-2 text-xs-right">Control</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->datas as $key => $data)
						<tr>
							<td class="col-md-1">
								{{($page_datas->datas->perpage() * ($page_datas->datas->currentPage()-1)) + ($key + 1)}}
							</td>
							<td class="col-md-3">
								<a href="{{route('backend.crm.newsletter.show', ['id' => $data['id']])}}">
									{{ucfirst($data['email'])}}
								</a>
							</td>
							<td class="col-md-3">
								{{$data['version']['version_name']}}
							</td>
							<td class="col-md-3">
								{{ (($data['is_subscribe']==true) ? 'Subscribed' : 'Unsubscribed') }}
							</td>
							<td class="col-md-2 text-xs-right">
								<a href="{{route('backend.crm.newsletter.edit', ['id' => $data['id']])}}" class="btn btn-primary-outline btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
						        </a>	
								<a href="#" class="btn btn-primary-outline btn-sm" data-toggle="modal" data-target="#modalDelete" data-action="{!! route('backend.crm.newsletter.destroy',['id' => $data['id']]) !!}">
									<i class="fa fa-times" aria-hidden="true"></i>
						        </a>
							</td>
						</tr>										
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