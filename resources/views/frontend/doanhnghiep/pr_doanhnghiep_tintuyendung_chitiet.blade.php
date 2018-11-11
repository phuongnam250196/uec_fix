
@extends('frontend.master')
@section('title', 'DN | Tin tuyển dụng')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.doanhnghiep.nav.nav-enter')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Tin: {{$tin->recruitment_name}}</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('/enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">Tin chi tiết</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="khoa_dao_tao">
                    <div class="row kdt_row">
                        <div class="col-md-8 kdt_col">
                            <div class="kdt_detail">
                                <div class="row">
                                    <div class="col-6 kdt_col_2">
                                        <div class="d-flex">
                                            <div><i class="fas fa-database rounded-circle"></i></div>
                                            <div class="pl-2 kdt_col_2_2">
                                                <p>Mức lương</p>
                                                <p>{{number_format($tin->recruitment_salary, 0, '.', '.')}} đ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 kdt_col_2">
                                        <div class="d-flex">
                                            <div><i class="fas fa-users rounded-circle"></i></div>
                                            <div class="pl-2 kdt_col_2_2">
                                                <p>Số lượng cần tuyển</p>
                                                <p>{{$tin->recruitment_amount}} người</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 kdt_col_2">
                                        <div class="d-flex">
                                            <div><i class="fas fa-map-marker-alt rounded-circle"></i></div>
                                            <div class="pl-2 kdt_col_2_2">
                                                <p>Nơi làm việc</p>
                                                <p>{{$tin->enterprise_address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 kdt_col_3">
                                        <p class="">Kinh nghiệm: {{$tin->yearofexp_name}}</p>
                                        <p class="">Bằng cấp: {{$tin->education_name}}</p>
                                    </div>
                                    <div class="col-6 kdt_col_3">  
                                        <p class="">Chức vụ: {{$tin->position_name}}</p>
                                        <p class="">Độ tuổi: {{$tin->recruitment_age}}</p>
                                    </div>
                                </div>
                                <div class="kdt_row_2">
                                    <a href="{{url('enterprise/detail_ttd/'.$tin_id)}}" class="btn border-info"># {{$tin->formality_name}}</a>
                                    <a href="{{url('enterprise/detail_ttd/'.$tin_id)}}" class="btn border-info"># {{$tin->career_name}}</a>
                                    <a href="{{url('enterprise/detail_ttd/'.$tin_id)}}" class="btn border-info"># {{$tin->area_name}}</a>
                                    <a href="{{url('enterprise/detail_ttd/'.$tin_id)}}" class="btn border-info"># {{$tin->recruitment_gender==1?'Nam':'Nữ'}}</a>
                                </div>
                                <div class="row kdt_row_3">
                                    <div class="col-md-12 kdt_row_col">
                                        <h4>Mô tả công việc</h4>
                                        <div>{!! $tin->recruitment_describe !!}</div>
                                    </div>
                                    <div class="col-md-12 kdt_row_col">
                                        <h4>quyền lợi</h4>
                                        <div>{!! $tin->recruitment_benefit !!}</div>
                                    </div>
                                    <div class="col-md-12 kdt_row_col">
                                        <h4>Yêu cầu</h4>
                                        <div>{!! $tin->recruitment_requirements !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 kdt_col">
                            <div class="text-center kdt_company">
                                <a href="#"><img class="rounded-circle" src="{{asset('/'.$tin->enterprise_logo)}}" alt=""></a>
                                <p><a href="#"><strong>{{$tin->enterprise_name}}</strong></a></p>
                                <p>{{$tin->enterprise_describe}}</p>
                                <div class="">
                                    <a href="{{$tin->enterprise_web}}" class="btn border-secondary"><i class="fas fa-globe"></i> Website</a>
                                    <a href="{{$tin->enterprise_fanpage}}" class="btn border-secondary"><i class="fab fa-facebook"></i> Fanpage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop