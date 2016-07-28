<ul class="paddingTop15 list-unstyled pul">
	@forelse($datas as $data)
		@include("frontend.widget.sidebars.sidebar_list", $data)
	@empty
	    <p>There's no data provided. Please check documentation on ../widget/sidebars</p>
	@endforelse
</ul>