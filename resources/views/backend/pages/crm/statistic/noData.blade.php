@extends('backend.pages.crm.layout')
@section('page_content')
<div class="card">
	<div class="card-block">
		<div class="col-md-12">
		</br></br></br></br>
			@if($page_datas->divZero == 0)
				<h3 style="text-align:center">Tidak ada data di dalam database</h3>
			@endif
			@if($page_datas->divZero == 1)
				<h3 style="text-align:center">Adanya pembagian dengan nol, coba lagi pada bulan berikutnya</h3>
			@endif
		</br></br></br></br>
		</div>
	</div>
	<div style="clear:both"></div>
</div>
@stop