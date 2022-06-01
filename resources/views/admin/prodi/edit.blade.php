@extends('templates.dashboard_admin')
@section('content')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/prodi" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Edit Program Studi</h6>
    </div>
    <form class="form-horizontal" action="/updateProdi/{{ $prodi->kode_prodi }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">

            <div class="form-group">
                <label for="fakultas_id">Fakultas</label>
                <div class="form-label-group">
                    <select autofocus class=" form-control @error('fakultas_id') is-invalid @enderror" required
                        name="fakultas_id" id="fakultas_id">
                        {{-- <option value="{{ $kas->kode_cabang }}">{{ $kas->cabang->nama_cabang }}</option>
                        --}}

                        @forelse ($fakultas as $a)
                        @if (old('fakultas_id', $a->id) == $prodi->fakultas_id)
                        <option id="fakultas_id" value="{{$a->id}}" selected class="form-control">{{$a->nama}}
                        </option>
                        @else
                        <option id="fakultas_id" value="{{$a->id}}" class="form-control">{{$a->nama}}</option>
                        @endif
                        @empty
                        <option>Belum ada data</option>
                        @endforelse

                    </select>
                    <div class="invalid-feedback text-danger">
                        @error('fakultas_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="kode_prodi" class="control-label col-form-label">Kode Program Studi<sup
                        class="text-danger">*</sup></label>
                <input type="text" name="kode_prodi" value="{{ old('kode_prodi', $prodi->kode_prodi) }}"
                    class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi" required>
                <div class="invalid-feedback text-danger">
                    @error('kode_prodi')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-form-label">Nama Program Studi<sup
                        class="text-danger">*</sup></label>
                <input type="text" name="name" value="{{ old('name', $prodi->name) }}"
                    class="form-control @error('name') is-invalid @enderror" id="name" required>
                <div class="invalid-feedback text-danger">
                    @error('name')
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
