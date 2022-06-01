@extends('templates.dashboard_admin')
@section('content')


<div class="col-md-12">
    <a href="/tambah-pengumuman" class="btn btn-primary mb-2 ">
        <i class="fas fa-plus"></i> Pengumuman Baru
    </a>
    @if (session('del_msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session('del_msg') }}
    </div>
    @endif
    <div class="main-card mb-3 card p-1">
        <div class="card-header ml-2">Pengumuman</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover" width="100%"
                    id="tabel_herregis">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">No</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Untuk</th>
                            {{-- <th class="text-center">Subject / Isi</th> --}}
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengumuman as $a)
                        <tr>
                            <td class="text-center text-muted">{{ $loop->iteration }}</td>

                            <td class="text-center">{{ $a->no }}</td>
                            <td class="text-center">{{ $a->from }}</td>
                            <td class="text-center">{{$a->to}}</td>
                            {{-- <td class="text-center">{{ $a->subject }}</td> --}}

                            <td class="text-center">
                                <a href="/lihat-pengumuman/{{ $a->id }}" title="Lihat"
                                    class="btn btn-success btn-sm m-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="/delete-pengumuman/{{ $a->id }}" method="post" class="d-inline">
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
                            <td class="text-center" colspan="7">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
