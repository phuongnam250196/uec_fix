@extends('frontend.master')
@section('title', 'Tìm việc')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item">Tìm việc</li>
            <li class="breadcrumb-item active">{{$timviec->recruitment_name}}</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay doi tai day -->
                <div class="tin_public">
                    <div class="tin_detail text-center">
                        <p class="text-uppercase">vị trí tuyển dụng</p>
                        <h1>{{$timviec->recruitment_name}}</h1>
                        <p>@if(!empty($enter->enterprise_address)) {{$enter->enterprise_address}} - @endif {{$area->area_name}}</p>
                    </div>
                    <hr>
                    <hr>
                    <div class="row tin_detail_2">
                        <div class="col-lg-6">
                            <p><i class="fab fa-bitcoin"></i> Mức lương: <strong>{{$timviec->recruitment_salary}}</strong></p>
                            <p><i class="fas fa-users"></i> Số lượng cần tuyển: <strong>{{$timviec->recruitment_amount}}</strong></p>
                            <p><i class="fab fa-old-republic"></i> Độ tuổi: <strong>{{$timviec->recruitment_age}}</strong></p>
                            <p><i class="fas fa-id-card-alt"></i> Chức vụ: <strong>{{$position->position_name}}</strong></p>
                        </div>
                        <div class="col-lg-6">
                            <p><i class="fas fa-briefcase"></i> Nghề nghiệp: <strong>{{$career->career_name}}</strong></p>
                            <p><i class="fas fa-handshake"></i> Hình thức: <strong>{{$formality->formality_name}}</strong></p>
                            <p><i class="fas fa-star"></i> Năm kinh nghiệm: <strong>{{$yearofexp->yearofexp_name}}</strong></p>
                            <p><i class="fas fa-user-graduate"></i> Bằng cấp: <strong>{{$education->education_name}}</strong></p>
                        </div>
                    </div>
                    <hr>
                    <div class="tin_detail_content">
                        <h4 class="text-uppercase">Mô tả công việc</h4>
                        <div class="tin_detail_content_child">
                            {!! $timviec->recruitment_describe !!}
                        </div>
                    </div>
                    <div class="tin_detail_content">
                        <h4 class="text-uppercase">Yêu cầu công việc</h4>
                        <div class="tin_detail_content_child">
                            {!! $timviec->recruitment_requirements !!}
                        </div>
                    </div>
                    <div class="tin_detail_content">
                        <h4 class="text-uppercase">Quyền lợi</h4>
                        <div class="tin_detail_content_child">
                            {!! $timviec->recruitment_benefit !!}
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="tin_public">
                    <h4 class="text-uppercase text-center">Thông tin liên hệ</h4>
                    <div class="">
                        @if(!empty($enter->enterprise_people_name))
                            <p>Thông tin liên hệ: {{$enter->enterprise_people_name}}</p>
                        @endif
                        @if(!empty($enter->enterprise_people_phone))
                            <p>Số điện thoại: {{$enter->enterprise_people_phone}}</p>
                        @endif
                        @if(!empty($enter->enterprise_email))
                                <p>Email: {{$enter->enterprise_email}}</p>
                        @endif
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