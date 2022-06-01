<div class="app-header header-shadow">
    <div class="app-header__logo">
        {{-- {{ config('app.name') }} --}}
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
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
            {{-- <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                        Statistics
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-edit"></i>
                        Projects
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul> --}}
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    @if (Auth::user()->foto)
                                    <img width="42" height="42" class="rounded-circle"
                                        src="{{ asset('storage/'.Auth::user()->foto) }}" alt="">
                                    @else
                                    <img width="42" height="42" class="rounded-circle"
                                        src="{{ asset('assets/avatar/male.png') }}" alt="">
                                    @endif


                                    {{-- <i class="fa fa-user opacity-8"></i> --}}
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right">
                                    <a href="/profil-pegawai" class="dropdown-item text-muted ">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil
                                        Saya</a>
                                    <button type="button" class="dropdown-item text-muted " data-toggle="modal"
                                        data-target="#editpasswordmodal">
                                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>Ubah Profile</a>
                                    </button>
                                    {{-- <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                    <button type="button" tabindex="0" class="dropdown-item">Actions</button> --}}
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-muted "
                                            onclick="return confirm('Anda yakin ingin keluar dari halaman ini??');">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Sign Out
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="widget-subheading">
                                {{ Auth::user()->level }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
