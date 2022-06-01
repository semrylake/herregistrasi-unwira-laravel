@extends('templates.index')
@section('content')

<main class="main-content pt-7 mb-5">
    <div class="container">
        <a href="/pengumuman" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i> Kembali</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Billing Information</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Pengumuman</h6>
                                    <span class="mb-2 text-xs">Nomor: <span
                                            class="text-dark font-weight-bold ms-sm-2">{{$pengumuman->no}}</span></span>
                                    <span class="mb-2 text-xs">Dari: <span
                                            class="text-dark font-weight-bold ms-sm-2">{{$pengumuman->from}}</span></span>
                                    <span class="mb-2 text-xs">Ditujukan kepada: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{$pengumuman->to}}</span></span>
                                    <span class="text-xs">Isi:
                                        <span class="text-dark ms-sm-2 font-weight-bold">{{$pengumuman->subject}}</span>
                                    </span>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Preview</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="ratio ratio-16x9">
                            <iframe width="100%" height="700" type="application/pdf" allowfullscreen
                                src="{{ asset('/storage/'.$pengumuman->file_location) }}#toolbar=0"
                                frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
