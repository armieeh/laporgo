@extends('layouts.masyarakat.master')

@section('title', 'Edit Profile')

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
            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title h4">Basic information</h2>
                </div>

                <!-- Body -->
                <div class="card-body">
                        <!-- Form -->
                        <div class="row mb-4">
                            <label for="emailLabel" class="col-sm-3 col-form-label form-label">NIK</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="emailLabel"
                                    placeholder="nik" disabled="" aria-label="Email" value="{{ $masyarakat->nik }}">
                            </div>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="row mb-4">
                            <label for="emailLabel" class="col-sm-3 col-form-label form-label">Nama</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="emailLabel"
                                    placeholder="Nama" aria-label="Email" value="{{ $masyarakat->nama }}">
                            </div>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="row mb-4">
                            <label for="emailLabel" class="col-sm-3 col-form-label form-label">Username</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="emailLabel"
                                    placeholder="Nama" aria-label="Email" value="{{ $masyarakat->username }}">
                            </div>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="row mb-4">
                            <label for="emailLabel" class="col-sm-3 col-form-label form-label">No Telp</label>

                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="nama" id="emailLabel"
                                    placeholder="Nama" aria-label="Email" value="{{ $masyarakat->telp }}">
                            </div>
                        </div>
                        <!-- End Form -->

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Content -->


@endsection
