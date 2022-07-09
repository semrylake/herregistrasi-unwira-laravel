@extends('templates.index')
@section('content')

<main class="main-content pt-7 mb-5">
    <div class="container">
        <div class="row">
            @forelse ($pengumuman as $a)
            <a href="/info-pengumuman/{{ $a->id }}" style="text-decoration: none" class="nav-link text-dark">
                <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
                    <div class="card border mb-2 shadow">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="mb-1">
                                            <span class="font-weight-bolder">
                                                @php
                                                $date = '';
                                                $date = Str::substr($a->created_at, 0, 10);
                                                $time = Str::substr($a->created_at, 11, 19);
                                                $dates = explode("-", $date);
                                                $date = $dates[2].'-'.$dates[1].'-'.$dates[0];

                                                @endphp

                                                {{ $date }} {{ $time }}
                                            </span>

                                        </p>
                                        <p class="mb-1">
                                            <span class="font-weight-bolder">Dari:
                                            </span>
                                            {{ $a->from }}
                                        </p>
                                        <p class="mb-1">
                                            <span class="font-weight-bolder">Ditujukan kepada:
                                            </span>
                                            {{ $a->to }}
                                        </p>
                                        <p class="mb-1">
                                            <span class="font-weight-bolder">Subject/isi:
                                            </span>
                                            {{ $a->subject }}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-primary text-center rounded-circle">
                                        <i class="fas fa-eye opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <h2 class="mt-5 text-center">Tidak ada pengumuman terbaru</h5>
                @endforelse
        </div>



        {{-- <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Pengumuman</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Subject</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Dari</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ditujukan Kepada</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengumuman as $a)
                            <tr>

                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-sm">{{ $a->subject }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $a->created_at }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <h6 class="mb-0 text-sm">{{ $a->from }}</h6>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <h6 class="mb-0 text-sm">{{ $a->to }}</h6>
                                </td>

                                <td class="align-middle">
                                    <a href="/info-pengumuman/{{ $a->id }}"
                                        class="badge badge-sm bg-gradient-success">Lihat</a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak Ada Pengumuman Terbaru</td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

    </div>
</main>


@endsection
