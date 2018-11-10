@extends('frontend.master')
@section('title', 'Giới thiệu')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="breadcrumb-item active">Giới thiệu</li>
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
                        {{-- <div class="row">
                            <div class="col-md-5">
                                <img src="images/giothieu.png" width="100%">
                            </div>
                            <div class="col-md-7">
                                <div class="gioithieu-title">
                                    <h1 class="gioithieu-title-exp">Giới thiệu trung tâm uec</h1>
                                </div>
                                <div class="gioithieu-content">
                                    <p>Để giới thiệu Trung tâm Kết nối Đại học-Doanh nghiệp của Trường Đại Học Thăng Long, anh chị có thể tải các vật liệu sau đây:</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="gioithieu-letter">
                             {!! $intro->introuec_content !!}
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