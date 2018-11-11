@extends('frontend.master')
@section('title', 'NT | Thông tin')
@section('style')

@endsection
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.navbar.nav-school')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Thông tin</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('school')}}">Nhà trường</a></li>
                              <li class="breadcrumb-item active">Thông tin</li>
                            </ul>
                      </div>
                    </div>
                </div>
                

                <div class="row std_row">
                    <div class="col-md-8 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div class="">
                                <h3 class="text-uppercase text-center">Thông tin tài khoản</h3>
                                <div class="std_col_row">
                                    <p><strong>Tài khoản: </strong>{{$data->user_name}} </p>
                                    <p><strong>Mật khẩu: </strong>*********** <a href="{{url('school/change_password')}}"><i class="fas fa-pencil-alt"></i> Đổi mật khẩu</a></p>
                                </div>
                            </div>
                            <br>
                            <div class="">
                                <h3 class="text-uppercase text-center">Thông tin trường</h3>
                                <div class="">
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Mã trường:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$data->school_code}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Tên trường:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$data->school_name}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Địa chỉ:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$data->school_address}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Số điện thoại:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$data->school_phone}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Email:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$data->school_email}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Website:</strong></p>
                                        </div>
                                        <div class="col-md-9"><a href="{{$data->school_web}}" target="_blank">{{$data->school_web}}</a></div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Mô tả trường: </strong></p>
                                        </div>
                                        <div class="col-md-9">{!!$data->school_describe!!}</div>
                                    </div>
                                    <br>
                                    <div class="text-center std_col_row">
                                        <a href="{{url('school/update_info')}}" class="btn btn-outline-primary">Cập nhật</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            @if(!empty($school_id->school_logo))
                                <img style="width: 100%" src="{{asset('/'.$school_id->school_logo)}}" alt="">
                                @else
                                <p class="text-center p-5"><i class="fas fa-user-circle fa-10x text-blue"></i></p>
                              @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop