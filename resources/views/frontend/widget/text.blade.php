<div class="row mbottom-s">
	@forelse($datas as $data)
		@include("frontend.widget.texts.text_list", $data)
	@empty
	    <p>There's no components provided. Please check documentation on ../widget/text</p>
	@endforelse
</div>