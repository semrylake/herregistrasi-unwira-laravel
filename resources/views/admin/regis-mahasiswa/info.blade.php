@extends('templates.dashboard_admin')
@section('content')


<a href="/herregis-mahasiswa-new" class="btn btn-info shadow mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Data Pengirim</h5>
                <ul class="list-group list-group-flush">
                    <p class="list-group-item">Nama : {{ $dataregis->nama }}</p>
                    <p class="list-group-item">NIM : {{ $dataregis->nim }}</p>
                    <p class="list-group-item">Email : {{ $dataregis->email }}</p>
                    <p class="list-group-item">Tanggal Regis : {{ $dataregis->tgl_regis }}</p>
                    <p class="list-group-item">Program Studi : {{ $dataregis->programStudi->name }}</p>
                    <p class="list-group-item">Semester : {{ $dataregis->semester }}</p>
                    <p class="list-group-item">Bank : {{ $dataregis->bank }}</p>
                    <p class="list-group-item">Keterangan : {{ $dataregis->keterangan }}</p>
                    <p class="list-group-item">No. WA : {{ $dataregis->wa }}</p>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            {{-- <div class="card-body">
                <object width="100%" height="440" data="{{ asset('/storage/'.$dataregis->bukti_regis) }}"
                    type="application/pdf"></object>
            </div> --}}
            <div class="ratio ratio-16x9">
                <iframe width="100%" height="480" type="application/pdf" allowfullscreen
                    src="{{ asset('/storage/'.$dataregis->bukti_regis) }}" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection
