@extends('frontend.master')
@section('title', 'Bài viết chi tiết')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item">Bài viết</li>
            <li class="breadcrumb-item">{{$baiviet->news_name}}</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay doi tai day -->
                <div class="gioithieu">
                    <div class="gioithieu-main">
                        <div class="gioithieu-title">
                            <h1 class="gioithieu-title-exp">{{$baiviet->news_name}}</h1>
                        </div>
                        <div class="gioithieu-letter">
                             {!! $baiviet->news_content !!}
                        </div>
                    </div>
                </div>
                <!-- End thay đổi -->
            </div>
            <div class="col-md-4 nav-doc">
                @include('frontend.navbar.navPublic_doc')
            </div>
        </div>
    </div>
</section>
<br>
@stop