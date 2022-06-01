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
        <h6 class="m-0 font-weight-bold">Loket {{ $loket->no_loket }}</h6>
    </div>
    <div class="card-body">
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-3">
                    <div class="widget-content-left">
                        <img width="100" height="100" class="rounded-circle"
                            src="{{ asset('storage/'.$loket->user->foto) }}" alt="">
                    </div>
                </div>
                <div class="widget-content-left flex2">
                    <div class="widget-heading">Petugas : {{ $loket->user->name }}</div>
                    <div class="widget-heading opacity-7">NIP : {{ $loket->user->nip }}</div>
                    <div class="widget-heading opacity-7">Telepon : {{ $loket->tlpn }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header border-top py-3">
        <h6 class="m-0 font-weight-bold">Melayani Program Studi</h6>
    </div>
    <div class="row m-2">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <form class="form-horizontal" action="/storeProdiLayanan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="no_loket" id="no_loket" value="{{ $loket->no_loket }}">
                        <input type="hidden" name="nip" id="nip" value="{{ $loket->user->nip }}">
                        <div class="form-group">
                            <label for="prodi_id">Program Studi</label>
                            <div class="form-label-group">
                                <select autofocus class=" form-control @error('prodi_id') is-invalid @enderror" required
                                    name="prodi_id" id="prodi_id">
                                    <option>---</option>
                                    @forelse ($prodi as $a)
                                    <option id="prodi_id" value="{{$a->id}}" {{ old('prodi_id')==$a->kode_prodi
                                        ?
                                        'selected' :
                                        null}}
                                        class="form-control">
                                        {{$a->name}}</option>
                                    @empty
                                    <option>Belum ada data</option>
                                    @endforelse
                                </select>
                                <div class="invalid-feedback text-danger">
                                    @error('prodi_id')
                                    {{ $message }}
                                    @enderror
                                </div>
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
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">Daftar Program Studi</div>
                <div class="table-responsive p-3">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">No</th> --}}
                                <th class="text-center">Program Studi</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prodiLayanan as $a)
                            <tr>
                                {{-- <td class="text-center text-muted">{{ $loop->iteration }}</td> --}}
                                <td class="text-center text-muted">{{ $a->prodi->name }}</td>
                                <td class="text-center text-muted">
                                    <form action="/delete-prodiLayanan/{{ $a->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" title="Hapus" class="btn btn-danger btn-sm m-1"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini??');"><i
                                                class=" fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="3">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
