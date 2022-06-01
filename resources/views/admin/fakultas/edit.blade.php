@extends('templates.dashboard_admin')
@section('content')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/fakultas" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Edit Fakultas</h6>
    </div>
    <form class="form-horizontal" action="/updateFakultas/{{ $fakultas->kode_fakultas }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="kode_fakultas" class="control-label col-form-label">Kode Fakultas<sup
                        class="text-danger">*</sup></label>
                <input autofocus type="text" name="kode_fakultas"
                    value="{{ old('kode_fakultas', $fakultas->kode_fakultas) }}"
                    class="form-control @error('kode_fakultas') is-invalid @enderror" id="kode_fakultas" required>
                <div class="invalid-feedback text-danger">
                    @error('kode_fakultas')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="control-label col-form-label">Nama Fakultas<sup
                        class="text-danger">*</sup></label>
                <input autofocus type="text" name="nama" value="{{ old('nama', $fakultas->nama) }}"
                    class="form-control @error('nama') is-invalid @enderror" id="nama" required>
                <div class="invalid-feedback text-danger">
                    @error('nama')
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