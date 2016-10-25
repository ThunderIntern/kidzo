@if($page_datas->status  == 'profile')
<ul class="list-unstyled" style="margin-left:-20px;">
	<li class="pil black blue">
		<h6>Nama Pelanggan</h6>
	</li>
	<li class="pil black mbottom-s">
		<h6>{!!$page_datas->name!!}</h6>
	</li>
	<li class="pil black blue">
		<h6>Alamat</h6>
	</li>
	<li class="pil black mbottom-s">
		<h6>{!!$page_datas->address!!}</h6>
	</li>
	<li class="pil black blue">
		<h6>Kontak</h6>
	</li>
	<li class="pil black mbottom-s">
		<h6>{!!$page_datas->phone!!}</h6>
	</li>
	<li class="pil black mbottom-s">
		<a class="black <?php if($segment2=='setting') echo 'blue';?>" href="{{route('setting')}}"><button class="editProfile" style="background-color:white; border-radius:5px; padding-left:15px; padding-right:15px; border: 1px solid #46A0CF; color: #46A0CF;">Edit Profil</button></a>
	</li>
</ul>
@endif

@if($page_datas->status  == 'setting')
<ul class="list-unstyled" style="margin-left:-20px;">
    {!! Form::open(['url' => route('updateSetting')]) !!}
        <li class="pil black blue">
            <h6>Username</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!!$page_datas->username!!}</h6>
        </li>
        <li class="pil black blue">
            <h6>Email</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!!$page_datas->email!!}</h6>
        </li>
        <li class="pil black blue">
            <h6>Nama Pelanggan</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!! Form::text('nama',$page_datas->name, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}</h6>
        </li>
        <li class="pil black blue">
            <h6>Address</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!! Form::text('alamat',$page_datas->address, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}</h6>
        </li>
        <li class="pil black blue">
            <h6>Phone Number</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!! Form::text('no',$page_datas->phone, ['class' => 'form-control mbottom-s' ,'placeholder' => 'Username Anda']) !!}</h6>
        </li>
        <li class="pil black mbottom-s">
            <button type="submit" class="editProfile" style="background-color:white; border-radius:5px; padding-left:15px; padding-right:15px; border: 1px solid #46A0CF; color: #46A0CF;">Save</button>
        </li>
    {!! Form::close() !!}
</ul>
@endif

@if($page_datas->status  == 'password')
<ul class="list-unstyled" style="margin-left:-20px;">
    {!! Form::open(['url' => route('updatePassword')]) !!}
        <li class="pil black blue">
            <h6>Masukkan Password Lama Anda</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!! Form::password('password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Lama']) !!}</h6>
        </li>
        <li class="pil black blue">
            <h6>Masukkan Password Baru Anda</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!! Form::password('new_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Password Baru']) !!}</h6>
        </li>
        <li class="pil black blue">
            <h6>Masukkan Kembali Password Baru Anda</h6>
        </li>
        <li class="pil black mbottom-s">
            <h6>{!! Form::password('conf_password', ['class' => 'form-control mbottom-s' , 'placeholder' => 'Konfirmasi Password']) !!}</h6>
        </li>
        <li class="pil black mbottom-s">
            <button type="submit" class="editProfile" style="background-color:white; border-radius:5px; padding-left:15px; padding-right:15px; border: 1px solid #46A0CF; color: #46A0CF;">Save</button>
        </li>
    {!! Form::close() !!}
</ul>
@endif

@if($page_datas->status  == 'historyUser')
	@if($page_datas->username!=null)
		@for($x=0;$x<$page_datas->banyakRiwayat;$x++)
			<div class="col-md-6">
				<div class="col-md-12">
					<h5><b>Tujuan Pengiriman</b></h5>
				</div>
				<div class="col-md-12">
					<h6>Nama Penerima : {!!$page_datas->nama[$x]!!}</h6>
				</div>
				<div class="col-md-12">
					<h6>Alamat Tujuan &nbsp &nbsp: {!!$page_datas->alamat[$x]!!}</h6>
				</div>
				<div class="col-md-12">
					<h6>Telepon &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {!!$page_datas->nomor[$x]!!}</h6>
				</div>
			</div></br></br></br></br></br>

			<div class="col-md-12 borderAbu">
				<div class="col-md-2">
					<h5><b>Nama Produk</b></h5>
				</div>
				<div class="col-md-2">
					<h5><b>Tanggal Sewa</b></h5>
				</div>
				<div class="col-md-2" >
					<h5><b>Harga</b></h5>
				</div>
				<div class="col-md-2">
					<h5><b>Kuantitas</b></h5>
				</div>
				<div class="col-md-2">
					<h5><b>Lama Sewa</b></h5>
				</div>
				<div class="col-md-2">
					<h5><b>Subtotal</b></h5>
				</div>
			</div>
			<?php 
				$i = 0; 
				$tot = 0;
			?>
			@while($page_datas->barang[$x][$i]!=null)
				<div class="col-md-12 borderBottom1 borderLeft1 borderRight1">
					<div class="col-md-2">
						<h6>{!!$page_datas->barang[$x][$i][0]!!}</h6>
					</div>
					<div class="col-md-2">
						<h6>{!!$page_datas->barang[$x][$i][4]!!}</h6>
					</div>
					<div class="col-md-2">
						<h6>{!!$page_datas->barang[$x][$i][1]!!}</h6>
					</div>
					<div class="col-md-2">
						<h6>{!!$page_datas->barang[$x][$i][2]!!}</h6>
					</div>
					<div class="col-md-2">
						<h6>{!!$page_datas->barang[$x][$i][3]!!}</h6>
					</div>
					<div class="col-md-2">
						<h6>{!!(int)$page_datas->barang[$x][$i][1]*(int)$page_datas->barang[$x][$i][2]*(int)$page_datas->barang[$x][$i][3];
							$tot += (int)$page_datas->barang[$x][$i][1]*(int)$page_datas->barang[$x][$i][2]*(int)$page_datas->barang[$x][$i][3];!!}</h6>
					</div>
				</div>
				<?php $i++; ?>
			@endwhile
			<div class="col-md-12 borderBottom1 borderRight1 borderLeft1">
				<div class="col-md-10 text-center">
					<h6><b>TOTAL</b></h6>
				</div>
				<div class="col-md-2">
					<h6><b>{!!$tot!!}</b></h6>
				</div>
			</div></br></br></br></br></br></br></br>
		@if($x+1 != $page_datas->banyakRiwayat)
			<hr>
		@endif
		@endfor
	@endif

	@if($page_datas->username==null)
		<h4 class="text-center">Tidak ada riwayat transaksi</h4>
	@endif
@endif