
@extends('site.layouts.master')

@section('page_content')

<!-- start the banner section  -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> تسجيل حساب جديد </h2>
                <p> عن طريق تسجيل الحساب يمكنك حجز الغرف </p>
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
                    <form action="{{ route('site.register') }}" method="POST" >

                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>الاسم<span>*</span></label>
                                <input type="text" name='name' placeholder="الاسم" value="{{ old('name') }}" >
                                @error('name')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label> رقم الموبيل <span>*</span></label>
                                <input type="text" name='phone' placeholder=" رقم الموبيل" value="{{ old('phone') }}" >
                                @error('phone')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label>البريد الالكتروني  <span>*</span> </label>
                                <input type="email" name='email' placeholder="البريد الالكتروني" value="{{ old('email') }}" >
                                @error('email')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>

                             <div class="col-lg-4">
                                <label> كلمه المرور <span>*</span> </label>
                                <input type="password" name='password' placeholder="*********">
                                @error('email')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>


                             <div class="col-lg-4">
                                <label> تاكيد كلمه المرور <span>*</span> </label>
                                <input type="password" name='password_confirmation' placeholder="*********">
                                @error('password_confirmation')
                                <p class='text-danger' > {{ $message }} </p>
                                @enderror
                            </div>

                        </div>
                       
                        <button type="submit"> اشترك </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end the contact section -->
@endsection