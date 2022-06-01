@extends('templates.index')
@section('content')
<main class="main-content pt-7 mb-5">
    <div class="container">
        <div class="row">
            @foreach ($loket as $a)
            <div class="col-md-3 mb-3">
                <div class="card shadow card-profile">
                    <img src="{{ asset('storage/'.$a->user->foto) }}" width="100%" height="200px"
                        alt="Image placeholder" class="card-img-top">
                    <div class="card-body pt-2">

                        <div class="text-center">
                            <h5>
                                Loket {{ $a->no_loket }}
                            </h5>
                            <p class="mt-0 fw-bold" style="margin-bottom: 2px">{{ $a->user->name }}
                                @if ($a->tlpn)
                                ({{ $a->tlpn }})
                                @endif
                            </p>
                            <a href="regis-semester/{{ $a->no_loket }}" class="btn btn-success"
                                style="margin-top: 0">Mulai Regis</a>

                            <hr style="margin-top: 0">
                            <div>
                                @foreach ($prodi as $b)
                                @if ($b->loket_id == $a->id)
                                <div>
                                    <i class="ni education_hat mr-2"></i>{{ $b->prodi->name }}
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection
