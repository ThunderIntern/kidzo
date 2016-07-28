
{{-- 
	widget name : Sidebar widget
	required parameter : link, caption
	passing variable : $components 
	passing method : $components["ORDER NUMBER" => ['link' => 'MENU'S LINK', 'caption' => 'MENU'S Caption]]
	author : Budi
--}}

<div class="card">
	<div class="card-block">
		<h4 class="card-title">Website</h4>
		<p class="card-text">Pengaturan Website</p>
	</div>
	<ul class="list-group list-group-flush">
		@forelse($components as $component)
		    @include("backend.widgets.components.sidebar.menu_list", $component)
		@empty
		    <p>There's no components provided. Please check documentation on ../widgets/sidebar</p>
		@endforelse
	</ul>
</div> 