@extends('frontend.master')
@section('title', 'NT | Cập nhật việc làm sinh viên')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật việc làm</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('/school')}}">Nhà trường</a></li>
                              <li class="breadcrumb-item active">Cập nhật</li>
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
                                  <label>Tên công việc</label>
                                  <input type="text" class="form-control" name="student_employment_name" value="{{old('student_employment_name')}}">
                                  @if($errors->has('student_employment_name'))
                                      <p class="help text-danger">{{ $errors->first('student_employment_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label>Chức vụ</label>
                                  <input type="text" class="form-control" name="student_company_position" value="{{old('  student_company_position')}}">
                                  @if($errors->has('student_company_position'))
                                      <p class="help text-danger">{{ $errors->first('student_company_position') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label>Thời gian làm</label>
                                  <input type="text" class="form-control" name="student_timeserving" value="{{old('student_timeserving')}}">
                                </div>
                                <div class="form-group">
                                  <label>Tên công ty</label>
                                  <input type="text" class="form-control" name="student_company_name" value="{{old('student_company_name')}}">
                                  @if($errors->has('student_company_name'))
                                      <p class="help text-danger">{{ $errors->first('student_company_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label>Địa chỉ công ty</label>
                                  <input type="text" class="form-control" name="student_company_address" value="{{old('student_company_address ')}}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                <a href="{{url('school/info')}}" class="btn btn-outline-secondary">Hủy bỏ</a>
                                {{csrf_field()}}
                              </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            <img onclick="a()"  style="width: 100%" src="{{asset('/'.$school->school_logo)}}">
                            <p class="text-center">TLU</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop