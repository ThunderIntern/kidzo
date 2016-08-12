@extends('backend.pages.crm.layout')
@section('page_content')
<div class="container-fluid">
	<div class="row clearfix">
		&nbsp;
	</div>
</div>

<div class="container-fluid">
<!-- content -->
</div><?php 
// dd($page_datas->id);
?>
@if(is_null($page_datas->id))
{!! Form::open(['url' => route('backend.crm.newsletter.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.crm.newsletter.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.crm.newsletter.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.crm.newsletter.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Nama Versi</label>
				@include('backend.widgets.selectize', ['components' => [
					'type'		=> 'version',
					'name'		=> 'version',
					'init_data'	=> $page_datas->datas['version'],
					'ajax_url'	=> route('backend.ajax.getVersion'),
				]])
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Judul</label>
				{{ Form::text('judul', $page_datas->datas['judul'], ['class' => 'form-control']) }}
			</fieldset>				
			<fieldset class="form-group">
				<label for="name">Content</label>
				{!! Form::textarea('content', $page_datas->datas['content'], ['class' => 'form-control summernote', 'rows' => '10']) !!}				
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop