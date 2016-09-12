@if(Session::has('msg') || $errors->any())
	<div class="card-block" style="padding-top:0px;padding-bottom:0px;">
		<div class="row">
		    <div class="col-lg-12">
		        <div class="alert alert-{{Session::get('msg-type')}} alert-dismissable m-b-none" style="margin-top: 0px;margin-bottom:0px">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                @if(Session::has('msg'))
		                {!!Session::get('msg')!!}
		                @if(Session::has('msg-action') && Session::has('msg-title'))
		                	<a href="{!! Session::get('msg-action') !!}">
		                		{!! Session::get('msg-title') !!}
		                	</a>
		                @endif
	                @else
	    	            @foreach ($errors->all('<p>:message</p>') as $error)
			                {!! $error !!}
			            @endforeach
	                @endif
		        </div>
		    </div>
		</div>
	</div>
@endif