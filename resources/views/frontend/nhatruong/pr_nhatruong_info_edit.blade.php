@extends('frontend.master')
@section('title', 'NT | Cập nhật thông tin')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật nhà trường</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('school')}}">Nhà trường</a></li>
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
                                  <label>Mã trường</label>
                                  <input type="text" class="form-control" name="school_code" value="{{$school->school_code}}">
                                </div>
                                <div class="form-group">
                                  <label>Tên trường</label>
                                  <input type="text" class="form-control" name="school_name" value="{{$school->school_name}}">
                                </div>
                                <div class="form-group">
                                  <label>Số điện thoại</label>
                                  <input type="text" class="form-control" name="school_phone" value="{{$school->school_phone}}">
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" name="school_email" value="{{$school->school_email}}">
                                </div>
                                <div class="form-group">
                                  <label>Địa chỉ</label>
                                  <input type="text" class="form-control" name="school_address" value="{{$school->school_address}}">
                                </div>
                                <div class="form-group">
                                  <label>Website</label>
                                  <input type="text" class="form-control" name="school_web" value="{{$school->school_web}}">
                                </div>
                                <div class="form-group">
                                  <label>Mô tả</label>
                                  <textarea class="form-control ckeditor" name="school_describe" rows="4">{{$school->school_describe}}</textarea>
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