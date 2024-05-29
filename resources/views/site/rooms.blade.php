
@extends('site.layouts.master')

@section('page_content')
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> الغرف المتاحة</h2>
                <p>نحن نمتلك مجموعة من الغرف الفاخرة للايجار في أرقي الأماكن</p>
            </div>
        </div>
    </div>
</section>
<section class="listing">
    @livewire('site.rooms.list-all-rooms')
</section>
@endsection