@extends('backend.pages.website.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('backend.widgets.components.title.title-add-search', ['component' => [
		'title'			=> 'Slider / Page 1',
		'link-add'		=> route('backend.website.slider.create'),
		'link-search'	=> '#',
	]])
	</div>
	@include('backend.widgets.alertbox')
	<div class="card-block">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-md-1">#</th>
						<th class="col-md-5">Published At</th>
						<th class="col-md-4">Published By</th>
						<th class="col-md-2 text-xs-right">Control</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->datas as $key => $data)
						<tr>
							<td class="col-md-1">
								{{($page_datas->datas->perpage() * ($page_datas->datas->currentPage()-1)) + ($key + 1)}}
							</td>
							<td class="col-md-5">
								<a href="{{route('backend.website.slider.show', ['id' => $data['id']])}}">
									{!! $data['published_at']->format('d M Y h:i A') !!}
								</a>
							</td>
							<td class="col-md-4">
								{{ucfirst($data['admin'])}}
							</td>
							<td class="col-md-2 text-xs-right">
								<a href="{{route('backend.website.slider.edit', ['id' => $data['id']])}}" class="btn btn-primary-outline btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
						        </a>	
								<a href="#" class="btn btn-primary-outline btn-sm" data-toggle="modal" data-target="#modalDelete" data-action="{!! route('backend.website.slider.destroy',['id' => $data['id']]) !!}">
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
		{!! $page_datas->datas->render(new \Illuminate\Pagination\BootstrapFourPresenter($page_datas->datas)); !!}
	</div>
</div>
@stop

@section('modal')
	@include('backend.modals.delete')
@append