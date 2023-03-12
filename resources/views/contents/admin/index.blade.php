@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('content')

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-header-title">Dashboard</h3>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Stats -->
        <div class="row">
            @if (Auth::guard('admin')->user()->level == 'admin')
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                  <a class="card card-hover-shadow h-100" href="#">
                      <div class="card-body">
                          <h3 class="card-title text-muted">Petugas</h3>
                          <div class="row align-items-center gx-2 mb-1">
                              <div class="col-">
                                  <h2 class="card-title text-inherit">{{ $petugas }}</h2>
                              </div>
                      
                          </div>
                      </div>
                  </a>
                <!-- End Card -->
              </div>
  
              <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                  <!-- Card -->
                  <a class="card card-hover-shadow h-100" href="#">
                      <div class="card-body">
                          <h3 class="card-title text-muted">Masyarakat</h3>
                          <div class="row align-items-center gx-2 mb-1">
                              <div class="col-">
                                  <h2 class="card-title text-inherit">{{ $masyarakat }}</h2>
                              </div>
                      
                          </div>
                      </div>
                  </a>
                  <!-- End Card -->
              </div>
              <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h3 class="card-title text-muted">Pengaduan Proses</h3>
                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-">
                                <h2 class="card-title text-inherit">{{ $proses }}</h2>
                            </div>
                    
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            @else
                
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h3 class="card-title text-muted">Pengaduan Proses</h3>
                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-">
                                <h2 class="card-title text-inherit">{{ $proses }}</h2>
                            </div>
                    
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h3 class="card-title text-muted">Pengaduan Selesai</h3>
                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-">
                                <h2 class="card-title text-inherit">{{ $selesai }}</h2>
                            </div>
                    
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            @endif

        </div>
        <!-- End Stats -->
    </div>
    <!-- End Content -->

    <!-- Footer -->

    <div class="footer">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>

    <!-- End Footer -->
</main>
@endsection
