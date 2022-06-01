@extends('templates.index')
@section('content')

<main class="main-content pt-7 mb-5">
    <div class="container">
        <a href="/loket-baak" class="btn btn-outline-primary btn-sm mb-1"><i class="fas fa-arrow-left me-2"></i>
            Kembali</a>
        <a href="/riwayat-registrasi-mahasiswa" class="btn btn-outline-dark btn-sm mb-1"><i
                class="fas fa-search me-2"></i>
            Riwayat Registrasi</a>

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
                            <p class="mb-0 fw-bold fs-5">Formulir Registrasi Akademik Mahasiswa</p>
                        </div>
                        <span>Pastikan data yang dimasukan sudah sesuai agar tidak terjadi kesalahan
                            perekapan data oleh petugas BAAK.</span>
                    </div>
                    <hr>
                    <form class="form-horizontal" action="/storeFormRegistrasi" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label text-uppercase">Nama Lengkap<sup
                                                class="text-danger">*</sup></label>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama" required>
                                        <div class="invalid-feedback text-danger">
                                            @error('nama')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label text-uppercase">Email<sup
                                                class="text-danger">*</sup></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            required>
                                        <div class="invalid-feedback text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim" class="form-control-label text-uppercase">No. Regis/NIM<sup
                                                class="text-danger">*</sup></label>
                                        <input type="text" name="nim" value="{{ old('nim') }}"
                                            class="form-control @error('nim') is-invalid @enderror" id="nim" required>
                                        <div class="invalid-feedback text-danger">
                                            @error('nim')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_regis" class="form-control-label text-uppercase">Tanggal
                                            Registrasi<sup class="text-danger">*</sup></label>
                                        <input type="text" name="tgl_regis" value="{{ old('tgl_regis') }}"
                                            class="form-control @error('tgl_regis') is-invalid @enderror" id="tgl_regis"
                                            required autocomplete="off" placeholder="Contoh: 01/12/2022">
                                        <div class="invalid-feedback text-danger">
                                            @error('tgl_regis')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <div class="form-group">
                                            <label for="prodi">PROGRAM STUDI<sup class="text-danger">*</sup></label>
                                            <div class="form-label-group">
                                                <select autofocus
                                                    class=" form-control @error('prodi') is-invalid @enderror" required
                                                    name="prodi" id="prodi">
                                                    <option>---</option>
                                                    @forelse ($prodi as $a)
                                                    <option id="prodi" value="{{$a->prodi->id}}" {{ old('prodi')==$a->id
                                                        ? 'selected' : null}} class="form-control text-uppercase">
                                                        {{$a->prodi->name}}
                                                    </option>
                                                    @empty
                                                    <option>Belum ada data</option>
                                                    @endforelse
                                                </select>
                                                <div class="invalid-feedback text-danger">
                                                    @error('prodi')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <div class="form-group">
                                            <label for="semester">SEMESTER<sup class="text-danger">*</sup></label>
                                            <div class="form-label-group">
                                                <select autofocus
                                                    class=" form-control @error('semester') is-invalid @enderror"
                                                    required name="semester" id="semester">
                                                    <option>---</option>

                                                    @for ($i=0; $i<14; $i++)<option id="semester" value="{{$i+1}}"
                                                        class="form-control" {{ old('semester')==$i+1 ? 'selected' :
                                                        null}}>
                                                        {{$i+1}}
                                                        </option>
                                                        @endfor

                                                </select>
                                                <div class="invalid-feedback text-danger">
                                                    @error('semester')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <div class="form-group">
                                            <label for="bank">BANK<sup class="text-danger">*</sup></label>
                                            <div class="form-label-group">
                                                <select autofocus
                                                    class=" form-control @error('bank') is-invalid @enderror" required
                                                    name="bank" id="bank">
                                                    <option>---</option>

                                                    <option id="bank" value="MANDIRI" class="form-control" {{
                                                        old('bank')=='MANDIRI' ? 'selected' : null}}>
                                                        MANDIRI
                                                    </option>
                                                    <option id="bank" value="BNI" class="form-control" {{
                                                        old('bank')=='BNI' ? 'selected' : null}}>
                                                        BNI
                                                    </option>
                                                    <option id="bank" value="BUKOPIN" class="form-control" {{
                                                        old('bank')=='BUKOPIN' ? 'selected' : null}}>
                                                        BUKOPIN
                                                    </option>
                                                    <option id="bank" value="BRI" class="form-control" {{
                                                        old('bank')=='BRI' ? 'selected' : null}}>
                                                        BRI
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback text-danger">
                                                    @error('bank')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label text-uppercase">KETERANGAN<sup
                                                class="text-danger">*</sup></label><br>
                                        {{-- <small class="form-text text-muted">Masukan jenis registrasi. Contoh:
                                            Uang
                                            SPP,
                                            SKS, Wisuda, dll.</small> --}}
                                        <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            id="keterangan" required
                                            placeholder="Jenis registrasi. Contoh: Uang SPP, SKS, Wisuda, dll.">
                                        <input type="hidden" id="loket_id" name="loket_id" value="{{ $loket->id }}">
                                        <div class="invalid-feedback text-danger">
                                            @error('keterangan')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wa" class="form-control-label">NO. WA<sup
                                                class="text-danger">*</sup></label>
                                        <input type="text" name="wa" value="{{ old('wa') }}"
                                            class="form-control @error('wa') is-invalid @enderror" id="wa" required>
                                        <div class="invalid-feedback text-danger">
                                            @error('wa')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bukti_regis" class="form-control-label text-uppercase">UPLOAD
                                            BUKTI
                                            REGIS<sup class="text-danger">*</sup></label>
                                        <input type="file"
                                            class=" form-control @error('bukti_regis') is-invalid @enderror"
                                            id="bukti_regis" name="bukti_regis" value="{{ old('bukti_regis') }}">
                                        <small class="form-text text-muted">File yang diupload hanya type pdf. Jika
                                            jumlah slip pembayaran lebih dari 1 maka digabung dalam 1 file format
                                            pdf.</small>
                                        <div class="invalid-feedback text-danger">
                                            @error('bukti_regis')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" id="sendreg" class="btn btn-outline-success">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
