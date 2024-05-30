
@extends('site.layouts.master')

@section('page_content')

<!-- start the banner section  -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> تسجيل الدخول </h2>
                <p> تسجيل الدخول الى حسابك</p>
            </div>
        </div>
    </div>
</section>
<!-- end the banner section  -->

<!-- start the contact section -->
<section class="contact">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <form action="{{ route('site.login') }}" method="POST" >

                        @csrf
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <label>البريد الالكتروني  <span>*</span> </label>
                                <input type="email" name='email' placeholder="البريد الالكتروني" value="{{ old('email') }}" >
                                @error('email')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label> كلمه المرور <span>*</span> </label>
                                <input type="password" name='password' placeholder="*********">
                                @error('email')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        
                        <button type="submit"> تسجيل الدخول </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end the contact section -->
@endsection