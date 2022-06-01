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
                <li class="app-sidebar__heading">Kampus</li>
                {{-- Pegawai --}}
                <li class="mt-0">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Pegawai
                        {{-- <i class="metismenu-state-icon fas fa-angle-right caret-left"></i> --}}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/admin">
                                <i class="metismenu-icon"></i>
                                Admin
                            </a>
                        </li>
                        <li>
                            <a href="/pegawai-loket">
                                <i class="metismenu-icon"></i>
                                Pegawai Loket BAAK
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Fakultas dan Prodi --}}
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-study"></i>
                        Fakultas & Prodi
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/fakultas">
                                <i class="metismenu-icon"></i>
                                Fakultas
                            </a>
                        </li>
                        <li>
                            <a href="/prodi">
                                <i class="metismenu-icon"></i>
                                Program Studi
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Loket --}}
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-box1"></i>
                        Loket
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/loket">
                                <i class="metismenu-icon"></i>
                                Loket BAAK
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Loket --}}
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Herregistrasi Mahasiswa
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/herregis-mahasiswa-new">
                                <i class="metismenu-icon"></i>
                                Baru Masuk
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Loket --}}
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Pengumuman
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/announcement">
                                <i class="metismenu-icon"></i>
                                Untuk Mahasiswa
                            </a>
                        </li>
                    </ul>
                </li>




            </ul>
        </div>
    </div>
</div>
