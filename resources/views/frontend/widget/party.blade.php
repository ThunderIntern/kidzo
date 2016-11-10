<a href="{{Route($data['foto']['link'], ['id' => $data->id])}}"><img style="width: 100%" class="img-responsive img-center" src="{{asset($data['foto']['url'])}}"></img>
<h3 class="black">{{$data['nama']}}</h3>
<h4 class="black">Rp. {{$data['harga']}} /Hari</h4></a>