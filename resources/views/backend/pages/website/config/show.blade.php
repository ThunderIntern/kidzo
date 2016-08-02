@extends('backend.pages.website.layout')
@section('page_content')
<div>
	<div class="card">
		<div class="card-block">
			@include('backend.widgets.components.title.title-control', ['component' => [
				'title'			=> 'Create Config',
				'controls'		=> 	[
										'back'	=>	[
														'link'	=> Route('backend.website.config.index')
													],
										'edit'	=>	[
														'link'	=> '#'
													]													
									]
			]])
		</div>
	</div>
</div>
@stop