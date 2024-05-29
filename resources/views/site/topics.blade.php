
@extends('site.layouts.master')

@section('page_content')
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>المدونة</h2>
                <p>نقدم لكم مجموعة من المقالات المهمة في مجالات العقارات والديكور</p>
            </div>
        </div>
    </div>
</section>
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>اخر المقالات</h2>
                <p>نقدم لكم مجموعة من المقالات المهمة في مجالات العقارات والديكور</p>
            </div>
        </div>
        <div class="row">
         @foreach ($topics as $topic)
         <div class="col-lg-4">
            <div class="blog-box">
                <div class="img">
                    <img src="{{ Storage::url('topics/'.$topic->image) }}" alt="blog">
                </div>
                <div class="text">
                    <ul>
                        <li>
                            <i class='bx bxs-calendar'></i>
                            <a href="{{ $topic->urlForSite() }}">{{ $topic->created_at->toFormattedDateString() }}</a>
                        </li>
                    </ul>
                    <h4><a href="{{ $topic->urlForSite() }}"> {{ $topic->title }} </a></h4>
                    <p>
                        {{ substr(strip_tags($topic->content), 0 , 120) }}
                    </p>
                    <span><a href="{{ $topic->urlForSite() }}">قراءة المزيد<i class='bx bx-chevrons-left'></i></a></span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="pagination">
               {{--  <ul>
                    <li><a href="listing.html">1</a></li>
                    <li><a href="listing.html">2</a></li>
                    <li><a href="listing.html"> <i class='bx bx-chevrons-left'></i></a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
</section>
@endsection