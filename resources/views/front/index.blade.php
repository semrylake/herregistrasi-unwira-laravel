@extends('templates.index')
@section('content')

<main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-95 pt-5 m-3 border-radius-lg " style="background-image: url({{ asset('assets/logounwira/mahasiswa.jpeg') }});
        background-size:contain; background-position:center; background-repeat:no-repeat;">
        <span class="mask bg-gradient-secondary opacity-4"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-8 text-center mx-auto">
                    <h1 class=" mb-3 mt-9">BAAK ONLINE</h1>
                    <p class="text-lead fs-4 fw-bold text-white" style="margin-bottom: 0">
                        Biro yang menangani segala sesuatu yang berkaitan dengan
                        penyelenggaraan kegiatan belajar mengajar dan administrasi akademik bagi seluruh mahasiswa</p>
                    <p class="text-lead fs-2 fw-bold text-white" style="margin-top: 0">Universitas Katolik Widya Mandira
                    </p>
                    <a href="/loket-baak" style="cursor: grabbing"
                        class="btn btn-lg text-uppercase p-3 mt-3 btn-success">GET STARTED</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
