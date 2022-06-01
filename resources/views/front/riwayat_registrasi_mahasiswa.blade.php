@extends('templates.index')
@section('content')
<main class="main-content pt-7 mb-5">
    <div class="container">
        <a href="/loket-baak" class="btn btn-outline-primary btn-sm mb-1"><i class="fas fa-arrow-left me-2"></i>
            Kembali</a>

        @if (session('psn'))
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="card border bg-success shadow">
                    <div class="card-header bg-success text-white pb-0">
                        <i class="fas fa-check"></i> Success
                    </div>
                    <div class="card-body pt-0">
                        <span class="text-white">
                            {{ session('psn') }} Apakah Anda ingin melihat riwayat registrasi terakhir anda?
                        </span>
                        <a href="/riwayat-registrasi-mahasiswa" class="stretched-link text-decoration-underline">
                            Klik disini</a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card border shadow">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 fw-bold fs-5">Riwayat Registrasi Mahasiswa</p>
                        </div>
                        <p>Masukan No.Regis/NIM & Enter Untuk Mencari.</p>
                    </div>
                    <hr class="mt-0">
                    <div class="card-body pt-0">
                        <form class="form-horizontal mb-0" action="/riwayat-registrasi-mahasiswa">
                            <div class="position-relative form-group">
                                <label for="sr" class="sr-only">NO.REGIS/NIM</label>
                                <input type="text" value="{{request('sr')}}" name="sr"
                                    placeholder="MASUKAN NO.REGIS/NIM & ENTER" class="mr-2 form-control">
                            </div>
                        </form>
                        <hr class="mt-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Regis</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keterangan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($regis)
                                    @forelse ($regis as $a)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $a->nama }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $a->nim }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $a->tgl_regis }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $a->keterangan
                                                }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($a->status == 1)
                                            <span class="badge badge-sm bg-gradient-success">Sudah Dibaca</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">Belum Dibaca</span>
                                            @endif
                                        </td>
                                        {{-- <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td> --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="4">Data tidak ditemukan.</td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="4">Data tidak ditemukan.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
