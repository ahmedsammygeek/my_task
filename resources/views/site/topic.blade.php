
@extends('site.layouts.master')

@section('page_content')
<section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> {{ $topic->title }} </h2>
                    <p>نقدم لكم مجموعة من المقالات المهمة في مجالات العقارات والديكور</p>
                </div>
            </div>
        </div>
    </section>
      <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img src="{{ Storage::url('topics/'.$topic->image) }}" alt="blog">
                        </div>
                        <div class="blog-text">
                            <li>
                                <i class='bx bx-user'></i>
                                <span> {{ $topic->user?->name }} </span>
                            </li>
                            <li>
                                <i class='bx bx-calendar'></i>
                                <span> {{ $topic->created_at->toFormattedDateString() }} </span>
                            </li>
                            <h2> {{ $topic->title }} </h2>
                            {!! $topic->content !!}
                            <h4>وسم - كلمة البحث</h4>
                            <ul>
                                @foreach ($topic->tags as $topic_tag)
                                   <li><a href="#"> {{ $topic_tag->tag?->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="search-box">
                        <form>
                            <input type="text" placeholder="...ابحث">
                            <button> <i class='bx bx-search'></i></button>
                        </form>
                    </div>
                    <div class="latest-blog">
                        <h3>أخر المقالات</h3>
                        @foreach ($topics as $topic)
                            <div class="item">
                            <div class="img">
                                <img src="{{ Storage::url('topics/'.$topic->image) }}" alt="p-10">
                            </div>
                            <div class="text">
                                <a href="{{ $topic->urlForSite() }}"> {{ $topic->title }} </a>
                                <li>
                                    <i class='bx bx-calendar'></i>
                                    <span> {{ $topic->created_at->toFormattedDateString() }} </span>
                                </li>
                            </div>
                        </div>
                        @endforeach                
                    </div>
                    <div class="tags">
                        <h3>وسوم - كلمات البحث</h3>
                        <ul>
                            @foreach ($tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection