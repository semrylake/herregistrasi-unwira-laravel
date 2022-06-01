@extends('templates.dashboard_admin')
@section('content')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/admin" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 mb-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Tambah Admin</h6>
    </div>
    <form class="form-horizontal" action="/storeAdmin" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="control-label col-form-label">Nama Lengkap<sup
                        class="text-danger">*</sup></label>
                <input autofocus type="text" name="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror" id="name" required>
                <div class="invalid-feedback text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="nip" class="control-label col-form-label">NIP<sup class="text-danger">*</sup></label>
                <input autofocus type="text" name="nip" value="{{ old('nip') }}"
                    class="form-control @error('nip') is-invalid @enderror" id="nip" required>
                <div class="invalid-feedback text-danger">
                    @error('nip')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin<sup class="text-danger">*</sup></label></label>
                <div class="form-label-group">
                    <select class=" form-control @error('jk') is-invalid @enderror" required name="jk" id="jk">
                        <option></option>
                        <option id="jk" value="Laki-laki" {{ old('jk')=="Laki-laki" ? 'selected' : null}}
                            class="form-control">Laki-laki</option>
                        <option id="jk" value="Perempuan" {{ old('jk')=="Perempuan" ? 'selected' : null}}
                            class="form-control">Perempuan</option>
                    </select>
                    <div class="invalid-feedback text-danger">
                        @error('jk')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-form-label">Password<sup
                        class="text-danger">*</sup></label>
                <input autofocus type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off"
                    required>
                <div class="invalid-feedback text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="control-label col-form-label">Foto</label>
                <img class="img-preview mb-2 img-fluid col-sm-3">
                <input type="file" class=" form-control p-1  @error('foto') is-invalid @enderror" id="foto" name="foto"
                    value="{{ old('foto') }}" onchange="previewImage()">
                <small class="form-text text-muted">File yang diupload hanya type gambar(jpg,png,jpeg), dan
                    tidak boleh dari 1MB</small>
                <div class="invalid-feedback text-danger">
                    @error('foto')
                    {{ $message }}
                    @enderror
                </div>
            </div>

        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" id="savereg" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </form>
</div>


@endsection
