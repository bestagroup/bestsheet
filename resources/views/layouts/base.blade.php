@php
  $theme = session('theme', 'theme-default');
@endphp
<!DOCTYPE html>
<html lang="fa" dir="rtl" data-theme="{{ $theme }}">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{$thispage['list']}}</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>

  <!-- Fonts and Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/IRANSans.css') }}"/>

  <!-- Core & Theme CSS -->
    @if(session('theme') === 'theme-default-dark')
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}">
    @endif

  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}">

    @yield('style')
  <!-- Helpers & Config -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>



  @stack('head')
</head>
<!-- Debug -->

<body>
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- / Sidebar -->

    <div class="layout-page">
      <!-- Header -->
      @include('partials.header')
      <!-- / Header -->

      <!-- Main Content -->
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Core JS -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('script')
@stack('scripts')
</body>
</html>
