<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ config('app.name') }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/argon/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/argon/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/datepicker/css/datepicker.css') }}">
    <link href="{{ asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('components.navbar.navbar_index')
            </div>
        </div>
    </div>

    @yield('content')

    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#tgl_regis').datepicker({
      format: 'dd/mm/yyyy',
    });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
     if (win && document.querySelector('#sidenav-scrollbar')) {
       var options = {
         damping: '0.5'
       }
       Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
     }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
    <script src="{{ asset('assets/argon/js/argon-dashboard.min.js?v=2.0.0') }}"></script>
</body>

</html>
