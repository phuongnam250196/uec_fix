@extends('frontend.master')
@section('title', 'GV | Thông tin')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.navbar.nav-teacher')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Thông tin</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('teacher')}}">Giáo viên</a></li>
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
                                    <p><strong>Tài khoản: </strong>{{$teach->user_name}} </p>
                                    <p><strong>Mật khẩu: </strong>*********** <a href="{{url('teacher/change_password')}}"><i class="fas fa-pencil-alt"></i> Đổi mật khẩu</a></p>
                                </div>
                            </div>
                            <br>
                            <div class="">
                                <h3 class="text-uppercase text-center">Thông tin cá nhân</h3>
                                <div class="">
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Họ và tên</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->teacher_name}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Ngày sinh</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->teacher_birthday}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Khoa:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->science_name}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Email:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->teacher_email}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Số điện thoại:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->teacher_phone}}</div>
                                    </div>

                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Địa chỉ:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->teacher_address}}</div>
                                    </div>
                                    <div class="row std_col_row">
                                        <div class="col-md-3">
                                            <p><strong>Tỉnh/TP:</strong></p>
                                        </div>
                                        <div class="col-md-9">{{$teach->area_name}}</div>
                                    </div>
                                    
                                    <br>
                                    <div class="text-center std_col_row">
                                        <a href="{{url('teacher/update_info')}}" class="btn btn-outline-primary">Cập nhật</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            @if(!empty($teach->teacher_img))
                                <img style="width: 100%" src="{{asset('/'.$teach->teacher_img)}}" alt="">
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