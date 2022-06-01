<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <img src="{{ asset('assets/logounwira/logo_unwira_2-removebg-preview.png') }}" width="45" alt="">
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="/dashboard">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Pembayaran</li>
                {{-- Pembayaran --}}
                <li class="mt-0">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Herregistrasi
                        {{-- <i class="metismenu-state-icon fas fa-angle-right caret-left"></i> --}}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/herregistrasi-mahasiswa">
                                <i class="metismenu-icon"></i>
                                Baru Masuk
                            </a>
                        </li>
                        <li>
                            <a href="/herregistrasi-sudah-diinput">
                                <i class="metismenu-icon"></i>
                                Sudah Dilihat
                            </a>
                        </li>

                    </ul>
                </li>



            </ul>
        </div>
    </div>
</div>
