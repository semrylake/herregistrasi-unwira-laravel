@extends('templates.dashboard_admin')
@section('content')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/announcement" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow mb-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Tambah Pengumuman</h6>
    </div>
    <form class="form-horizontal" action="/storePengumuman" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="no" class="control-label col-form-label">Nomor<sup class="text-danger">*</sup></label>
                <input autofocus type="text" name="no" value="{{ old('no') }}"
                    class="form-control @error('no') is-invalid @enderror" id="no" required>
                <input readonly type="hidden" name="slug" value="{{ old('slug') }}"
                    class="form-control @error('slug') is-invalid @enderror" id="slug" autocomplete="off" required>
                <div class="invalid-feedback text-danger">
                    @error('no')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="from" class="control-label col-form-label">Dari<sup class="text-danger">*</sup></label>
                <input autofocus type="text" name="from" value="{{ old('from') }}"
                    class="form-control @error('from') is-invalid @enderror" id="from" required>
                <div class="invalid-feedback text-danger">
                    @error('from')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="to" class="control-label col-form-label">Ditujukan Kepada<sup
                        class="text-danger">*</sup></label>
                <input autofocus type="text" name="to" value="{{ old('to') }}"
                    class="form-control @error('to') is-invalid @enderror" id="to" required>
                <div class="invalid-feedback text-danger">
                    @error('to')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="subject" class="control-label col-form-label">Subject / Isi<sup
                        class="text-danger">*</sup></label>
                <input autofocus type="text" name="subject" value="{{ old('subject') }}"
                    class="form-control @error('subject') is-invalid @enderror" id="subject" required>
                <div class="invalid-feedback text-danger">
                    @error('subject')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="file_location" class="control-label col-form-label">File</label>
                <input type="file" class=" form-control p-1  @error('file_location') is-invalid @enderror"
                    id="file_location" name="file_location" value="{{ old('file_location') }}">
                <small class="form-text text-muted">File yang diupload berformat pdf.</small>
                <div class="invalid-feedback text-danger">
                    @error('file_location')
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
