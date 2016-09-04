{!! Form::open(['url' => route('addChart', ['id' => $page_datas->datas->id]), 'method' => 'post']) !!}
<div class="col-md-6 col-sm-6">
	<img style="width: 300px; height: 300px" class="img-responsive img-center" src="{{asset($page_datas->datas['foto']['url'])}}"></img>
	<h3 class="black">{{$page_datas->datas['nama']}}</h3>
	<h4 class="black">{{$page_datas->datas['jenis']}}</h4>
	<h5 class="black">{{$page_datas->datas['deskripsi']}}</h5>
	<a href="#"><button type="submit" class="btn btn-success">Add To Chart</button></a>
	<a href="{{Route('addData')}}"><button class="btn btn-primary">Check Out</button></a>
</div>
<div class="col-md-6 col-sm-6">
    <div class="col-sm-12 mbottom-m">
        <select name="hari" class="butFoot width100Per dropdown-toggle">
            <option value="">Lama Sewa</option>
            <option value="1">1 Hari</option>
            <option value="2">2 Hari</option>
            <option value="3">3 Hari</option>
            <option value="4">4 Hari</option>
            <option value="5">5 Hari</option>
            <option value="6">6 Hari</option>
            <option value="7">1 Minggu</option>
            <option value="8">2 Minggu</option>
            <option value="9">1 Bulan</option>
        </select>
    </div>
    <div class="col-sm-12 mbottom-m">
        <div class="col-sm-6">
            <label>Pilih Tanggal</label>
        </div>
        <div class="col-sm-6">
            <input name="tanggalk" type="date" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 mbottom-m">
        <div class="col-sm-6">
            <label>Jumlah</label>
        </div>
        <div class="col-sm-6">
            <input name="jumlah" type="number" class="form-control" placeholder="1" value="1">
        </div>
    </div>
</div>
{!! Form::close() !!}