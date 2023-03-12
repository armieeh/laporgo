@extends('layouts.masyarakat.master')

@section('title', 'Laporan')

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
                        <div type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder"
                            data-hs-file-attach-options='{
                            "textTarget": "#profileCoverImg",
                            "mode": "image",
                            "targetAttr": "src",
                            "allowTypes": [".png", ".jpeg", ".jpg"]
                         }'></div>
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
                    <img id="editAvatarImgModal" class="avatar-img" src="assets/img/user.png" alt="Image Description">

                    <input type="file" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
                        data-hs-file-attach-options='{
                          "textTarget": "#editAvatarImgModal",
                          "mode": "image",
                          "targetAttr": "src",
                          "allowTypes": [".png", ".jpeg", ".jpg"]
                       }'>

                    <span class="avatar-uploader-trigger">
                        <a href="{{ route('pekat.editProfile', $masyarakat->nik) }}"></a>
                    </span>
                </label>
                <!-- End Avatar -->

                <h1 class="page-header-title">{{ $masyarakat->nama }}</h1>
                <span>{{ $masyarakat->username }}</span>

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
                </ul>
            </div>
            <!-- End Nav -->

            <!-- Tab Content -->
            <div class="tab-content" id="profileTeamsTabContent">
                <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <!-- Teams -->
                    <div class="row">
                        <div class="col-lg-7">
                            @if ($pengaduan->isEmpty())
                            <div class="col-lg-12">
                                <h6 class="text-center">Belum ada pengaduan</h6>
                            </div>
                            @else
                            @foreach ($pengaduan as $v => $k)
                            <!-- Card -->
                            <div class="card">
                                <!-- Body -->
                                <div class="card-body pb-0">
                                    <div class="row align-items-center mb-2">
                                        <div class="col-9">
                                            <h4 class="mb-1">
                                                <a href="#">#digitalmarketing</a>
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

                                    <p>Our group promotes and sells products and services by leveraging online marketing
                                        tactics</p>
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer border-0 pt-0">
                                    <div class="list-group list-group-flush list-group-no-gutters">
                                        <!-- List Item -->
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <span class="card-subtitle">Industry:</span>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-auto">
                                                    <a class="badge bg-soft-primary text-primary p-2" href="#">Marketing
                                                        team</a>
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                        </div>
                                        <!-- End List Item -->

                                        <!-- List Item -->
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <span class="card-subtitle">Rated:</span>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-auto">
                                                    <!-- Stars -->
                                                    <div class="d-flex gap-1">
                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating"
                                                            width="14">
                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating"
                                                            width="14">
                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating"
                                                            width="14">
                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating"
                                                            width="14">
                                                        <img src="assets/svg/illustrations/star-half.svg"
                                                            alt="Review rating" width="14"
                                                            data-hs-theme-appearance="default">
                                                        <img src="assets/svg/illustrations-light/star-half.svg"
                                                            alt="Review rating" width="14"
                                                            data-hs-theme-appearance="dark">
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
                                                    <span class="card-subtitle">Members:</span>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-auto">
                                                    <!-- Avatar Group -->
                                                    <div class="avatar-group avatar-group-xs avatar-circle">
                                                        <span class="avatar" data-toggle="tooltip" data-placement="top"
                                                            title="Ella Lauda">
                                                            <img class="avatar-img" src="assets/img/160x160/img9.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="avatar" data-toggle="tooltip" data-placement="top"
                                                            title="David Harrison">
                                                            <img class="avatar-img" src="assets/img/160x160/img3.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="avatar avatar-soft-dark" data-toggle="tooltip"
                                                            data-placement="top" title="Antony Taylor">
                                                            <span class="avatar-initials">A</span>
                                                        </span>
                                                        <span class="avatar avatar-soft-info" data-toggle="tooltip"
                                                            data-placement="top" title="Sara Iwens">
                                                            <span class="avatar-initials">S</span>
                                                        </span>
                                                        <span class="avatar" data-toggle="tooltip" data-placement="top"
                                                            title="Finch Hoot">
                                                            <img class="avatar-img" src="assets/img/160x160/img5.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="avatar avatar-light avatar-circle"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Sam Kart, Amanda Harvey and 1 more">
                                                            <span class="avatar-initials">+3</span>
                                                        </span>
                                                    </div>
                                                    <!-- End Avatar Group -->
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                        </div>
                                        <!-- End List Item -->
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>
                            
                            @endforeach
                            @endif
                            <!-- End Card -->
                        </div>
                        <div class="col-lg-6 mb-3 mb-lg-5"></div>
                    </div>
                    <!-- End Teams -->
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
    </div>
</div>



@endsection
