<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
  <div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">
      <!-- Logo -->

      <a class="navbar-brand" href="index.html" aria-label="Front">
        <img class="navbar-brand-logo" src="/assets/img/laporgo.png" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo" src="/assets/img/laporgo.png" alt="Logo" data-hs-theme-appearance="dark">
        <img class="navbar-brand-logo-mini" src="/assets/img/laporgo.png" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini" src="/assets/img/laporgo.png" alt="Logo" data-hs-theme-appearance="dark">
      </a>

      <!-- End Logo -->

      <!-- Navbar Vertical Toggle -->
      <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
        <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
        <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
      </button>

      <!-- End Navbar Vertical Toggle -->

      <!-- Content -->
      <div class="navbar-vertical-content">
        <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
          <!-- Collapse -->
          <div class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}" role="button" data-bs-target="#navbarVerticalMenuDashboards" aria-expanded="true" aria-controls="navbarVerticalMenuDashboards">
              <i class="bi-house-door nav-icon"></i>
              <span class="nav-link-title">Dashboards</span>
            </a>
          </div>
          <!-- End Collapse -->

          <span class="dropdown-header mt-4">Pages</span>
          <small class="bi-three-dots nav-subtitle-replacer"></small>

          <!-- Collapse -->
          <div class="navbar-nav nav-compact">

          </div>
          <div id="navbarVerticalMenuPagesMenu">
            @if (Auth::guard('admin')->user()->level == 'petugas')
                <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link" href="{{ route('pengaduan.index') }}" role="button" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                <i class="bi-box-seam nav-icon"></i>
                <span class="nav-link-title">Pengaduan</span>
              </a>
            </div>
            <!-- End Collapse -->
            @else
                <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link" href="{{ route('pengaduan.index') }}" role="button" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                <i class="bi-box-seam nav-icon"></i>
                <span class="nav-link-title">Pengaduan</span>
              </a>
            </div>
            <!-- End Collapse -->

            <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link" href="{{ route('petugas.index') }}" role="button" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                <i class="bi-person nav-icon"></i>
                <span class="nav-link-title">Petugas</span>
              </a>
            </div>
            <!-- End Collapse -->

            <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link" href="{{ route('masyarakat.index') }}" role="button" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                <i class="bi-people nav-icon"></i>
                <span class="nav-link-title">Masyarakat</span>
              </a>
            </div>
            <!-- End Collapse -->

            @endif
      </div>
      <!-- End Content -->

      <!-- Footer -->
      <div class="navbar-vertical-footer">
        <ul class="navbar-vertical-footer-list">
          <li class="navbar-vertical-footer-list-item">
            <!-- Style Switcher -->
            <div class="dropdown dropup">
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

              </button>

              <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
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
        </ul>
      </div>
      <!-- End Footer -->
    </div>
  </div>
</aside>