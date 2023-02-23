@extends('layouts.masyarakat.master')

@section('content')
<form action="/register/auth" method="post">
    @csrf
    <div class="container-xl mt-lg-10 py-4 w-50">
        <div class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
                <h2 class="mb-5 card-title h1 text-inherit text-center">Silahkan Registrasi</h2>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">NIK</label>
                    <input name="nik" type="text" id="exampleFormControlInput1" class="form-control"
                        placeholder="NIK">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">nama</label>
                    <input name="nama" type="text" id="exampleFormControlInput1" class="form-control"
                        placeholder="NIK">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput3">Username</label>
                    <input name="username" type="text" id="exampleFormControlInput3" class="form-control"
                        placeholder="username">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput3">Password</label>
                    <input name="password" type="password" id="exampleFormControlInput3" class="form-control"
                        placeholder="***********">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput3">No Telepon</label>
                    <input name="telp" type="number" id="exampleFormControlInput3" class="form-control"
                        placeholder="089999999999">
                </div>
                <button type="submit" class="btn btn-primary shadow-primary btn-sm">Registrasi</button>
            </div>
        </div>
    </div>
</form>
@if (Session::has('pesan'))
<div class="alert alert-danger mt-2">
    {{ Session::get('pesan') }}
</div>
@endif
<a href="/login" class="btn btn-warning text-white mt-3" style="width: 100%">Kembali ke Halaman
    Utama</a>
@endsection
