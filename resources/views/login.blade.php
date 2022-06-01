@extends('templates.index')
@section('content')

<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 shadow col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        @if (session('pesan'))
                        <div
                            class="align-items-center mt-5 mb-0 text-center text-danger text-gradient text-sm font-weight-bold">
                            <h4>{{ session('pesan') }}</h4>
                        </div>

                        </p>
                        @endif
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Masukan NIP dan Password Anda Sebelum Masuk !!</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="/loginprocess">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" autofocus name="nip" class="form-control form-control-lg"
                                            placeholder="NIP" aria-label="NIP" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            placeholder="Password" aria-label="Password" required>
                                    </div>
                                    <div style="background-size: contain" class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                            in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 shadow d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative h-100 m-3 px-6 border-radius-lg d-flex flex-column justify-content-center "
                            style="background-image: url('{{ asset('assets/logounwira/images.jpeg'); }}'); background-size: contain; background-repeat: no-repeat">
                            <span class="mask opacity-6"></span>
                            <div style="height: 45%"></div>
                            <div style="height: 55%">
                                <img src="{{ asset('assets/logounwira/logo_unwira_2-removebg-preview.png') }}"
                                    class=" p-3 img-fluid rounded-start" alt="...">
                                <h4 class="font-weight-bolder position-relative">BIRO ADMINISTRASI AKADEMIK DAN
                                    KEMAHASISWAAN (BAAK)</h4>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
