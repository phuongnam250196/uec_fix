@extends('frontend.master')
@section('title', 'Hướng doanh nghiệp')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="breadcrumb-item active">Hướng doanh nghiệp</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="thongtinsinhvien">
                    <div class="thongtinsinhvien-main">
                        <div class="thongtinsinhvien-title">
                            <h1 class="thongtinsinhvien-title-exp">{{$huongdn->towardbusiness_name}}</h1>
                        </div>
                        <div class="row thongtinsinhvien-row">
                            <div class="col-md-8 thongtinsinhvien-content">
                                {!! $huongdn->towardbusiness_content !!}
                            </div>
                            <div class="col-md-4 thongtinsinhvien-img">
                                <img src="{{asset('/'.$huongdn->towardbusiness_img)}}">
                            </div>
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