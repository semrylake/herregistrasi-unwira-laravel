@extends('templates.dashboard_admin')
@section('content')

<div class="col-md-12">

    <a href="/tambah-admin" class="btn btn-primary mb-2 ">
        <i class="fas fa-plus"></i> Admin Baru
    </a>
    @if (session('del_msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session('del_msg') }}
    </div>
    @endif
    <div class="main-card mb-3 card p-1">
        <div class="card-header ml-2">Data Admin</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover" width="100%"
                    id="tabel_admin">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admin as $a)
                        <tr>
                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img width="40" height="40" class="rounded-circle"
                                                    src="{{ asset('storage/'.$a->foto) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $a->name }}</div>
                                            <div class="widget-subheading opacity-7">{{ $a->nip }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $a->level }}</td>
                            <td class="text-center">{{ $a->jk }}</td>

                            <td class="text-center">
                                <a href="/edit-admin/{{ $a->nip }}" title="Edit" class="btn btn-success btn-sm m-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="/delete-admin/{{ $a->nip }}" method="post" class="d-inline">
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
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
