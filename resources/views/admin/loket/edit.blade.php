@extends('templates.dashboard_admin')
@section('content')


@if (session('psn'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('psn') }}
</div>
@endif

<a href="/loket" class="btn btn-info shadow"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card mt-3 border shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Form Edit Loket BAAK</h6>
    </div>
    <form class="form-horizontal" action="/updateLoket/{{ $loket->no_loket }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="no_loket" class="control-label col-form-label">Nomor Loket<sup
                        class="text-danger">*</sup></label>
                <input type="number" min="1" name="no_loket" value="{{ old('no_loket', $loket->no_loket) }}"
                    class="form-control @error('no_loket') is-invalid @enderror" id="no_loket" required>
                <div class="invalid-feedback text-danger">
                    @error('no_loket')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="user_id">Pegawai</label>
                <div class="form-label-group">
                    <select autofocus class=" form-control @error('user_id') is-invalid @enderror" required
                        name="user_id" id="user_id">
                        <option>---</option>
                        @forelse ($petugas as $a)
                        @if (old('user_id', $a->id) == $loket->user_id)
                        <option id="user_id" value="{{$a->nip}}" selected class="form-control">{{$a->name}}
                        </option>
                        @else
                        <option id="user_id" value="{{$a->nip}}" class="form-control">{{$a->name}}</option>
                        @endif
                        @empty
                        <option>Belum ada data</option>
                        @endforelse
                    </select>
                    <div class="invalid-feedback text-danger">
                        @error('user_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tlpn" class="control-label col-form-label">Nomor Telepon<sup
                        class="text-danger">*</sup></label>
                <input type="text" name="tlpn" value="{{ old('tlpn', $loket->tlpn) }}"
                    class="form-control @error('tlpn') is-invalid @enderror" id="tlpn">
                <div class="invalid-feedback text-danger">
                    @error('tlpn')
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
