<img style="width: 300px; height: 300px" class="img-responsive img-center" src="{{asset($data['url'])}}"></img>
<h4 class="black">{{$data['nama']}}</h3>
<h5 class="black">Jumlah Disewa : {{$data['jumlah']}} Buah</h4>
<h5 class="black">Lama Sewa : {{$data['lama-sewa']}} Hari</h4>
<h5 class="black">Tanggal Sewa : </br>{{$data['tanggal-keluar']}}</br> sampai </br>{{$data['tanggal-masuk']}}</h4>
<a href="{{Route('deleteChart', ['id' => $data['nama']])}}"><button class="btn btn-danger">Remove</button></a>