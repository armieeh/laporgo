@extends('layouts.admin.master')

@section('title', 'Detail Masyarakat')

@section('content')

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="card h-100">
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Detail Masyarakat</h4>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{ $masyarakat->nik }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $masyarakat->nama }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{ $masyarakat->username }}</td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td>{{ $masyarakat->telp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
