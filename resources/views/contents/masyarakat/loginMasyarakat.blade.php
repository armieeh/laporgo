@extends('layouts.masyarakat.master')

@section('content')
<form action="{{ route('pekat.login') }}" method="post">
    @csrf
    <div class="container-xl mt-lg-10 py-4 w-50">
        <div class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
                <h2 class="mb-5 card-title h1 text-inherit text-center">Silahkan Login</h2>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Username</label>
                    <input name="username" type="text" id="exampleFormControlInput1" class="form-control"
                        placeholder="Username">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput3">Password</label>
                    <input name="password" type="password" id="exampleFormControlInput3" class="form-control"
                        placeholder="********">
                </div>
                <button type="submit" class="btn btn-primary shadow-primary btn-sm">Log In</button>
            </div>
        </div>
    </div>
</form>
@if (Session::has('pesan'))
<div class="alert alert-danger mt-2">
    {{ Session::get('pesan') }}
</div>
@endif
<a href="/" class="btn btn-warning text-white mt-3" style="width: 100%">Kembali ke Halaman
    Utama</a>
@endsection
