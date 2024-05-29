<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ahmed Task </title>
    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('site_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/main.css') }}">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     @livewireStyles
</head>
<body>

    <!-- start the loader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- end the loader -->

    <!-- start the navbar -->
    @include('site.layouts.header')
    <!-- end the navbar -->

    @yield('page_content')

    @include('site.layouts.footer')
   

     @livewireScripts



  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <x-livewire-alert::scripts />
    <!-- scripts -->
    <script src="{{ asset('site_assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site_assets/js/main.js') }}"></script>
</body>
</html>