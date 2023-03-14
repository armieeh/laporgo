@extends('layouts.admin.master')

@section('title', 'Tambah Petugas')

@section('content')

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card">
            <div class="card-header card-header-content-sm-between">
                <h4 class="card-header-title mb-2 mb-sm-0">Form Tambah Petugas</h4>
            </div>
            <div class="card-body">
                <div>
                    @if (Session::has('username'))
                    <div class="alert alert-danger">
                        {{ Session::get('username') }}
                    </div>
                    @endif
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                <form action="{{ route('petugas.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="inputGroupHoverLightFullName" class="form-label">Nama Petugas</label>

                        <div class="input-grou1p input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text" id="inputGroupHoverLightFullNameAddOn">
                                <i class="bi-person"></i>
                            </div>
                            <input name="nama" type="text" class="form-control" id="inputGroupHoverLightFullName"
                                aria-describedby="inputGroupHoverLightFullNameAddOn" placeholder="Petugas">
                        </div>
                    </div>
                    <!-- End Input Group -->

                    <!-- Input Group -->
                    <div class="mb-3">
                        <label for="inputGroupHoverLightEmail" class="form-label">Username</label>

                        <div class="input-group input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text" id="inputGroupHoverLightEmailAddOn">
                                <i class="bi-person"></i>
                            </div>
                            <input name="username" type="text" class="form-control" id="inputGroupHoverLightEmail"
                                placeholder="petugas" aria-label="petugas@gmail.com"
                                aria-describedby="inputGroupHoverLightEmailAddOn">
                        </div>
                    </div>
                    <!-- End Input Group -->

                    <!-- Input Group -->
                    <div class="mb-3">
                        <label for="inputGroupHoverLightEmail" class="form-label">Password</label>

                        <div class="input-group input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text" id="inputGroupHoverLightEmailAddOn">
                                <i class="bi-key"></i>
                            </div>
                            <input name="password" type="password" class="form-control" id="inputGroupHoverLightEmail"
                                placeholder="**********" aria-label="**********"
                                aria-describedby="inputGroupHoverLightEmailAddOn">
                        </div>
                    </div>
                    <!-- End Input Group -->

                    <!-- Input Group -->
                    <div class="mb-3">
                        <label for="inputGroupHoverLightEmail" class="form-label">No Telepon</label>

                        <div class="input-group input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text" id="inputGroupHoverLightEmailAddOn">
                                <i class="bi-phone"></i>
                            </div>
                            <input name="telp" type="number" class="form-control" id="inputGroupHoverLightEmail"
                                placeholder="00000000000000" aria-label="00000000000000"
                                aria-describedby="inputGroupHoverLightEmailAddOn">
                        </div>
                    </div>
                    <!-- End Input Group -->

                    <div class="mb-3">
                        <label for="inputhover" class="form-label">Desa / Instansi</label>

                        <div class="input-group input-group-merge input-group-hover-light">
                            <select name="id_desa" id="id_desa" class="form-select">
                                <option value="0">pilih desa</option>
                                @foreach ($desa as $item)
                                <option value="{{ $item->id_desa }}">{{ $item->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Input Group -->
                    <div class="mb-3">
                        <label for="inputGroupHoverLightGenderSelect" class="form-label">Level</label>

                        <div class="input-group input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-person"></i>
                            </div>
                            <select name="level" id="level" class="form-select">
                                <option value="petugas" selected>Pilih Level (Default Petugas)</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- End Input Group -->
@endsection
