
Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@armieeh 
armieeh
/
laporgo
Public
Cannot fork because you own this repository and are not a member of any organizations.
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
Settings
laporgo/resources/views/contents/masyarakat/laporan.blade.php
@armieeh
armieeh js
Latest commit 8c46953 3 days ago
 History
 1 contributor
363 lines (319 sloc)  16.8 KB

@extends('layouts.masyarakat.master')

@section('content')

<!-- Content -->
<div class="content container-fluid mt-10">
    <div class="row justify-content-lg-center">
        <div class="col-lg-10">
            <!-- Profile Cover -->
            <div class="profile-cover">
                <div class="profile-cover-img-wrapper">
                    <img id="profileCoverImg" class="profile-cover-img" src="assets/img/1920x400/img2.jpg"
                        alt="Image Description">

                    <!-- Custom File Cover -->
                    <div class="profile-cover-content profile-cover-uploader p-3">
                        <input type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder"
                            data-hs-file-attach-options='{
                            "textTarget": "#profileCoverImg",
                            "mode": "image",
                            "targetAttr": "src",
                            "allowTypes": [".png", ".jpeg", ".jpg"]
                         }'>
                        <label class="profile-cover-uploader-label btn btn-sm btn-white" for="profileCoverUplaoder">
                            <i class="bi-camera-fill"></i>
                            <span class="d-none d-sm-inline-block ms-1">Upload header</span>
                        </label>
                    </div>
                    <!-- End Custom File Cover -->
                </div>
            </div>
            <!-- End Profile Cover -->

            <!-- Profile Header -->
            <div class="text-center mb-5">
                <!-- Avatar -->
                <label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar"
                    for="editAvatarUploaderModal">
                    <img id="editAvatarImgModal" class="avatar-img" src="assets/img/160x160/img6.jpg"
                        alt="Image Description">

                    <input type="file" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
                        data-hs-file-attach-options='{
                          "textTarget": "#editAvatarImgModal",
                          "mode": "image",
                          "targetAttr": "src",
                          "allowTypes": [".png", ".jpeg", ".jpg"]
                       }'>

                    <span class="avatar-uploader-trigger">
                        <i class="bi-pencil-fill avatar-uploader-icon shadow-sm"></i>
                    </span>
                </label>
                <!-- End Avatar -->

                <h1 class="page-header-title">Mark Williams <i class="bi-patch-check-fill fs-2 text-primary"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h1>

                <!-- List -->
                <ul class="list-inline list-px-2">
                    <li class="list-inline-item">
                        <i class="bi-building me-1"></i>
                        <span>Pixeel Ltd.</span>
                    </li>

                    <li class="list-inline-item">
                        <i class="bi-geo-alt me-1"></i>
                        <a href="#">London,</a>
                        <a href="#">UK</a>
                    </li>

                    <li class="list-inline-item">
                        <i class="bi-calendar-week me-1"></i>
                        <span>Joined March 2013</span>
                    </li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Profile Header -->

            <!-- Nav -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="bi-chevron-left"></i>
                    </a>
                </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="bi-chevron-right"></i>
                    </a>
                </span>

                <ul class="nav nav-tabs align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == null ? 'active' : '' }}"
                            href="{{ route('pekat.laporan') }}">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'proses' ? 'active' : '' }}"
                            href="{{ route('pekat.laporan', ['status' => 'proses']) }}">Proses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'selesai' ? 'active' : '' }}"
                            href="{{ route('pekat.laporan', ['status' => 'selesai']) }}">Selesai</a>
                    </li>

                    <li class="nav-item ms-auto">
                        <div class="d-flex gap-2">
                            <a class="btn btn-white btn-sm" href="{{ route('pekat.editProfile', $masyarakat->nik) }}">
                                <i class="bi-person-plus-fill me-1"></i> Edit profile
                            </a>

                            <a class="btn btn-white btn-icon btn-sm" href="#">
                                <i class="bi-list-ul me-1"></i>
                            </a>

                            <!-- Dropdown -->
                            <div class="dropdown nav-scroller-dropdown">
                                <button type="button" class="btn btn-white btn-icon btn-sm" id="profileDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="profileDropdown">
                                    <span class="dropdown-header">Settings</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-share-fill dropdown-item-icon"></i> Share profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-slash-circle dropdown-item-icon"></i> Block page and profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <span class="dropdown-header">Feedback</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-flag dropdown-item-icon"></i> Report
                                    </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Nav -->

            <div class="row">
                <div class="col-lg-7">
                    
                    @if (request('status') && $v->status != request('status'))
                    @continue
                    @endif
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Body -->
                        <div class="card-body pb-0">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <h4 class="mb-1">
                                        <a href="#">{{ $v->user->nama }}</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 text-end">
                                    <!-- Dropdown -->
                                    <div class="dropdowm">
                                        <button type="button"
                                            class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                            id="teamsDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi-three-dots-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end"
                                            aria-labelledby="teamsDropdown1">
                                            <a class="dropdown-item" href="#">Rename team</a>
                                            <a class="dropdown-item" href="#">Add to favorites</a>
                                            <a class="dropdown-item" href="#">Archive team</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">Delete</a>
                                        </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            <hr>

                            <p>{{ Str::limit($v->isi_laporan, 100) }}</p>
                            
                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer border-0 pt-0">
                            <div class="list-group list-group-flush list-group-no-gutters">

                                <!-- List Item -->
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="card-subtitle">Tanggal pengaduan :</span>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Stars -->
                                            <div class="d-flex gap-1">
                                                <p>{{ $v->tgl_pengaduan }}</p>
                                            </div>
                                            <!-- End Stars -->
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                </div>
                                <!-- End List Item -->
                                <!-- List Item -->
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="card-subtitle">Industry:</span>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                </div>
                                <!-- End List Item -->

                                <!-- List Item -->
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        
                                        <!-- End Col -->
                                    </div>
                                </div>
                                <!-- End List Item -->
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->
                    <hr>
                    @endforeach
                    @endif
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-lg-5">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Laporan Anda</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body ">
                            <div class="row text-center">
                                <div class="col-xl-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                    <div class="ms-1">{{ $hitung[0] }}</div>
                                    <h5>Pending</h5>
                                    <!-- Progress -->
                                </div>
                                <div class="col-xl-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                    <div class="ms-1">{{ $hitung[1] }}</div>
                                    <h5>Proses</h5>
                                    <!-- Progress -->
                                    <!-- End Progress -->
                                </div>
                                <div class="col-xl-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                    <div class="ms-1">{{ $hitung[2] }}</div>
                                    <!-- End Progress -->
                                    <h5>Selesai</h5>
                                    <!-- Progress -->
                                </div>
                            </div>
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card card-centered mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Projects</h4>

                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                    id="projectReportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end mt-1"
                                    aria-labelledby="projectReportDropdown">
                                    <span class="dropdown-header">Settings</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-share-fill dropdown-item-icon"></i> Share connections
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <span class="dropdown-header">Feedback</span>

                                    <a class="dropdown-item" href="#">
                                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                    </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body card-body-height card-body-centered">
                            <img class="avatar avatar-xxl mb-3" src="assets/svg/illustrations/oc-error.svg"
                                alt="Image Description" data-hs-theme-appearance="default">
                            <img class="avatar avatar-xxl mb-3" src="assets/svg/illustrations-light/oc-error.svg"
                                alt="Image Description" data-hs-theme-appearance="dark">
                            <p class="card-text">No data to show</p>
                            <a class="btn btn-white btn-sm" href="projects.html">Start your Projects</a>
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Content -->

<!-- Footer -->

<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
            <div class="d-flex justify-content-end">
                <!-- List Separator -->
                <ul class="list-inline list-separator">
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="#">FAQ</a>
                    </li>

                    <li class="list-inline-item">
                        <a class="list-separator-link" href="#">License</a>
                    </li>

                    <li class="list-inline-item">
                        <!-- Keyboard Shortcuts Toggle -->
                        <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts"
                            aria-controls="offcanvasKeyboardShortcuts">
                            <i class="bi-command"></i>
                        </button>
                        <!-- End Keyboard Shortcuts Toggle -->
                    </li>
                </ul>
                <!-- End List Separator -->
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>

@endsection