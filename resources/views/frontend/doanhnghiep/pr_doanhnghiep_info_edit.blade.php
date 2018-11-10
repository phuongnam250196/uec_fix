@extends('frontend.master')
@section('title', 'Doanh nghiệp | Cập nhật thông tin')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật doanh nghiệp</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
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
                                    <label>Tên doanh nghiệp</label>
                                    <input type="text" class="form-control" name="enterprise_full_name" value="{{$data->enterprise_full_name}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Tên giao dịch</label>
                                    <input type="text" class="form-control" name="enterprise_name" value="{{$data->enterprise_name}}">
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-lg-6">
                                      <label>Quy mô</label>
                                      <input type="number" class="form-control" name="enterprise_size" value="{{$data->enterprise_size}}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                      <label>Mã số thuê</label>
                                      <input type="number" class="form-control" name="enterprise_tax_code" value="{{$data->enterprise_tax_code}}">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="enterprise_email" value="{{$data->enterprise_size}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="number" class="form-control" name="enterprise_phone" value="{{$data->enterprise_size}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="enterprise_web" value="{{$data->enterprise_web}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Fanpage</label>
                                    <input type="text" class="form-control" name="enterprise_fanpage" value="{{$data->enterprise_fanpage}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="enterprise_address" value="{{$data->enterprise_address}}">
                                  </div>
                                  <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <select name="area_id" class="custom-select" name="area_id">
                                      <option selected value="">Chọn tỉnh/thành phố</option>
                                      @foreach($area as $are)
                                        <option value="{{$are->id}}" @if($are->id == $data->area_id) selected @endif>{{$are->area_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('area_id'))
                                      <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                    <label>Giới thiệu doanh nghiệp</label>
                                    <textarea name="enterprise_describe" class="form-control ckeditor" cols="30" rows="3">{{$data->enterprise_describe}}</textarea>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                  <a href="{{url('enterprise/info/'.Auth::id())}}" class="btn btn-outline-secondary">Hủy bỏ</a>
                                  {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                            <img onclick="a()"  style="width: 100%" src="{{asset('../storage/app/public/'.$data->enterprise_logo)}}">
                            <form class="up_img" enctype="multipart/form-data" method="POST">
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