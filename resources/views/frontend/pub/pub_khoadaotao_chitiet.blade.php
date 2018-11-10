@extends('frontend.master')
@section('title', 'Khóa đào tạo')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item">Khóa đào tạo</li>
            <li class="breadcrumb-item active">{{$kdt->training_name}}</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="khoadaotao_public">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="khoadaotao_child">
                                <img class="card-img-top" src="{{asset('../storage/app/khoadaotao/'.$kdt->training_img)}}">
                            </div>
                            <br>
                            <div class="khoadaotao_child">
                                <h4 class="text-center text-uppercase">Khóa học liên quan</h4>
                                @foreach($kdts as $k)
                                <div class="media">
                                  <a href="{{url('/khoadaotao/'.$k->id)}}"><img src="{{asset('../storage/app/khoadaotao/'.$k->training_img)}}"></a>
                                  <div class="media-body">
                                    <p><a href="{{url('/khoadaotao/'.$k->id)}}">{{$k->training_name}}</a></p>
                                  </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="khoadaotao_child">
                                <div class="khoadaotao_title text-center ">
                                    <h1 class="text-uppercase">{{$kdt->training_name}}</h1>
                                    <p>Ngày đăng: {{date_format($kdt->created_at, 'd-m-Y')}}</p>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Số lượng tuyển:
                                    </div>
                                    <div class="col-lg-8">
                                        {{$kdt->training_amount_student}}
                                    </div>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Kĩ năng: 
                                    </div>
                                    <div class="col-lg-8">
                                        {{$skill->skill_name}}
                                    </div>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Khu vực:
                                    </div>
                                    <div class="col-lg-8">
                                        {{$area->area_name}}
                                    </div>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Thời gian khóa học:
                                    </div>
                                    <div class="col-lg-8">
                                        {{$kdt->training_timeserving}}
                                    </div>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Hạn nộp:
                                    </div>
                                    <div class="col-lg-8">
                                        {{$kdt->training_deadline}}
                                    </div>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Địa chỉ:
                                    </div>
                                    <div class="col-lg-8">
                                        {{$kdt->training_address}}
                                    </div>
                                </div>
                                <div class="khoadaotao_content row">
                                    <div class="col-lg-4">
                                        Mô tả:
                                    </div>
                                    <div class="col-lg-8">
                                        {!! $kdt->training_describe !!}
                                    </div>
                                </div>
                                
                                @if(!empty($enter->enterprise_name))
                                    <div class="khoadaotao_content row">
                                        <div class="col-lg-4">
                                            Doanh nghiệp:
                                        </div>
                                        <div class="col-lg-8">
                                            {{$enter->enterprise_name}}
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="khoadaotao_content">
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