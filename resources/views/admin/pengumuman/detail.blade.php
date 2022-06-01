@extends('templates.dashboard_admin')
@section('content')


<a href="/announcement" class="btn btn-info shadow mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Detail Pengumuman</h5>
                <ul class="list-group list-group-flush">
                    <p class="list-group-item">No : {{ $pengumuman->no }}</p>
                    <p class="list-group-item">Dari : {{ $pengumuman->from }}</p>
                    <p class="list-group-item">Ditujukan Kepada : {{ $pengumuman->to }}</p>
                    <p class="list-group-item">Subject / Isi : {{ $pengumuman->subject }}</p>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            {{-- <div class="card-body">
                <object width="100%" height="440" data="{{ asset('/storage/'.$pengumuman->bukti_regis) }}"
                    type="application/pdf"></object>
            </div> --}}
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="480" type="application/pdf" allowfullscreen
                    src="{{ asset('/storage/'.$pengumuman->file_location) }}" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection
