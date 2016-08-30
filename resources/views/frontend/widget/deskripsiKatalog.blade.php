<img style="width: 300px; height: 300px" class="img-responsive img-center" src="{{asset($page_datas->datas['foto']['url'])}}"></img>
<h3 class="black">{{$page_datas->datas['nama']}}</h3>
<h4 class="black">{{$page_datas->datas['jenis']}}</h4>
<h5 class="black">{{$page_datas->datas['deskripsi']}}</h5>
<a href="{{Route($page_datas->datas['foto']['link'], ['id' => $page_datas->datas->id])}}"><button class="btn btn-success">Add To Chart</button></a>
<a href="{{Route($page_datas->datas['foto']['link'], ['id' => $page_datas->datas->id])}}"><button class="btn btn-primary">Check Out</button></a>