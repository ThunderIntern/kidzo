<div class="row">
	<div class="col-xs-3 ">
		<span class="text-uppercase"><strong>{!! $component['title'] !!}</strong></span>
	</div>
	<div class="col-xs-9">
		{!! $component['content']->format('d M Y h:i A') !!}
	</div>		
	<div class="col-xs-12"><hr></div>
</div>