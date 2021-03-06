@extends('frontend.layout.layout')
@section('content')
<div class="container pleft-0 pbottom-0">
	<div class="desktop col-md-12 pright-0 pleft-0">
		<div class="col-md-3 paddingTop35">
			<ul class="paddingTop15 list-unstyled pul">
				@foreach ($page_datas->datas as $kategori)
					<h6 class="pul mbottom-xs"><b>{{ ucFirst($kategori['_id']) }}</b></h6>
					@foreach ($kategori['content'] as $sub_kategori)
						<li class="pil black mbottom-xs">
							<a onclick="showFaq(this)" href="javascript:void(0);" data-target="{{ str_replace(' ', '_', $kategori['_id']) . '_' . str_replace(' ', '_', $sub_kategori['sub_kategori']) }}">
								<h6>{{ ucFirst($sub_kategori['sub_kategori']) }}</h6>
							</a>
						</li>
					@endforeach
				@endforeach
			</ul>			
		</div>
		<div class="col-md-9 paddingBottom100 paddingLeft30 paddingRight30 borderLeft1" style="padding-bottom: 60vh">
			<div class="desktop row mbottom-s paddingTop50">
				<div class="col-md-12">
					<h1>Tentang Kami</h1>
					<hr class="garis-bawah-ungu pull-left mtop-0" width="50">
				</div>
			</div>
<!-- 			<div class="row mbottom-m paddingLeft20">
				<div class="col-md-12 paddingLeft20">
	                <form method="GET" action="#" accept-charset="UTF-8" class="p-y-0">
	                    <div class="input-group">
	                        <input type="text" name="search" value="" class="form-control" placeholder="Cari Informasi Tentang Kami">
	                        <span class="input-group-btn">
	                            <button class="btn bgabu black paddingLeft30 paddingRight30" type="submit">Cari</button>
	                        </span>
	                    </div>
	                </form>

				</div>
			</div>	 -->
			<div class="content-faq">
			@foreach ($page_datas->datas as $kategori)
				@foreach ($kategori['content'] as $sub_kategori)
					<div id="{{ str_replace(' ', '_', $kategori['_id']) . '_' . str_replace(' ', '_', $sub_kategori['sub_kategori']) }}" class="row mbottom-s paddingLeft20 faq" style="display:none;">
						<div class="col-md-12 marginBottom20">
							<h2>{{ ucFirst($sub_kategori['sub_kategori']) }}</h2>
						</div>
						@foreach ($sub_kategori['faq'] as $content)
							<div class="col-md-12 col-sm-12 marginBottom20">
								<p class="blue"><strong>{{ $content['pertanyaan'] }}</strong></p>
								<p>{{ $content['jawaban'] }}</p>
							</div>
						@endforeach		
					</div>	
				@endforeach		
			@endforeach		
			</div>
		</div>
	</div>
	<div class="mobile col-sm-12 paddingBottom50 paddingRight30 paddingLeft30">	
		<div class="row mbottom-s paddingTop50">
			<div class="col-sm-12 text-center">
				<h1><b>About Us</b></h1>
				<hr class="garis-bawah-ungu ptop-0" width="70">
			</div>
		</div>
		<div class="row mbottom-s">
			<div class="col-sm-12">
				<h5>Kategori</h5>
			</div>
			<div class="col-sm-12">
				<select class="butFoot width100Per dropdown-toggle" type="text"><option value="Profil">Profil</option></select>
			</div>
		</div>
		<div class="row mbottom-s">
			<div class="col-sm-12">
				<h5>Cari dikategori ini</h5>
			</div>
			<div class="col-sm-12">
				<form class="form-inline">
					<input class="form-control width80Per pull-left" type="text" placeholder="Apa yang ingin Anda Cari?"></input><button type="submit" class="bgabu butFoot width20Per">Cari</button>
				</form>
			</div>
		</div>
		<hr class="width100Per">
		@include('frontend.widget.text', ['datas' => [
		'0' => ['header' => "Apa itu Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
		'1' => ['header' => "Mengapa Harus Kidzo ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
		'2' => ['header' => "Apakah Kidzo Terpercaya ?", 'content' => 'webfuybwudfguyg ehbfuywebfubewu hfbewufbueawbuf euwhfbuewbfuewb jfsajfibaisbfi isbfiasbifbai bsiafbiasbfiubaiufb uasbfiubasifubaiub'],
		]])
	</div>
</div>
@stop

@section('scripts')
	function showFaq(e) {
	    var target = $(e).data('target');
	    console.log(target);
	    $('.faq').hide();
		$('#' + target).show();
	}
    
@stop