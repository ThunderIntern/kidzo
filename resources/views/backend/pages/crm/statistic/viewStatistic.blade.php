	@extends('backend.pages.crm.layout')
	@section('page_content')
	<div class="card">
		<div class="card-block">
			<div class="col-md-12">
				<h1 class="text-center mtop-s">Data Statistik (dalam bulan)</h1></br></br>
				<div class="col-md-6">
					<p class="pull-left mbottom10"><b>Permintaan terbanyak</b></p>
			        {!! Form::text('text', $page_datas->mintaMax, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
			        <p class="pull-left mbottom10"><b>Permintaan terkecil</b></p>
			        {!! Form::text('text', $page_datas->mintaMin, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
			        <p class="pull-left mbottom10"><b>Sisa persediaan terbanyak</b></p>
					{!! Form::text('text', $page_datas->stokMax, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
					<p class="pull-left mbottom10"><b>Sisa persediaan terkecil</b></p>
					{!! Form::text('text', $page_datas->stokMin, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
				</div>
				<div class="col-md-6">
					<p class="pull-left mbottom10"><b>Jumlah persediaan terbanyak</b></p>
					{!! Form::text('text', $page_datas->beliMax, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
					<p class="pull-left mbottom10"><b>Jumlah persediaan terkecil</b></p>
					{!! Form::text('text', $page_datas->beliMin, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
					<p class="pull-left mbottom10"><b>Permintaan bulan saat ini</b></p>
					{!! Form::text('text', $page_datas->dataMintaAkhir, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
					<p class="pull-left mbottom10"><b>Sisa persediaan saat ini</b></p>
					{!! Form::text('text', $page_datas->dataStokAkhir, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<p class="pull-left mbottom10"><b>Jumlah optimal mainan yang dapat disediakan</b></p>
					{!! Form::text('text', $page_datas->sedia, ['class' => 'form-control mbottom10', 'readonly'=> 'read']) !!}
				</div>
			</div>
			<div style="clear:both"></div>
	    </div>
	</div>
    @stop
