
@extends('site.layouts.master')

@section('page_content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php
        $i = 1;
        @endphp
        @foreach ($room->images as $room_image)
        <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
            <img src="{{ Storage::url('rooms/'.$room_image->image) }}" class="d-block w-100" alt="item">
        </div>
        @php
        $i++;
        @endphp
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <i class='bx bx-chevrons-left' aria-hidden="true"></i>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <i class='bx bx-chevrons-right' aria-hidden="true"></i>
    </button>
</div>
<section class="item-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="item-details-box">
                   {{ $room->type }}
                   
                    <h3>{{ $room->name }}</h3>
                    <li class="location">
                        <i class='bx bx-location-plus'></i>
                        {{ $room->address }}
                    </li>
                    <h4> {{ $room->price }} $</h4>
                    <div class="list">
                        <ul>
                            <li>
                                <i class='bx bx-bed'></i>
                                {{ $room->roomsTypesAsText() }} 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="features">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                التفاصيل & المميزات
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               {{ $room->description }}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-4">
            @livewire('site.rooms.room-reservation'  , ['room' => $room ] )
        </div>
    </div>
</div>
</section>
@endsection