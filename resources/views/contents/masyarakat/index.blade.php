@extends('layouts.masyarakat.master')

@section('title', 'Halaman Utama')

@section('content')

<!-- Hero -->
<div class="overflow-hidden gradient-radial-sm-primary">
    <div class="container-lg content-space-t-3 content-space-t-lg-4 content-space-b-2">
        <div class="w-lg-75 text-center mx-lg-auto text-center mx-auto">
            <!-- Heading -->
            <div class="mb-7 animated fadeInUp">
                <h1 class="display-2">Layanan Aspirasi dan Pengaduan <span
                        class="text-primary text-highlight-warning">Online</span> Masyarakat
                    <p class="fs-2 mt-3">Sampaikan Laporan Anda Sekarang Juga</p>
            </div>
            <!-- End Heading -->
        </div>
    </div>
</div>
<!-- End Hero -->

<!-- Step -->
<ul class="step step-md step-centered step-icon-lg mt-5 mb-5">
    <li class="step-item">
        <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">1</span>
            <div class="step-content">
                <h4 class="step-title">Login</h4>
            </div>
        </div>
    </li>

    <li class="step-item">
        <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">2</span>
            <div class="step-content">
                <h4 class="step-title">Tulis Laporan</h4>
            </div>
        </div>
    </li>

    <li class="step-item">
        <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">3</span>
            <div class="step-content">
                <h4 class="step-title">Tunggu Tanggapan</h4>
            </div>
        </div>
    </li>
</ul>
<!-- End Step -->

{{-- form --}}
<div class="container-xl w-75 mt-5 mt-lg-5">
    <div class="">
        <!-- Card -->
        <div class="card card-lg h-100 bg-light border-0 shadow-none ">
            <div class="card-body">
                <h2 class="mb-5 card-title h1 text-inherit text-center">Sampaikan Laporan Anda!</h2>
                <form action="{{ route('pekat.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <input name="judul_laporan" id="exampleFormControlTextarea1" class="form-control"
                                placeholder="Masukkan Judul Laporan*" rows="4" value="{{ old('judul_laporan') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <textarea name="isi_laporan" id="exampleFormControlTextarea1" class="form-control"
                                placeholder="Masukkan Isi Laporan*" rows="4"
                                value="{{ old('isi_laporan') }}"></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <input name="tgl_pengaduan" type="date" id="exampleFormControlTextarea1"
                                class="form-control" placeholder="Tanggal Kejadian" rows="4"
                                value="{{ old('tgl_pengaduan') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputhover" class="form-label">Desa / Instansi</label>
                        <div class="input-group input-group-merge input-group-hover-light">
                            <select name="id_desa" id="id_desa" class="form-select">
                                <option value="" selected disabled>pilih desa</option>
                                @foreach ($desa as $item)
                                <option value="{{ $item->id_desa }}">{{ $item->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputhover" class="form-label">Kategori</label>
                        <div class="input-group input-group-merge input-group-hover-light">
                            <select name="id_kategori" id="id_desa" class="form-select">
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <input name="lokasi" type="text" id="exampleFormControlTextarea1" class="form-control"
                                placeholder="Ketik Lokasi Kejadian" rows="4" value="{{ old('lokasi') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="file" name="images[]" accept="image/*" multiple
                            class="form-control @error('images') is-invalid @enderror" id="image">
                        <div class="row mt-2" id="image-preview-container" style="display:none;">
                            <div class="col-12" id="image-preview"></div>
                        </div>
                        @error('images')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="mt-5 text-end">
                        @if (Auth::guard('masyarakat')->check())
                        <button type="submit" class="btn btn-primary">LAPOR!</button>
                        @else
                        <!-- Toast Luncher -->
                        <button id="liveToastBtn" class="btn btn-primary" type="button">LAPOR!</button>

                        <!-- Toast -->
                        <div id="liveToast" class="position-fixed toast hide" role="alert" aria-live="assertive"
                            aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;" autofocus>
                            <div class="toast-header">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-exclamation-circle" height="40" width="40"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">TIdak bisa mengirim laporan</h5>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="toast-body">
                                <h4> Silahkan Login terlebih Dahulu</h4>

                            </div>
                        </div>
                        <!-- End Toast -->

                        @endauth
                    </div>
                </form>
            </div>
        </div>
        <!-- End Card -->
    </div>

</div>
{{-- end form --}}

@section('js')

<script>
    // INITIALIZATION OF LIVE TOAST
    // =======================================================
    const liveToast = new bootstrap.Toast(document.querySelector('#liveToast'))
    document.querySelector('#liveToastBtn').addEventListener('click', () => liveToast.show())

</script>
@endsection

@endsection
