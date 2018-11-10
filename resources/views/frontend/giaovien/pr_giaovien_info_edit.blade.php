@extends('frontend.master')
@section('title', 'GV | Cập nhật thông tin')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật giáo viên</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('teacher')}}">Giáo viên</a></li>
                              <li class="breadcrumb-item active">Cập nhật</li>
                            </ul>
                      </div>
                    </div>
                </div>
                

                <div class="row std_row">
                    <div class="col-md-8 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div class="change_password">
                                <form method="POST">
                                  <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="teacher_name" value="{{$teach->teacher_name}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input type="text" class="form-control" name="teacher_birthday" value="{{$teach->teacher_birthday}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="teacher_email" value="{{$teach->teacher_email}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="teacher_phone" value="{{$teach->teacher_phone}}">
                                  </div>
                                   <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="teacher_address" value="{{$teach->teacher_address}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Khoa</label>
                                    <select class="custom-select form-control" name="science_id" >
                                      <option selected>Chọn khoa</option>
                                      @foreach($science as $scien)
                                        <option value="{{$scien->id}}" @if($scien->id == $teach->science_id) selected @endif>{{$scien->science_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('science_id'))
                                      <p class="help text-danger">{{ $errors->first('science_id') }}</p>
                                    @endif
                                  </div>
                                 
                                  <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <select class="custom-select form-control" name="area_id" >
                                      <option selected>Chọn Tình/Thành phố</option>
                                      @foreach($area as $are)
                                        <option value="{{$are->id}}" @if($are->id == $teach->area_id) selected @endif>{{$are->area_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('area_id'))
                                      <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                    @endif
                                  </div>
                                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                                  <a href="{{url('teacher/info')}}" class="btn btn-default">Hủy cập nhật</a>
                                  {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            <img onclick="a()"  style="width: 100%" src="{{asset('../storage/app/giaovien/'.$teach->teacher_img)}}">
                            <form class="up_img" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                  <input type="file" name="img" class="form-control" hidden>
                                </div>
                                <div class="form-group ">
                                  <button class="btn btn-outline-info" name="save" value="save" type="submit">Upload Image</button>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <script>
                                function a() {
                                    $('input[name="img"]').trigger('click');
                                }                            
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop