<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('assets/logounwira/logo_unwira_2-removebg-preview.png') }}">

    <title>{{ $judul }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('assets/archi/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{!! asset('assets/dataTable/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') !!} "
        rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('components.navbar.navbar_pegawai_baak')
        @include('components.other.dashboard_admin_app_settings')

        <div class="app-main">
            @include('components.sidebar.sidebar_dashboard_pegawai_baak')

            <div class="app-main__outer">
                <div class="app-main" style="margin-top: -45px">
                    <div class="app-main__inner">

                        <div class="">
                            @yield('content')
                        </div>

                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>

    @include('components.modals.modal_edit_profile')


    <script>
        function previewImage(params) {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        imgPreview.style.height = '150px';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
        }
    </script>
    <script src="{!! asset('assets/dataTable/libs/jquery/dist/jquery.min.js') !!}"></script>

    <script src="{{ asset('assets/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/archi/scripts/main.js') }}"></script>

    <script src="{!! asset('assets/dataTable/extra-libs/DataTables/datatables.min.js') !!}">
    </script>

    @if (session('user_data_update'))
    <script>
        swal({
            title: "Profil Anda Berhasil Diubah!!",
            // text: "Silahkan Login Kembali.",
            icon: "success",
            button: "Close!",
        });
    </script>
    @endif
    <script>
        $('#tabel_regis_dilihat').DataTable();
        $('#tabel_herregis').DataTable();
    </script>

</body>

</html>
