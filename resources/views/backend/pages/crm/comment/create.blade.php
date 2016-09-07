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
{!! Form::open(['url' => route('backend.crm.comment.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.crm.comment.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			<?php
				if(is_null($page_datas->id)){
					$title 		= 'Comment Baru';
				}else{
					$title 		= 'Edit Comment';
				}
			?>
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.crm.comment.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.crm.comment.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Status</label>
				{{ Form::select('status', ['False' => 'Pending', 'True' => 'Approved'], $page_datas->datas['status'], ['class' => 'form-control c-select']) }}
			</fieldset>		
		</div>
	</div>
{!! Form::close() !!}
@stop