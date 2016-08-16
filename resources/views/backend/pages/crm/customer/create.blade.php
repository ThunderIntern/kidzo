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
{!! Form::open(['url' => route('backend.crm.customer.store') ]) !!}
@else
{!! Form::open(['url' => route('backend.crm.customer.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('backend.widgets.alertbox')
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('backend.crm.customer.index')
														],
										'save'		=> 	[
															'link'	=> route('backend.crm.customer.store', ['id' => $page_datas->id])
														]
									]
			]])
			<fieldset class="form-group">
				<label for="name">Email</label>
				{{ Form::email('email', $page_datas->datas['email'], ['class' => 'form-control']) }}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Username</label>
				{{ Form::text('username', $page_datas->datas['username'], ['class' => 'form-control']) }}
			</fieldset>				
			<fieldset class="form-group">
				<label for="name">Password</label>
				{{ Form::password('password', array('class' => 'form-control')) }}				
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Confirm Password</label>
				{{ Form::password('conf_password', array('class' => 'form-control')) }}				
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nama</label>
				{{ Form::text('nama', $page_datas->datas['name'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Nomor Telepon</label>
				{{ Form::number('no', $page_datas->datas['phone'], ['class' => 'form-control']) }}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Alamat</label>
				{!! Form::textArea('alamat', $page_datas->datas['address'], ['class' => 'form-control textarea']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop