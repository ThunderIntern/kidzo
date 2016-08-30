@if(is_null(Session::get('email')))
<script type="text/javascript ">
   	window.location.href = '{{route("home")}}';
</script>
@else
@extends('frontend.layout.layout')
@section('content')
    <div class="container berlangganan modal-dialog text-center paddingTop40 paddingBottom10">
        <div class="col-md-12 col-sm-12 font-registered">
            Anda Telah Berhasil Berlangganan Newsletter<br>Terima Kasih Sudah Mendaftar Newsletter Kidzo<br>
            <a href="{{Route('flushregister')}}"><button class="btn btn-success">OK</button></a>
        </div>
    </div>
@stop
@endif