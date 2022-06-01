@extends('templates.dashboard_admin')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="main-card card-profile mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img style="width=100%; height:170px" src="{{ asset('/storage/'.$profile->foto) }}" alt=""
                            class="card-img-top">
                    </div>
                    <div class="col-md-8 pt-2">
                        <h5 class="card-title">{{ $profile->name }} ({{ Str::ucfirst($profile->level) }})</h5>
                        <h6 class="card-title">{{ $profile->nip }}</h6>
                        <h6 class="card-title">{{ $profile->jk }}</h6>
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#editpasswordmodal">Ubah Profil</button>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

@endsection
