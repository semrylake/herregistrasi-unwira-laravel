@extends('templates.dashboard_pegawai_baak')
@section('content')


@if (session('pesan'))
<div class="row">
    <div class="alert col-lg-12 col-xl-12 alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Login Success!</h5>
        {{ session('pesan') }} {{ Auth::user()->name }}
    </div>
</div>
@endif

<div class="row">
    {{-- <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content bg-night-fade">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Jumlah Herregistrasi Terbaru</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{ $regismahasiswa }}</span></div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content bg-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Jumlah Herregistrasi Terbaru</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span>{{ $regismahasiswa }}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
