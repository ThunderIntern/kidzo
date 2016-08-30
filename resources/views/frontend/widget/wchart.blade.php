<img style="width: 300px; height: 300px" class="img-responsive img-center" src="{{asset($data['url'])}}"></img>
<h3 class="black">{{$data['nama']}}</h3>
<h4 class="black">Rp. {{$data['harga']}} /Hari</h4>
<a href="{{Route('deleteChart', ['id' => $data['nama']])}}"><button class="btn btn-danger">Remove</button></a>