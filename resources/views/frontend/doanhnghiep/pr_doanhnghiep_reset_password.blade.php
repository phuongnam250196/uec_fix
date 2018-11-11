@extends('frontend.master')
@section('title', 'Doanh nghiệp | Đổi mật khẩu')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Đổi mật khẩu</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">Đổi mật khẩu</li>
                            </ul>
                      </div>
                    </div>
                </div>
                
                <div class="row std_row">
                    <div class="col-md-8 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div class="change_password">
                                @if(session('success'))
                                    <p class="help text-success">{{ session('success') }}</p>
                                @endif
                                 @if(session('err'))
                                    <p class="help text-danger">{{ session('err') }}</p>
                                @endif
                               <form method="POST">
                                  <div class="form-group">
                                    <label>Mật khẩu cũ</label>
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                                    @if($errors->has('password'))
                                      <p class="help text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="new_pass">
                                    @if($errors->has('new_pass'))
                                      <p class="help text-danger">{{ $errors->first('new_pass') }}</p>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                    <label>Xác nhận mật khẩu mới</label>
                                    <input type="password" class="form-control" name="new_pass_2">
                                    @if($errors->has('new_pass_2'))
                                      <p class="help text-danger">{{ $errors->first('new_pass_2') }}</p>
                                    @endif
                                  </div>
                                  <button type="submit" class="btn btn-outline-info">Xác nhận</button>
                                  <a href="{{url('enterprise/info')}}" class="btn btn-outline-secondary">Hủy bỏ</a>
                                  {{csrf_field()}}
                                </form>
                           </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            <img onclick="a()"  style="width: 100%" src="{{asset('/'.$data->enterprise_logo)}}">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop