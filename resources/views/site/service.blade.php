
@extends('site.layouts.master')

@section('page_content')

<!-- start the banner section  -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{ $service->name }}</h2>
                <p>نقدم لكم مجموعة من الخدمات المتميزة التي نمتلكها</p>
            </div>
        </div>
    </div>
</section>
<!-- end the banner section  -->
<!-- start the serv-details section -->
<section class="serv-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2> {{ $service->name }}</h2>
                {!!  $service->content !!}
                <h2>لطلب الخدمة</h2>
                <button> 
                    <a href="https://wa.me/{{ $data['settings']->whatsapp }}?text=ارغب فى  الاستفسار عن الخدمه : {{ $service->name }} " target="-blank">
                        تواصل عن طريق الواتساب
                    </a>
                </button>
                <button>
                    <a href="{{ route('contact') }}">تواصل معنا من خلال الموقع</a>
                </button>
            </div>
            <div class="col-lg-4">
                <div class="serv-img">
                    <img src="{{ Storage::url('services/'.$service->image) }}" alt="services">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end the serv-details section -->


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