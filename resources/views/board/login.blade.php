<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" dir='rtl'>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>تسجيل الدخول</title>
  <!-- CSS files -->
  <link href="{{ asset('board_assets/dist/css/tabler.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/demo.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.css') }}" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    a , p , h1 , h2, h3 , h4 , h5 , h6 , span , div , table , form , button , th , tr , td , thead , tbody  {
      font-family: 'Cairo', sans-serif !important;
      font-weight: bold;
    }
  </style>
</head>
<body  class=" d-flex flex-column">
  <script src="./dist/js/demo-theme.min.js?1684106062"></script>
  <div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('site_assets/img/logo.JPG') }}" height="36" alt=""></a>
      </div>
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4"> تسجيل دخول لوحه التحكم </h2>
          <form action="{{ route('board.login.post') }}" method="POST" autocomplete="off" novalidate>
            @csrf
            <div class="mb-3">
              <label class="form-label"> البريد الاكترونى </label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "  autocomplete="off">
              @error('email')
              <p class='text-danger' > {{ $message }} </p> 
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                كلمه المرور
              </label>
              <div class="input-group input-group-flat">
              <input type="password" name='password' class="form-control @error('email') is-invalid @enderror"   autocomplete="off">
             
              </div>
               @error('password')
              <p class='text-danger' > {{ $message }} </p> 
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">تذكر دخولى</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100"> تسجيل الدخول </button>
            </div>
          </form>
        </div>
        
      </div>

    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="{{ asset('board_assets/dist/js/tabler.min.js?1684106062') }}" defer></script>
  <script src="{{ asset('board_assets/dist/js/demo.min.js?1684106062') }}" defer></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.js') }}" defer></script>
 @include('board.layouts.messages')
 
  @yield('scripts')
</body>
</html>