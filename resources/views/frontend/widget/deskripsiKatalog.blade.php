{!! Form::open(['url' => route('addChart', ['id' => $page_datas->datas['id']]), 'method' => 'post']) !!}
<div class="col-md-4 col-sm-4">
	<img style="width: 300px; height: 300px" class="img-responsive img-center" src="{{asset($page_datas->datas['barang']['attributes']['foto']['url'])}}"></img>
	<h3 class="black">{{$page_datas->datas['barang']['attributes']['nama']}}</h3>
	<h4 class="black">{{$page_datas->datas['barang']['attributes']['jenis']}}</h4>
	<h5 class="black">{{$page_datas->datas['barang']['attributes']['deskripsi']}}</h5>
	<a href="#"><button type="submit" name="sign" value="chart" class="btn btn-success">Add To Chart</button></a>
	<a href="#"><button type="submit" name="sign" value="check" class="btn btn-primary">Check Out</button></a>
</div>
<div class="col-md-5 col-sm-5">
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
<div class="col-md-3 col-sm-3">
    @foreach($page_datas->datas['inven'] as $key => $data)
    <div class="col-md-12 col-sm-12">
        <?php //dd($data) ?>
        {{$data['tanggal']}}</br>
        @foreach($data['inventory']['barang'] as $key2 => $barang)
            {{$barang['nama']}}</br>
            {{$barang['currentStock']}}</br>
        @endforeach    
    </div>
    @endforeach
</div>
{!! Form::close() !!}