	@extends('backend.pages.crm.layout')
	@section('page_content')
	<div class="card">
		<div class="card-block">
			<div class="col-md-12">
				<h1 class="text-center mtop-s">Data Statistik {!! $page_datas->jenis!!}</h1>
				<p><i>(Sistem ini menghitung berdasarkan data setiap bulan dalam 1 tahun, sehingga pada bulan pertama-ketiga hasil perhitungan tidak akan optimal. Perhitungan untuk mendapatkan hasil yang optimal memerlukan setidaknya history transaksi minimal sebanyak 3 bulan. Sistem akan memproses dan menghasilkan nilai yang optimal untuk jenis mainan dengan permintaan tertinggi pada bulan kemarin.)</i></p></br>
			</div>

			<div class="col-md-12" style="border:1px solid black">
				<div class="col-md-12" style="border-bottom:1px solid black; text-align:center">
					<div class="col-md-6" style="border-right:1px solid black">
						<p class="mbottom10"><b>Analisa</b></p>
					</div>
					<div class="col-md-6">
						<p class="mbottom10"><b>Hasil</b></p>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6" style="border-right:1px solid black">
						<p class="pull-left mbottom10">Jenis mainan dengan permintaan terbanyak bulan kemarin</p>
					</div>
					<div class="col-md-6">
						{!! $page_datas->jenis!!}</br>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6" style="border-right:1px solid black">
						<p class="pull-left mbottom10">Total permintaan mainan {!! $page_datas->jenis!!} bulan ini</p>
					</div>
					<div class="col-md-6">
						{!! $page_datas->dataMintaAkhir!!}</br>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6" style="border-right:1px solid black">
						<p class="pull-left mbottom10">Jumlah optimal mainan {!! $page_datas->jenis!!} yang dapat disediakan perhari dalam bulan ini</p></br>
					</div>
					<div class="col-md-6">
						{!! $page_datas->sedia!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				</br><p><i>NB : Hasil ini merupakan rekomendasi jumlah mainan {!! $page_datas->jenis!!} yang harus disiapkan perharinya dalam 1 bulan (bulan ini). Hasil yang ditampilkan berupa rata-rata sehingga dapat menghasilkan koma untuk mengetahui hasil detail perhitungannya.</i></p></br>
			</div>

			<p style="text-align:center;" onclick="document.getElementById('demo').style.display='block'"><a href="#">advance</a></p>

			<div class="col-md-12" id="demo" style="display:none">
				<div class="col-md-12" style="border:1px solid black">
					<div class="col-md-12" style="text-align:center; border-bottom:1px solid black">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="mbottom10"><b>Analisa</b></p>
						</div>
						<div class="col-md-6">
							<p class="mbottom10"><b>Hasil</b></p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Jenis mainan dengan permintaan terbanyak bulan kemarin</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->jenis!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Permintaan maksimum dari awal hingga sekarang</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->mintaMax!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Permintaan minimum dari awal hingga sekarang</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->mintaMin!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Sisa stok terbanyak dalam 1 bulan</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->stokMax!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Sisa stok terkecil dalam 1 bulan</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->stokMin!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Jumlah stok terbanyak dalam 1 bulan</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->beliMax!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Jumlah stok terkecil dalam 1 bulan</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->beliMin!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Total permintaan mainan {!! $page_datas->jenis!!} bulan ini</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->dataMintaAkhir!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Sisa stok bulan kemarin</p>
						</div>
						<div class="col-md-6">
							{!! $page_datas->dataStokAkhir!!}</br>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6" style="border-right:1px solid black">
							<p class="pull-left mbottom10">Jumlah optimal mainan {!! $page_datas->jenis!!} yang dapat disediakan perhari dalam bulan ini</p></br>
						</div>
						<div class="col-md-6">
							{!! $page_datas->sedia!!}
						</div>
					</div>
				</div>
			</div>
		<div style="clear:both"></div>
	</div>
    @stop
