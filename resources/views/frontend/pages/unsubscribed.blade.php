@extends('frontend.layout.layout')
@section('content')
    <div class="container berlangganan modal-dialog text-center paddingTop40 paddingBottom10">
        <div class="col-md-12 col-sm-12 font-registered">
            Anda Telah Berhenti Berlangganan<br>Terima Kasih Telah Mendaftar Newsletter Kidzo<br>
            <a href="{{Route('home')}}"><button class="btn btn-success">OK</button></a>
        </div>
    </div>
@stop