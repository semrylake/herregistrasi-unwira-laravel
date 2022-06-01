@extends('templates.dashboard_pegawai_baak')
@section('content')


<div class="col-md-12">

    @if (session('del_msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session('del_msg') }}
    </div>
    @endif
    <div class="main-card mb-3 card p-1">
        <div class="card-header ml-2">Data Herregistrasi Mahasiswa</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover" width="100%"
                    id="tabel_herregis">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th class="text-center">Tanggal Regis</th>
                            <th class="text-center">Prodi</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @forelse ($regismahasiswa as $a)
                        <tr>
                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $a->nama }}</div>
                                            <div class="widget-subheading opacity-7">{{ $a->nim }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $a->tgl_regis }}</td>
                            <td class="text-center">{{$a->programStudi->name}}</td>
                            <td class="text-center">{{ $a->keterangan }}</td>

                            <td class="text-center">
                                <a {{ $no !=1 ? 'hidden' : null}} href="/lihat-regis/{{ $a->id }}" title="Lihat"
                                    class="btn btn-success btn-sm m-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
