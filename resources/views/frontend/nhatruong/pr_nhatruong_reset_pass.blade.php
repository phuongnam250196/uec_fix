@extends('frontend.master')
@section('title', 'NT | Đổi mật khẩu')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Reset mật khẩu</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('/school')}}">Nhà trường</a></li>
                              <li class="breadcrumb-item active">Reset Mật khẩu</li>
                            </ul>
                      </div>
                    </div>
                </div>
                
                <div class="row std_row">
                    <div class="col-md-8 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div class="change_password">
                                @if(session('message'))
                                    <p class="help text-success">{{ session('message') }}</p>
                                @endif
                               <form method="POST">
                                  <div class="form-group">
                                    <label>Mã sinh viên</label>
                                    <input type="text" class="form-control" name="student_code" value="{{old('student_code')}}">
                                    @if($errors->has('student_code'))
                                      <p class="help text-danger">{{ $errors->first('student_code') }}</p>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                    <label>Mật khẩu reset</label>
                                    <input type="password" class="form-control" name="password">
                                    @if($errors->has('password'))
                                      <p class="help text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" name="password_2">
                                    @if($errors->has('password_2'))
                                      <p class="help text-danger">{{ $errors->first('password_2') }}</p>
                                    @endif
                                  </div>
                                  <button type="submit" class="btn btn-outline-info">Xác nhận</button>
                                  <a href="{{url('school/reset_password')}}" class="btn btn-outline-secondary">Hủy bỏ</a>
                                  {{csrf_field()}}
                                </form>
                           </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                          @if(!empty($school_id->school_logo))
                            <img style="width: 100%" src="{{asset('../storage/app/school/'.$school_id->school_logo)}}" alt="">
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