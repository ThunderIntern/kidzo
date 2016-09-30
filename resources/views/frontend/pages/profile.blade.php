@extends('frontend.layout.layout')
@section('content')
	<a href="{{route('setting')}}"><button type="submit" class="black bgabu butFoot width20Per">Setting</button></a></br></br>
	<a href="{{route('password')}}"><button type="submit" class="black bgabu butFoot width20Per">Password</button></a></br></br>
	<a href="{{route('logout')}}"><button class="btn btn-success" type="submit">Log Out</button></a><br><br>

	@if($page_datas->id==null)
		<a href="{{route('prosesRating', ['item' => '1'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
		<a href="{{route('prosesRating', ['item' => '2'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
		<a href="{{route('prosesRating', ['item' => '3'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
		<a href="{{route('prosesRating', ['item' => '4'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
		<a href="{{route('prosesRating', ['item' => '5'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br></a>
	
	@elseif($page_datas->id=='1')
				<a href="{{route('prosesRating', ['item' => '1'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '2'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '3'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '4'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '5'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br></a>
				
	@elseif($page_datas->id=='2')
				<a href="{{route('prosesRating', ['item' => '1'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '2'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '3'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '4'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '5'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br></a>
				
	@elseif($page_datas->id=='3')
				<a href="{{route('prosesRating', ['item' => '1'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '2'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '3'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '4'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '5'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br></a>
				
	@elseif($page_datas->id=='4')
				<a href="{{route('prosesRating', ['item' => '1'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '2'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '3'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '4'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '5'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br></a>
	@else
				<a href="{{route('prosesRating', ['item' => '1'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '2'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '3'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '4'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
				<a href="{{route('prosesRating', ['item' => '5'])}}"><img width="3%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img><br><br></a>
		@endif

		
	{!! Form::open(['url' => route('prosesKomen')]) !!}
	<div class="col-md-12">
		{!! Form::text('komen_mobile',null, ['class' => 'form-control width80Per pull-left', 'placeholder'=>'Komentar']) !!}
        <button type="submit" class="black bgabu butFoot width20Per">Submit</button>
        {!! Form::close() !!}
	</div>
	<div class="col-md-12">
		@foreach ($page_datas->komen as $komen)
			@if($komen['content']['status'] != false)
				</br><h5 class="pul marginBottom0"><b>{{ ucFirst($komen['username']) }}</b></h5>
				
				<div class="pul">
				@if($komen['rating']=='1')
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
				@elseif($komen['rating']=='2')
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
					
				@elseif($komen['rating']=='3')
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
					
				@elseif($komen['rating']=='4')
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
				@elseif($komen['rating']=='5')
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
					<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img><br><br>
				@endif
				</div>
				
				<h6 class="pul mbottom-xs">"{{ ucFirst($komen['content']['isi']) }}"</h6>
			@endif


			@if($komen['content']['status'] == false || $komen['content']['status'] == null)
				@if($komen['rating'] != null && $komen['content']['isi'] == null)
					</br><h5 class="pul marginBottom0"><b>{{ ucFirst($komen['username']) }}</b></h5>
					
					<div class="pul">
					@if($komen['rating']=='1')
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
					@elseif($komen['rating']=='2')
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
						
					@elseif($komen['rating']=='3')
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
						
					@elseif($komen['rating']=='4')
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
					@elseif($komen['rating']=='5')
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
						<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img><br><br>
					@endif
					</div>
				@endif

				
				@if($komen['content']['isi'] != null)
					</br><h5 class="pul marginBottom0"><b>{{ ucFirst($komen['username']) }}</b></h5>
					@if($komen['rating'] != null)
						<div class="pul">
						@if($komen['rating']=='1')
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
						@elseif($komen['rating']=='2')
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
							
						@elseif($komen['rating']=='3')
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
							
						@elseif($komen['rating']=='4')
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
						@elseif($komen['rating']=='5')
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img>
							<img width="1%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img><br><br>
						@endif
						</div>
					@endif
					<h6 class="pul mbottom-xs">(Komentar sedang dalam proses pending)</h6>
				@endif

			@endif
		@endforeach
	</div>

	{!! Form::open(['url' => route('storePhoto'), 'enctype'=>"multipart/form-data"]) !!}
		<input type="file" class="form-control" name="file_photo">
		<button type="submit">Ok</button>
	{!! Form::close() !!}


	<div style="clear:both"></div>
@stop