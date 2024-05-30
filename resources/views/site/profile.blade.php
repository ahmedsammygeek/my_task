
@extends('site.layouts.master')

@section('page_content')

<!-- start the banner section  -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> الملف الشخصى </h2>
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
                   <form>
                        <div class="row">
                        <div class="col-lg-6">
                            <label>الاسم<span>*</span></label>
                            <input type="text" name='name' placeholder="الاسم" value="{{ Auth::user()->name }}" >

                        </div>
                        <div class="col-lg-6">
                            <label> رقم الموبيل <span>*</span></label>
                            <input type="text" name='phone' placeholder=" رقم الموبيل" value="{{ Auth::user()->phone }}" >

                        </div>

                        <div class="col-lg-4">
                            <label>البريد الالكتروني  <span>*</span> </label>
                            <input type="email" name='email' placeholder="البريد الالكتروني" value="{{ Auth::user()->email }}" >
                        </div>

                    </div>
                   </form>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end the contact section -->
@endsection