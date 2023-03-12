@extends('layouts.admin.master')

@section('title', 'Halaman Pengaduan')

@section('content')

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Card -->
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Laporan</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md">
                        <h4 class="card-header-title">Pengaduan</h4>
                    </div>

                    @if (Auth::guard('admin')->user()->level == 'admin')
                    <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown me-2">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-2"></i> Export
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/illustrations/print-icon.svg" alt="Image Description">
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/brands/excel-icon.svg" alt="Image Description">
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/components/placeholder-csv-format.svg"
                                        alt="Image Description">
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="../assets/svg/brands/pdf-icon.svg" alt="Image Description">
                                    PDF
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                    @else
                    @endif
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="exportDatatable"
                    class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                                  "dom": "Bfrtip",
                                  "buttons": [
                                    {
                                      "extend": "copy",
                                      "className": "d-none"
                                    },
                                    {
                                      "extend": "excel",
                                      "className": "d-none"
                                    },
                                    {
                                      "extend": "csv",
                                      "className": "d-none"
                                    },
                                    {
                                      "extend": "pdf",
                                      "className": "d-none"
                                    },
                                    {
                                      "extend": "print",
                                      "className": "d-none"
                                    }
                                 ],
                                 "order": []
                               }'>
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Tanggal</th>
                            <th>Judul Laporan</th>
                            <th>Isi Laporan</th>
                            <th>Desa</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Detail</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pengaduan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="ms-3">
                                    <span class="d-block h5 text-inherit mb-0">{{ $p->user->nama }}</span>
                                    <span class="d-block fs-5 text-body">{{ $p->user->username }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="d-block h5 mb-0">{{ $p->tgl_pengaduan }}</span>
                            </td>
                            <td>{{ $p->judul_laporan }}</td>
                            <td>{{ Str::limit($p->isi_laporan, 25) }}</td>
                            <td>{{ $p->desa->nama_desa }}</td>
                            <td>
                                @if ($p->status == '0')
                                <span class="legend-indicator bg-danger"></span>Pending
                                @elseif ($p->status == 'proses')
                                <span class="legend-indicator bg-warning"></span>Proses
                                @else
                                <span class="legend-indicator bg-success"></span>Selesai
                                @endif
                            </td>
                            <td><img src="/storage/{{ $p->foto }}" alt="" class="w-100 h-100"></td>
                            <td><a href="{{ route('pengaduan.show', $p->id_pengaduan) }}"
                                    class="btn btn-outline-primary">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>

</main>
@endsection
