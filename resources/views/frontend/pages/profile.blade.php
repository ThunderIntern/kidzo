@extends('frontend.layout.layout')
@section('content')
	<a href="{{route('setting')}}"><button type="submit" class="black bgabu butFoot width20Per">Setting</button></a></br></br>
	<a href="{{route('password')}}"><button type="submit" class="black bgabu butFoot width20Per">Password</button></a></br></br>
	<a href="{{route('logout')}}"><button class="btn btn-success" type="submit">Log Out</button></a><br><br>

	{!! Form::open(['url' => route('prosesKomen')]) !!}
	<div class="col-md-12">
		{!! Form::text('komen_mobile',null, ['class' => 'form-control width80Per pull-left', 'placeholder'=>'Komentar']) !!}
        <button type="submit" class="black bgabu butFoot width20Per">Submit</button>
        {!! Form::close() !!}
	</div>
	<div class="col-md-12">
		@foreach ($page_datas->komen as $komen)
			<h6 class="pul mbottom-xs"><b>{{ ucFirst($komen['content']) }}</b></h6>
		@endforeach
	</div>

	<div style="clear:both"></div>
@stop