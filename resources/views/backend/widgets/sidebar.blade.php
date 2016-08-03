
{{-- 
	widget name 		: Sidebar widget
	required parameter 	: link, caption
	passing variable 	: $components, $title ,$description 
	passing components 	: $components["ORDER NUMBER" => ['link' => 'MENU'S LINK', 'caption' => 'MENU'S Caption]]
	author 				: Budi
--}}

<div class="card static-sidemenu">
	@include('backend.widgets.components.title.title-description', [
		'component'		=> 	[
								'title'			=> $title,
								'description'	=> $description,
							]
	])
	<ul class="list-group list-group-flush">
		@forelse($components as $component)
		    @include("backend.widgets.components.sidebar.menu_list", $component)
		@empty
		    <p>There's no components provided. Please check documentation on ../widgets/sidebar</p>
		@endforelse
	</ul>
</div> 