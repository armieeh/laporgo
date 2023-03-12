<header id="header"
    class="navbar navbar-expand-lg navbar-center navbar-light bg-white navbar-absolute-top navbar-show-hide"
    data-hs-header-options='{
    "fixMoment": 0,
    "fixEffect": "slide"
  }'>
    <div class="container-lg">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Logo -->

            <a class="navbar-brand" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="assets/img/laporgo.png" alt="Logo"
                    data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="assets/img/laporgo_wh.png" alt="Logo" data-hs-theme-appearance="dark">
            </a>

            <!-- End Logo -->

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-secondary-content">
                <!-- Style Switcher -->
                <div class="dropdown">
                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                        id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        data-bs-dropdown-animation>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless"
                        aria-labelledby="selectThemeDropdown">
                        <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                            <i class="bi-moon-stars me-2"></i>
                            <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                        </a>
                        <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                            <i class="bi-brightness-high me-2"></i>
                            <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                        </a>
                        <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                            <i class="bi-moon me-2"></i>
                            <span class="text-truncate" title="Dark">Dark</span>
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <!-- Account -->
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                            data-bs-dropdown-animation>
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="bg-soft-primary avatar-img" src="/assets/img/user.png"
                                    alt="Image Description">
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account"
                            aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="/assets/img/user.png" alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">{{ Auth::guard('masyarakat')->user()->nama}}</h5>
                                        <p class="card-text text-body">{{ Auth::guard('masyarakat')->user()->username}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('pekat.laporan') }}">Laporan Saya</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('pekat.logout') }}">Logout</a>
                        </div>
                    </div>
                    <!-- End Account -->
                    @else
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('pekat.loginForm') }}" class="btn btn-primary">Login</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
            <!-- End Secondary Content -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarContainerNavDropdown">

            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
