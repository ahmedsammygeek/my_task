
@extends('site.layouts.master')

@section('page_content')
<!-- start the banner section  -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>خدماتنا المميزة</h2>
                <p>نقدم لكم مجموعة من الخدمات المتميزة التي نمتلكها</p>
            </div>
        </div>
    </div>
</section>
<!-- end the banner section  -->

<!-- start the services section -->
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>خدماتنا المميزة</h2>
                <p>نقدم لكم مجموعة من الخدمات المتميزة التي نمتلكها</p>
            </div>
        </div>
        <div class="row">
            @php
            $i = 1;
            @endphp
            @foreach ($services as $service)
            <div class="col-lg-6 col-md-6">
                <div class="box">
                    <div class="icon">
                        <h4>0{{ $i++ }}</h4>
                    </div>
                    <div class="text">
                        <h3> {{ $service->name }} </h3>
                        <p> {{ $service->subtitle }} </p>
                        <a href="{{ $service->urlForSite() }}">تفاصيل الخدمة</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- end the services section -->

<!-- start the review section -->
<section class="review">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>أراء عملاؤنا</h2>
                <p>بعض أراء عملاؤنا التي تسعدنا ويسعدنا العمل معهم</p>
            </div>
        </div>
        <div class="row">
            @foreach ($reviews as $review)
            <div class="col-lg-4 col-md-6">
                <div class="rev-box">
                    <div class="rev-img">
                        <img src="{{ Storage::url('reviews/'.$review->image) }}" alt="user">
                    </div>
                    <div class="rev-text">
                        @for ($i = 0; $i < $review->rate ; $i++)
                        <i class='bx bxs-star'></i>
                        @endfor
                        <p>
                            {{ $review->comment }}
                        </p>
                        <h4>{{ $review->name }}</h4>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- end the review section -->
@endsection