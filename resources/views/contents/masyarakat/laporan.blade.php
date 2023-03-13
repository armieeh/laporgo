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

            <!-- Teams -->
            <div class="row ">
                <div class="col-lg-7 mb-3 mb-lg-5">
                    <!-- Card -->
                    @if ($pengaduan->isEmpty())
                    <div class="col-lg-12">
                        <h6 class="text-center">Belum ada pengaduan</h6>
                    </div>
                    @else

                    
                    @foreach ($pengaduan as $k => $v)
                    @if (request('status') && $v->status != request('status'))
                        @continue
                    @endif
                    <div class="card mb-5">
                        <!-- Body -->
                        <div class="card-body pb-0">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <h4 class="mb-1">
                                        <img src="/assets/img/user.png" alt="" class="avatar avata-sm">
                                        <a href="#">{{ $v->user->nama }}</a>
                                    </h4>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 text-end">
                                    <!-- Dropdown -->
                                    @if ($v->status == 0)
                                    <div class="dropdowm">
                                        <button type="button"
                                            class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle"
                                            id="teamsDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi-three-dots-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end"
                                            aria-labelledby="teamsDropdown1">
                                            <a class="dropdown-item text-danger"
                                                href="/delete/{{ $v->id_pengaduan }}">Delete</a>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- End Dropdown -->
                                </div>
                                <hr>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <p class="fw-bold">{{ $v->judul_laporan }}</p>
                            <p>{{ $v->isi_laporan }}</p>
                            <span class="avatar avatar-xl avatar-4x3">
                                <div class="d-lg-flex d-none justify-content-start">

                                    @foreach (explode('|', $v->foto) as $foto)
                                    <img class="avatar-img me-2" src="/storage/{{ $foto }}" alt="Image Description">
                                    @endforeach
                                </div>
                            </span>

                            <div class="card-footer border-0 pt-0 mt-5">
                                <div class="list-group list-group-flush list-group-no-gutters">
                                    <!-- List Item -->
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="card-subtitle">Tanggal pengaduan:</span>
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-auto">
                                                <p class="">{{ $v->tgl_pengaduan }}</p>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                    </div>
                                    <!-- End List Item -->

                                    <!-- List Item -->
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="card-subtitle">status :</span>
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-auto">
                                                <!-- Stars -->
                                                <div class="d-flex gap-1">
                                                    @if ($v->status == '0')
                                                    <p class="badge bg-soft-danger text-danger">Pending</p>
                                                    @elseif($v->status == 'proses')
                                                    <p class="badge bg-soft-warning text-warning">
                                                        {{ ucwords($v->status) }}
                                                    </p>
                                                    @else
                                                    <p class="badge bg-soft-primary text-primary">
                                                        {{ ucwords($v->status) }}
                                                    </p>
                                                    @endif
                                                </div>
                                                <!-- End Stars -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="card-subtitle">kategori :</span>
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-auto">
                                                <!-- Stars -->
                                                <div class="d-flex gap-1">
                                                    <p class="badge bg-soft-primary text-primary">
                                                        {{ ucwords($v->kategori->kategori) }}</p>

                                                    </p>
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
                                            @if ($v->tanggapan == null)

                                            <span class="card-subtitle text-center">Belum ada tanggapan</span>
                                            @else
                                            <span class="card-subtitle">Tanggapan dari : <span
                                                    class="fw-bold">{{ $v->tanggapan->petugas->nama }}</span></span>
                                            <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                                            @endif
                                            <!-- End Col -->
                                        </div>
                                    </div>
                                    <!-- End List Item -->
                                </div>
                            </div>

                        </div>
                        <!-- End Body -->

                    </div>
                    @endforeach
                    @endif
                    <!-- End Card -->
                </div>

                <div class="col-lg-5 mb-3 mb-lg-5">
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
                                    <h5>Semua</h5>
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
                </div>
            </div>
            <!-- End Teams -->
        </div>
    </div>
</div>


<!-- End Content -->

@endsection
