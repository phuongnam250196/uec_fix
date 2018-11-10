@extends('frontend.master')
@section('title', 'Job Fair')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{url('/jobfair')}}">Job Fair</a></li>
          <li class="breadcrumb-item active">{{$jobfair->jobfair_name}}</li>
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
                            <h1 class="thongtinsinhvien-title-exp">{{$jobfair->jobfair_name}}</h1>
                        </div>
                        <div class="row thongtinsinhvien-row">
                            <div class="col-md-8 thongtinsinhvien-content">
                                {!! $jobfair->jobfair_content !!}
                                <div class="dinhhuong-content-lienquan">
                                    <h5>Nội dung của các chương trình Job Fair sẽ được tổ chức tại Trường Đại Học Thăng Long:</h5>
                                    <ul>
                                        @foreach($jobfair_other as $other)
                                            <li><a href="{{url('jobfair/'.$other->id)}}">{!! $other->jobfair_name !!}</a></li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="col-md-4 thongtinsinhvien-img">
                                @foreach($jobfair_other as $other)
                                    <img src="{{asset('../storage/app/jobfair/'.$other->jobfair_img)}}">
                                @endforeach
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