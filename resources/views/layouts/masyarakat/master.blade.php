<!DOCTYPE html>
<html lang="en">

@include('partials.masyarakat.head')

<body>
  <style type="text/css">
    @media (min-width: 1400px)
    {
      .container-lg
      {
        max-width: 1140px;
      }
    }
  </style>

  <script src="/assets/js/hs.theme-appearance.js"></script>

  <!-- ========== HEADER ========== -->
  @include('partials.masyarakat.header')

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    @yield('content')
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  @include('partials.masyarakat.footer')
  <!-- ========== END FOOTER ========== -->

  @include('partials.masyarakat.script')
  @yield('js')
  
</body>

<!-- Mirrored from htmlstream.com/preview/front-dashboard-v2.1.1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 14:27:15 GMT -->
</html>