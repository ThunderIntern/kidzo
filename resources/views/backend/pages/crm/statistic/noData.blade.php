@extends('backend.pages.crm.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
		<div class="col-md-12">
			<h1 class="text-center mtop-s">Data Statistik</h1>
			<p><i>(Sistem ini menghitung berdasarkan data setiap bulan dalam 1 tahun, sehingga pada bulan pertama-ketiga hasil perhitungan tidak akan optimal. Perhitungan untuk mendapatkan hasil yang optimal memerlukan setidaknya history transaksi minimal sebanyak 3 bulan. Sistem akan memproses dan menghasilkan nilai yang optimal untuk jenis mainan dengan permintaan tertinggi pada bulan kemarin.)</i></p></br>
		</div>
		<div class="col-md-12">
		
			@if($page_datas->divZero == 0)
				<h3 style="text-align:center">Tidak ada data di dalam database</h3>
			@endif
			@if($page_datas->divZero == 1)
				<h5 style="text-align:center">Terdapat pembagian dengan nol karena kurang banyaknya variasi data, coba lagi pada bulan berikutnya</h5>
			@endif
		</br></br></br></br>
		</div>
	</div>
	<div style="clear:both"></div>
</div>
@stop