
@extends('site.layouts.master')

@section('page_content')
<!-- start the banner section  -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>ماذا عنا</h2>
                <p>نحن نقدم أماكن فريدة مناسبة لراحتك</p>
            </div>
        </div>
    </div>
</section>
<!-- end the banner section  -->

<!-- start the about section -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>من نحن</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {!! $data['settings']->about !!}
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>أهدافنا</h3>
            </div>
        </div>
        <div class="row">

            @foreach ($goals as $goal)
            <div class="col-lg-4">
                <img src="{{ Storage::url('goals/'.$goal->image) }}" alt="about">
                <h5>{{ $goal->title }}</h5>
                <p> {{ $goal->content }} </p>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end the about section -->

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