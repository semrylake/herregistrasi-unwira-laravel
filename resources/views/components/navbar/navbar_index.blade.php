<!-- Navbar -->
<nav
    class="navbar navbar-expand-lg bg-primary border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder text-white ms-lg-0 ms-3 " href="/">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler shadow-none ms-2 bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center me-2 active" aria-current="page"
                        href="/loket-baak">
                        {{-- <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i> --}}
                        Loket
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 text-white" href="/pengumuman">
                        {{-- <i class="fa fa-user opacity-6 text-dark me-1"></i> --}}
                        Pengumuman
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-2 text-white" href="/auth">
                        {{-- <i class="fas fa-user-circle opacity-6 text-dark me-1"></i> --}}
                        Sign In
                    </a>
                </li>

            </ul>

            {{-- <ul class="navbar-nav d-lg-block d-none">

            </ul> --}}
        </div>
    </div>
</nav>
<!-- End Navbar -->
