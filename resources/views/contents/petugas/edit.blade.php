@extends('layouts.admin.master')

@section('title', 'Edit Petugas')

@section('content')

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card">
            <div class="card-header card-header-content-sm-between">
                <h4 class="card-header-title mb-2 mb-sm-0">Form Edit Petugas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="inputGroupHoverLightFullName" class="form-label">Nama Petugas</label>

                        <div class="input-grou1p input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text" id="inputGroupHoverLightFullNameAddOn">
                                <i class="bi-person"></i>
                            </div>
                            <input name="nama" type="text" value="{{ $petugas->nama }}" class="form-control" id="inputGroupHoverLightFullName"
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
                            <input name="username" type="text" value="{{ $petugas->username }}" class="form-control" id="inputGroupHoverLightEmail"
                                placeholder="petugas@gmail.com" aria-label="petugas@gmail.com"
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
                            <input name="telp" type="number" value="{{ $petugas->telp }}" class="form-control" id="inputGroupHoverLightEmail"
                                placeholder="00000000000000" aria-label="00000000000000"
                                aria-describedby="inputGroupHoverLightEmailAddOn">
                        </div>
                    </div>
                    <!-- End Input Group -->

                    <!-- Input Group -->
                    <div class="mb-3">
                        <label for="inputGroupHoverLightGenderSelect" class="form-label">Level</label>

                        <div class="input-group input-group-merge input-group-hover-light">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-person"></i>
                            </div>
                            <select name="level" id="level" class="form-select">
                                @if ($petugas->level == 'admin')
                                    <option selected value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                @else 
                                <option value="admin">Admin</option>
                                <option selected value="petugas">Petugas</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
                
            </div>
        </div>
    </div>
</main>
<!-- End Input Group -->
@endsection
