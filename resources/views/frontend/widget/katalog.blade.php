@if($page_datas->idSorting == "data")
	<a href="{{Route($data['foto']['link'], ['id' => $data->id])}}"><img width="100%" class="img-responsive img-center" src="{{asset($data['foto']['url'])}}"></img>
	<h3 class="blue">{{$data['nama']}}</h3>
	<h4 class="black"><i>from</i> Rp. {{$data['harga']}} Available</h4></a>
@endif
@if($page_datas->idSorting == "terlaris" || $page_datas->idSorting == "rating")
	<a href="{{Route($data['foto']['link'], ['id' => $data['_id']])}}"><img width="100%" class="img-responsive img-center" src="{{asset($data['foto']['url'])}}"></img>
	<h3 class="blue">{{$data['nama']}}</h3>
	<h4 class="black"><i>from</i> Rp. {{$data['harga']}} Available</h4></a>
@endif