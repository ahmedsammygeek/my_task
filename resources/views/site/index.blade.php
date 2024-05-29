
@extends('site.layouts.master')

@section('page_content')
<!-- start the wrap-header section -->
<section class="wrap-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>ابحث عن منازل يسهل الوصول إليها<br> للإيجار والتمليك</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="{{ route('rooms.index') }}" >
                    <div class="key">
                        <i class='bx bx-search'></i>
                        <input type="text" name="search" placeholder="أدخل كلمة البحث هنا">
                    </div> 
                    <div class="location">
                        <i class='bx bx-location-plus'></i>
                        <select name='areas_ids[]' >
                            @foreach ($areas as $area)
                            <option value="{{ $area->id }}" > {{ $area->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit">ابحث</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end the wrap-header section -->

<!-- start the explore section -->
<section class="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>أكتشف الأماكن الجديدة</h2>
                <p>اكتشف معنا أفضل الأماكن الجديدة المتميزة
                والرائعة والتي لديها العديد من المزايا</p>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ Storage::url('rooms/'.$room->image) }}" alt="item">
                    </div>
                    <div class="text-box">
                        <div class="top">
                            <div class="name">
                               {{ $room->roomsTypesAsText() }} 
                                <a href="{{ $room->urlForSite() }}"> {{ $room->name }} </a>
                            </div>
                            <h4> {{ $room->price }} SAR </h4>
                        </div>
                        <div class="list">
                            <ul>
                                <li>
                                    <i class='bx bx-bed'></i>
                                    {{ $room->roomsTypesAsText() }} 
                                </li>
                            </ul>
                        </div>
                        <div class="bottom">
                            <li>
                                <i class='bx bx-location-plus'></i>
                                {{ $room->area?->name }}
                            </li>
                            <button><a href="{{ $room->urlForSite() }}"> عرض </a></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach                
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button><a href="{{ url('projects.index') }}">أكتشف المزيد</a></button>
            </div>
        </div>
    </div>
</section>
<!-- end the explore section -->

<!-- start the find section -->
<section class="find">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>أسكن في أفضل الأماكن</h2>
                <p>ابحث عن الاماكن التي تريد السكن فيها بكل أريحية وسهولة وأنت في مكانك</p>
            </div>
        </div>
        <div class="row">
            @foreach ($areas as $area)
            <div class="col-lg-4 col-md-4">
                <div class="find-box">
                    <div class="find-img">
                        <img src="{{ Storage::url('areas/'.$area->image) }}" alt="c-1">
                    </div>
                    <div class="find-text">
                        <div class="find-text-left">
                            <a href="{{ route('rooms.index' , ['areas_ids[0]' => $area->id ] ) }}"> {{ $area->name }} </a>
                            <span> {{ $area->projects_count }} عقارات</span>
                        </div>
                        <a href="{{ route('rooms.index' , ['areas_ids[0]' => $area->id ] ) }}"><i class='bx bx-chevrons-left'></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button><a href="{{ route('rooms.index') }}">أكتشف المزيد</a></button>
            </div>
        </div>
    </div>
</section>
<!-- end the find section -->




@endsection