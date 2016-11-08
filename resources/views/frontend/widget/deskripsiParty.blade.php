{!! Form::open(['url' => route('addChart', ['id' => $page_datas->datas['id']]), 'method' => 'post']) !!}
<div class="col-md-4 col-sm-4">
    <img style="width: 300px; height: 300px" class="img-responsive img-center" src="{{asset($page_datas->datas['barang']['attributes']['foto']['url'])}}"></img>
</div>
<div class="col-md-5 col-sm-5">
    <div class="col-md-12 col-sm-12 mbottom-m">
        <h3 class="black text-left">{{$page_datas->datas['barang']['attributes']['nama']}}</h3>
    </div>
    <div class="col-md-12 col-sm-12 mbottom-m">
        <h5 class="black text-left">{{$page_datas->datas['barang']['attributes']['deskripsi']}}</h5>
    </div>
    <div class="col-md-12 col-sm-12 mbottom-m">
        <table class="table-bordered mleft-s">
            <tr>
                <thead>
                    <td class="pleft-s pright-s">Masa Sewa</td>
                    <td class="pleft-s pright-s">Harga Sewa</td>
                </thead>
            </tr>
            <tr>
                <td>1 Hari</td>
                <td>{{$page_datas->datas['barang']['attributes']['harga']}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12 col-sm-12 mbottom-m">
        <div class="col-md-12 col-sm-12">
            <label class="pull-left">Lama Sewa</label>
        </div>
        <div class="col-md-12 col-sm-12">
            <select name="hari" class="butFoot width80Per dropdown-toggle pull-left form-control">
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
    </div>
    <div class="col-md-12 col-sm-12 mbottom-m">
        <div class="col-md-12 col-sm-12">
            <label class="pull-left">Tanggal Mulai Sewa</label>
        </div>
        <div class="col-md-12 col-sm-12">
            <input name="tanggalk" type="text" class="datepicker form-control width80Per" id="datepicker">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mbottom-m">
        <div class="col-md-12 col-sm-12">
            <label class="pull-left">Jumlah</label>
        </div>
        <div class="col-md-12 col-sm-12">
            <input name="jumlah" type="number" class="form-control width80Per" placeholder="1" value="1">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mbottom-m">
        <a href="#"><button type="submit" name="sign" value="chart" class="btn btn-secondary pull-left mleft-s green">Add To Chart</button></a>
        <a href="#"><button type="submit" name="sign" value="check" class="btn btn-secondary pull-right mright-xl blue">Check Out</button></a>
    </div>
</div>
@if(is_null($page_datas->datas['inven']))
@else
<div class="col-md-3 col-sm-3">
<table class="table">
    <tr>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Sisa Stok</th>
    </tr>    
            <?php //dd($page_datas->datas) ?>
        @foreach($page_datas->datas['inven'] as $key => $data)
        <tr>
            <td>{{$data['tanggal']}}</td>
            @foreach($data['inventory']['barang'] as $key2 => $barang)
            <tr>
                <td></td>
                <td>{{$barang['nama']}}</td>
                <td>{{$barang['currentStock']}}</td>
            </tr>
            @endforeach    
        </tr>
        @endforeach
</table>
</div>
@endif
{!! Form::close() !!}
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        format: 'yyyy-mm-dd',
        startDate: new Date()
    });
  } );
  </script>