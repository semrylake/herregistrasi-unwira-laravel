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
        <h6 class="m-0 font-weight-bold">Form Edit Admin</h6>
    </div>
    <form class="form-horizontal" action="/updateAdmin/{{ $admin->nip }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="control-label col-form-label">Nama Lengkap</label>
                <input autofocus type="text" name="name" value="{{ old('name', $admin->name) }}"
                    class="form-control @error('name') is-invalid @enderror" id="name">
                <div class="invalid-feedback text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="nip" class="control-label col-form-label">NIP</label>
                <input autofocus type="text" name="nip" value="{{ old('nip', $admin->nip) }}"
                    class="form-control @error('nip') is-invalid @enderror" id="nip">
                <div class="invalid-feedback text-danger">
                    @error('nip')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label></label>
                <div class="form-label-group">
                    <select class=" form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
                        <option></option>

                        @if (old('jk', $admin->jk) == 'Laki-laki')
                        <option id="jk" value="{{$admin->jk}}" selected class="form-control">
                            Laki-laki
                        </option>
                        <option id="jk" value="Perempuan" class="form-control">
                            Perempuan
                        </option>
                        @endif
                        @if (old('jk', $admin->jk) == 'Perempuan')
                        <option id="jk" value="{{$admin->jk}}" selected class="form-control">
                            Perempuan
                        </option>
                        <option id="jk" value="Laki-laki" class="form-control">
                            Laki-laki
                        </option>
                        @endif

                    </select>
                    <div class="invalid-feedback text-danger">
                        @error('jk')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-form-label">Password</label>
                <input autofocus type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off">
                <div class="invalid-feedback text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="control-label col-form-label">Foto</label>
                @if ($admin->foto)
                <img class="img-preview mb-2 img-fluid col-sm-2" style="display: block; height: 100px;"
                    src="{{ asset('storage/'.$admin->foto) }}">
                @else
                <img class="img-preview mb-2 img-fluid col-sm-2">

                @endif
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
