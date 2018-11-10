@extends('frontend.master')
@section('title', 'Sinh viên | Cập nhật thông tin')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.sinhvien.nav.nav-student')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật thông tin</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Cập nhật</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row update_info_student">
                        <div class="col-md-8">
                            <div class="form-group">
                              <label>Mã sinh viên</label>
                              <input type="text" class="form-control" disabled="" name="student_code" value="{{$studentInfo->student_code}}">
                            </div>
                            <div class="form-group">
                              <label>Họ và tên</label>
                              <input type="text" class="form-control" disabled name="student_name" value="{{$studentInfo->student_name}}">
                            </div>
                            <div class="form-group">
                              <label>Ngày sinh</label>
                              <input type="date" class="form-control" disabled name="student_birthday" value="{{$studentInfo->student_birthday}}">
                            </div>
                            <div class="form-group">
                              <label>Giới tính</label>
                              <input type="text" class="form-control" disabled name="student_gender" value="@if($studentInfo->student_gender == 0) Nam @else Nữ @endif">
                            </div>
                            <div class="form-group">
                              <label>Khoa</label>
                              <select class="custom-select form-control" name="science_id">
                                <option  value="">Chọn khoa</option>
                                @foreach($science as $sci)
                                  <option value="{{$sci->id}}" @if($sci->id == $studentInfo->science_id) selected @endif>{{$sci->science_name}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('science_id'))
                                <p class="help text-danger">{{ $errors->first('science_id') }}</p>
                              @endif
                            </div>
                            <div class="form-group">
                              <label>Chuyên ngành</label>
                              <select class="custom-select form-control" name="specialize_id">
                                <option  value="">Chọn chuyên ngành</option>
                                @foreach($specialize as $spe)
                                  <option value="{{$spe->id}}" @if($spe->id == $studentInfo->specialize_id) selected @endif>{{{$spe->specialize_name}}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('specialize_id'))
                                <p class="help text-danger">{{ $errors->first('specialize_id') }}</p>
                              @endif
                            </div>
                            <div class="row">
                              <div class="col-md-4 form-group">
                                <label>Khóa</label>
                                <select class="custom-select form-control" name="course_id">
                                  <option  value="">Chọn khóa</option>
                                  @foreach($course as $cours)
                                  <option value="{{$cours->id}}" @if($cours->id == $studentInfo->course_id) selected @endif>{{{$cours->course_name}}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                  <p class="help text-danger">{{ $errors->first('course_id') }}</p>
                                @endif
                              </div>
                              <div class="col-md-8 form-group">
                                <label>Lớp</label>
                                <select class="custom-select form-control" name="class_id">
                                  <option  value="">Chọn lớp</option>
                                  @foreach($class as $cl)
                                  <option value="{{$cl->id}}" @if($cl->id == $studentInfo->class_id) selected @endif>{{{$cl->class_name}}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('class_id'))
                                  <p class="help text-danger">{{ $errors->first('class_id') }}</p>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Giáo viên chủ nhiệm</label>
                              <select class="custom-select form-control" name="teacher_id">
                                  <option  value="">Chọn giáo viên</option>
                                  @foreach($teacher as $teach)
                                  <option value="{{$teach->id}}" @if($teach->id == $studentInfo->teacher_id) selected @endif>{{$teach->teacher_name}}</option>
                                  @endforeach
                                </select>
                              @if($errors->has('teacher_id'))
                                <p class="help text-danger">{{ $errors->first('teacher_id') }}</p>
                              @endif
                            </div>
                            <div class="form-group">
                              <label>Số điện thoại</label>
                              <input type="text" class="form-control" name="student_phone" value="{{$studentInfo->student_phone}}">
                              @if($errors->has('student_phone'))
                                <p class="help text-danger">{{ $errors->first('student_phone') }}</p>
                              @endif
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="student_email" value="{{$studentInfo->student_email}}">
                              @if($errors->has('student_email'))
                                <p class="help text-danger">{{ $errors->first('student_email') }}</p>
                              @endif
                            </div>
                            <div class="form-group">
                              <label>Địa chỉ hiện tại</label>
                              <input type="text" class="form-control" name="student_address" value="{{$studentInfo->student_address}}">
                              @if($errors->has('student_address'))
                                <p class="help text-danger">{{ $errors->first('student_address') }}</p>
                              @endif
                            </div>
                            <div class="form-group">
                              <label>Tỉnh/Thành phố</label>
                              <select class="custom-select form-control" name="area_id" >
                                <option value="">Chọn Tình/Thành phố</option>
                                @foreach($area as $are)
                                  <option value="{{$are->id}}" @if($are->id == $studentInfo->area_id) selected @endif>{{$are->area_name}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('area_id'))
                                <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                              @endif
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-outline-info">Cập nhật</button>
                            <a href="#" class="btn btn-outline-secondary">Hủy cập nhật</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Ảnh đại diện</label>
                              <input id="img" type="file" name="student_img" class="form-control" style="display: none" onchange="changeImg(this)" >
                              @if(!empty($studentInfo->student_img))
                                <img id="avatar" class="thumbnail" src="{{asset('../storage/app/sinhvien/'.$studentInfo->student_img)}}" width="100%">
                              @else
                                <img id="avatar" class="thumbnail" src="{{url('public/upload/images/new_seo-10-512.png')}}" width="100%">
                              @endif
                              @if($errors->has('student_img'))
                                <p class="help text-danger">{{ $errors->first('student_img') }}</p>
                              @endif
                            </div>
                        </div>
                      </div>
                      {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop