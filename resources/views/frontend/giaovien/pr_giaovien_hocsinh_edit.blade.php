@extends('frontend.master')
@section('title', 'Cập nhật thông tin sinh viên')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật sinh viên</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('teacher')}}">Giáo viên</a></li>
                              <li class="breadcrumb-item active">Cập nhật sinh viên</li>
                            </ul>
                      </div>
                    </div>
                </div>
                

                <div class="row std_row">
                    <div class="col-md-8 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div class="change_password">
                                <form method="POST">
                                   @if(session('success'))
                                        <div class="alert alert-success">{{session('success')}}</div>
                                    @endif
                                    <div class="form-group">
                                      <label>Nhập lớp</label>
                                      <select class="custom-select form-control change_class" name="class_id">
                                        <option selected value="">Chọn lớp</option>
                                        @foreach($class as $c)
                                          <option  value="{{$c->id}}" @if($student->class_id == $c->id) selected @endif>{{$c->class_name}}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('class_id'))
                                        <p class="help text-danger">{{ $errors->first('class_id') }}</p>
                                      @endif
                                    </div>
                                    <div class="">
                                      <div class="form-group">
                                        <label>Mã sinh viên</label>
                                        <input type="text" class="form-control" name="student_code" value="{{$student->student_code}}">
                                        @if($errors->has('student_code'))
                                          <p class="help text-danger">{{ $errors->first('student_code') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" class="form-control" name="student_name" value="{{$student->student_name}}">
                                        @if($errors->has('student_name'))
                                          <p class="help text-danger">{{ $errors->first('student_name') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" class="form-control" name="student_birthday" value="{{$student->student_birthday}}">
                                        @if($errors->has('student_birthday'))
                                          <p class="help text-danger">{{ $errors->first('student_birthday') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Giới tính</label>
                                        <select class="custom-select form-control" name="student_gender">
                                            <option selected value="">Chọn giới tính</option>
                                            <option  value="1" @if($student->student_gender == 1) selected @endif>Nam</option>
                                            <option  value="2" @if($student->student_gender == 2) selected @endif>Nữ</option>
                                          </select>
                                        @if($errors->has('student_gender'))
                                          <p class="help text-danger">{{ $errors->first('student_gender') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="number" class="form-control" name="student_phone" value="{{$student->student_phone}}">
                                        @if($errors->has('student_phone'))
                                          <p class="help text-danger">{{ $errors->first('student_phone') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="student_email" value="{{$student->student_email}}">
                                        @if($errors->has('student_email'))
                                          <p class="help text-danger">{{ $errors->first('student_email') }}</p>
                                        @endif
                                      </div>
                                      <div class="row">
                                        <div class="col-md-5 form-group">
                                          <label>Khóa</label>
                                          <select class="custom-select form-control" name="course_id">
                                            <option selected value="">Chọn khóa</option>
                                            @foreach($course as $cours)
                                            <option value="{{$cours->id}}" @if($cours->id == $student->course_id) selected @endif>{{{$cours->course_name}}}</option>
                                            @endforeach
                                          </select>
                                          @if($errors->has('course_id'))
                                            <p class="help text-danger">{{ $errors->first('course_id') }}</p>
                                          @endif
                                        </div>
                                        <div class="col-md-7 form-group">
                                          <label>Khoa</label>
                                            <select class="custom-select form-control" name="science_id">
                                              <option selected value="">Chọn khoa</option>
                                              @foreach($science as $sci)
                                                <option value="{{$sci->id}}" @if($sci->id == $student->science_id) selected @endif>{{$sci->science_name}}</option>
                                              @endforeach
                                            </select>
                                            @if($errors->has('science_id'))
                                              <p class="help text-danger">{{ $errors->first('science_id') }}</p>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Chuyên ngành</label>
                                        <select class="custom-select form-control" name="specialize_id">
                                          <option selected value="">Chọn chuyên ngành</option>
                                          @foreach($specialize as $spe)
                                            <option value="{{$spe->id}}" @if($spe->id == $student->specialize_id) selected @endif>{{{$spe->specialize_name}}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('specialize_id'))
                                          <p class="help text-danger">{{ $errors->first('specialize_id') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="custom-select form-control" name="area_id" >
                                          <option selected value="">Chọn Tình/Thành phố</option>
                                          @foreach($area as $are)
                                            <option value="{{$are->id}}" @if($are->id == $student->area_id) selected @endif>{{$are->area_name}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('area_id'))
                                          <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Địa chỉ hiện tại</label>
                                        <input type="text" class="form-control" name="student_address" value="{{$student->student_address}}">
                                        @if($errors->has('student_address'))
                                          <p class="help text-danger">{{ $errors->first('student_address') }}</p>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                          <label>Tên việc làm</label>
                                          <input type="text" class="form-control" name="student_employment_name" value="{{$student->student_employment_name}}">
                                      </div>
                                      <div class="form-group">
                                          <label>Chức vụ</label>
                                          
                                          <select class="custom-select form-control" name="position_id" >
                                            <option selected value="">Chọn chức vụ</option>
                                            @foreach($position as $are)
                                              <option value="{{$are->id}}" @if($are->id == $student->position_id) selected @endif>{{$are->position_name}}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" name="student_company_name" value="{{$student->student_company_name}}">
                                      </div>
                                      <div class="form-group">
                                        <label>Thời gian làm việc</label>
                                        <input type="text" class="form-control" name="student_timeserving" value="{{$student->student_timeserving}}">
                                      </div>
                                      <div class="form-group">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" name="student_company_address" value="{{$student->student_company_address}}">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                                      <a href="{{url('/teacher')}}" class="btn btn-default">Hủy cập nhật</a>
                                    </div>
                                      {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            {{-- <img onclick="a()"  style="width: 100%" src="{{asset('../storage/app/public/'.$data->enterprise_logo)}}"> --}}
                            {{-- <form class="up_img" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                  <input type="file" name="dn_logo" class="form-control" hidden>
                                </div>
                                <div class="form-group ">
                                  <button class="btn btn-outline-info" name="save" value="save" type="submit">Upload Image</button>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <script>
                                function a() {
                                    $('input[name="dn_logo"]').trigger('click');
                                }                            
                            </script> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop