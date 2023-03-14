@extends('layouts.masyarakat.master')

@section('title', 'Edit Laporan')

@section('content')


{{-- form --}}
<div class="container-xl w-75 mt-5 mt-lg-5">
    <div class="">
        <!-- Card -->
        <div class="card card-lg h-100 bg-light border-0 shadow-none ">
            <div class="card-body">
                <h2 class="mt-3 mb-5 card-title h1 text-inherit text-center">Edit Laporan</h2>
                <form action="/laporan/{{ $pengaduan->id_pengaduan }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <input name="judul_laporan" id="exampleFormControlTextarea1" class="form-control"
                                placeholder="Masukkan Judul Laporan*" rows="4" value="{{ $pengaduan->judul_laporan }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <textarea name="isi_laporan" id="exampleFormControlTextarea1" class="form-control"
                                placeholder="Masukkan Isi Laporan*" rows="4"
                                value="{{ $pengaduan->isi_laporan }}">{{ $pengaduan->isi_laporan }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <input name="tgl_pengaduan" type="date" id="exampleFormControlTextarea1"
                                class="form-control" placeholder="Tanggal Kejadian" rows="4"
                                value="{{ $pengaduan->tgl_pengaduan }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputhover" class="form-label">Desa / Instansi</label>
                        <div class="input-group input-group-merge input-group-hover-light">
                            <select name="id_desa" id="id_desa" class="form-select">
                                <option value="{{ $pengaduan->desa->nama_desa }}" selected disabled>{{ $pengaduan->desa->nama_desa }}</option>
                                @foreach ($desa as $d)
                                    <option value="{{ $d->id_desa }}">{{ $d->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputhover" class="form-label">Kategori</label>
                        <div class="input-group input-group-merge input-group-hover-light">
                            <select name="id_kategori" id="id_desa" class="form-select">
                                <option value="{{ $pengaduan->kategori->kategori }}" selected disabled>{{ $pengaduan->kategori->kategori }}</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group input-group-merge input-group-light">
                            <input name="lokasi" type="text" id="exampleFormControlTextarea1" class="form-control"
                                placeholder="Ketik Lokasi Kejadian" rows="4" value="{{ $pengaduan->lokasi }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="file" name="images[]" accept="image/*" multiple
                            class="form-control @error('images') is-invalid @enderror" id="image" value="{{ $pengaduan->foto }}">
                        <div class="row mt-2" id="image-preview-container" style="display:none;">
                            <div class="col-12" id="image-preview"></div>
                        </div>
                        @error('images')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="mt-5 text-start">
                        <button type="submit" class="btn btn-primary">Edit</button>
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
