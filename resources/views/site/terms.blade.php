
@extends('site.layouts.master')

@section('page_content')
<section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>سياسة الموقع</h2>
                    <p>سياسة استخدام موقعنا وخصوصية المستخدم</p>
                </div>
            </div>
        </div>
    </section>


     <section class="policy">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   {!! $data['settings']->terms !!}
                </div>
            </div>
        </div>
    </section>
@endsection