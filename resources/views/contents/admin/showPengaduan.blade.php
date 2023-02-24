@extends('layouts.admin.master')

@section('content')

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="card h-100">
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">Pengaduan Masyarakat</h4>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tanggal Pengaduan</td>
                                <td>:</td>
                                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td>:</td>
                                <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan"
                                        class="embed-responsive" style="width: 200px"></td>
                            </tr>
                            <tr>
                                <td>Isi Laporan</td>
                                <td>:</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    @if ($pengaduan->status == '0')
                                    <span class="legend-indicator bg-danger"></span>Pending
                                    @elseif ($pengaduan->status == 'proses')
                                    <span class="legend-indicator bg-warning"></span>Proses
                                    @else
                                    <span class="legend-indicator bg-success"></span>Selesai
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Tanggapan Petugas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tanggapan.createOrUpdate') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="custom-select">
                                        @if ($pengaduan->status = '0')
                                        <option selected value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                        @elseif ($pengaduan->status = 'proses')
                                        <option value="0">Pending</option>
                                        <option selected value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                        @else
                                        <option value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option selected value="selesai">Selesai</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggapan">Tanggapan</label>
                                <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control"
                                    placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                            </div>
                            <button type="submit" class=" mt-3 btn btn-primary">KIRIM</button>
                        </form>
                        @if (session('status'))
                        <script>
                            swal('Berhasil', '{{ session('status ') }}', 'status');
                        </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
