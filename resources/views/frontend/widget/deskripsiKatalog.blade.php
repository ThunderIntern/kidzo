{!! Form::open(['url' => route('addChart', ['id' => $page_datas->datas['id']]), 'method' => 'post']) !!}
<div class="col-md-4 col-sm-4 grow pic">
    <img width="300px" height="300px" src="{{asset($page_datas->datas['barang']['attributes']['foto']['url'])}}">
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
{!! Form::close() !!}

<div class="col-md-4 col-sm-4"></div>
<div class="col-md-8 col-sm-8 text-left">
    <h2>Ulasan Produk</h2>
    <h6><b>Rating Mainan : {!!$page_datas->totalRating!!}</b></h6>
    <h6><b>User Rating &nbsp;&nbsp;&nbsp;&nbsp; : </b>
    @if($page_datas->idMainan != 'a')
        @if($page_datas->id==null)
            <a href="{{route('prosesRating', ['item' => '1', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '2', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '3', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '4', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '5', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></br></a>
        
        @elseif($page_datas->id=='1')
            <a href="{{route('prosesRating', ['item' => '1', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '2', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '3', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '4', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '5', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></br></a>
                    
        @elseif($page_datas->id=='2')
            <a href="{{route('prosesRating', ['item' => '1', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '2', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '3', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '4', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '5', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></br></a>
                    
        @elseif($page_datas->id=='3')
            <a href="{{route('prosesRating', ['item' => '1', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '2', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '3', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '4', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '5', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></br></a>
                    
        @elseif($page_datas->id=='4')
            <a href="{{route('prosesRating', ['item' => '1', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '2', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '3', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '4', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '5', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_black.png')}}"></img></br></a>
        @else
            <a href="{{route('prosesRating', ['item' => '1', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '2', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '3', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '4', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></a>
            <a href="{{route('prosesRating', ['item' => '5', 'jenis'=> $page_datas->idMainan, 'partyIndividu' => 2])}}"><img width="2%" class="img-responsive" src="{{asset('image/frontend/star_yellow.png')}}"></img></br></a>
        @endif
        </br></br>
    @endif</h6>



    @foreach ($page_datas->komen as $komen)
        @if($komen['content']['status'] != false)
            <h5 class="pull-left marginBottom0 blue">{{ ucFirst($komen['username']) }}</h5>
            <div class="pull-left">
            @if($komen['rating']=='1')
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
            @elseif($komen['rating']=='2')
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
                
            @elseif($komen['rating']=='3')
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
                
            @elseif($komen['rating']=='4')
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br><br>
            @elseif($komen['rating']=='5')
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img><br><br>
            @endif
            </div>
            
            <h6 class="pull-left mbottom-xs">"{{ ucFirst($komen['content']['isi']) }}"</h6>></br></br></br></br></br>
        @endif


        @if($komen['content']['status'] == false || $komen['content']['status'] == null)
            @if($komen['rating'] != null && $komen['content']['isi'] == null)
                <h5 class="pull-left marginBottom0 blue">{{ ucFirst($komen['username']) }}</h5>
                
                <div class="pull-left">
                @if($komen['rating']=='1')
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br></br>
                @elseif($komen['rating']=='2')
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br></br>
                    
                @elseif($komen['rating']=='3')
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br></br>
                    
                @elseif($komen['rating']=='4')
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br></br>
                @elseif($komen['rating']=='5')
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                    <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img><br></br>
                @endif
                </div>
                
            @endif

            
            @if($komen['content']['isi'] != null)
                @if($komen['rating'] != null)
                    <h5 class="pull-left marginBottom0 blue">{{ ucFirst($komen['username']) }}</h5></br>
                    <div class="pull-left">
                        @if($komen['rating']=='1')
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br>
                        @elseif($komen['rating']=='2')
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br>
                            
                        @elseif($komen['rating']=='3')
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br>
                            
                        @elseif($komen['rating']=='4')
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_black.png')}}"></img><br>
                        @elseif($komen['rating']=='5')
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img>
                            <img width="1%" class="img-responsive pull-left" src="{{asset('image/frontend/star_yellow.png')}}"></img><br>
                        @endif
                    </div>
                    <h6 class="pull-left mbottom-xs">(Komentar sedang dalam proses pending)</h6></br></br></br>
                @endif
                @if($komen['rating'] == null)
                    <h5 class="pull-left marginBottom0 blue">{{ ucFirst($komen['username']) }}</h5></br>
                    <h6 class="pull-left mbottom-xs">(Komentar sedang dalam proses pending)</h6></br></br>
                @endif
            @endif

        @endif
    @endforeach


    {!! Form::open(['url' => route('prosesKomen', ['jenis' => $page_datas->idMainan, 'partyIndividu' => 2])]) !!}
        {!! Form::text('komen_mobile',null, ['class' => 'form-control width100Per height100 pull-left']) !!}
        <div class="col-md-12">
            </br><button type="submit" class="marginLeft-10" style="background-color:white; border-radius:5px; padding-left:15px; padding-right:15px; border: 1px solid #46A0CF; color: #46A0CF;">Post Komentar</button></br></br>
        </div>
    {!! Form::close() !!}
</div>


<script>
  var disableddates = ["2016-09-30", "2016-09-29", "2016-10-12", "2016-11-11"];
 
function DisableSpecificDates(date) {
 
 var m = date.getMonth();
 var d = date.getDate();
 var y = date.getFullYear();
 
 // First convert the date in to the mm-dd-yyyy format 
 // Take note that we will increment the month count by 1 
 var currentdate = y + '-' + (m + 1) + '-' + d;
 

 
 // We will now check if the date belongs to disableddates array 
 for (var i = 0; i < disableddates.length; i++) {
 
 // Now check if the current date is in disabled dates array. 
 if ($.inArray(currentdate, disableddates) != -1 ) {
 return [false];
 } 
 }
 
 // In case the date is not present in disabled array, we will now check if it is a weekend. 
 // We will use the noWeekends function
 var weekenddate = $.datepicker.noWeekends(date);
 return weekenddate; 
 
}
  $( function() {
    $( "#datepicker" ).datepicker({
        format: 'yyyy-mm-dd',
        startDate: new Date()
    });
  } );
</script>

<style type="text/css">
    .grow img {
  height: 300px;
  width: 300px;
 
  -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;
}
 
.grow img:hover {
  width: 400px;
  height: 400px;
}
</style>