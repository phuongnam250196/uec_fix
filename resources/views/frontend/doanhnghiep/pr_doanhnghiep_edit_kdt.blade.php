@extends('frontend.master')
@section('title', 'DN | Cập nhật khóa đào tạo')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Thêm mới khóa đào tạo</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">Thêm mới</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    <br>
                    <form class="pr_dn_ttd_form" method="post" enctype="multipart/form-data">
                        <div class="row pr_dn_add_ttd_row">
                             <div class="col-lg-4 pr_dn_add_col">
                                <div class="form-group" >
                                    <label>Ảnh khóa đào tạo</label>
                                    <input id="img" type="file" name="training_img" class="form-control" style="display: none" onchange="changeImg(this)" >
                                    <img id="avatar" class="thumbnail" src="{{url('../storage/app/khoadaotao/'.$train->training_img)}}" width="100%">
                                    @if($errors->has('training_img'))
                                      <p class="help text-danger">{{ $errors->first('training_img') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-8 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Tên khóa đào tạo</label>
                                    <input type="text" class="form-control" name="training_name" value="{{$train->training_name}}">
                                    @if($errors->has('training_name'))
                                      <p class="help text-danger">{{ $errors->first('training_name') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label>Số lượng học viên</label>
                                    <input type="number" class="form-control" name="training_amount_student" value="{{$train->training_amount_student}}">
                                    @if($errors->has('training_amount_student'))
                                      <p class="help text-danger">{{ $errors->first('training_amount_student') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Thời gian khóa học</label>
                                    <input type="number" class="form-control" name="training_timeserving" value="{{$train->training_timeserving}}" placeholder="VD: 3 (tháng)">
                                    @if($errors->has('training_timeserving'))
                                      <p class="help text-danger">{{ $errors->first('training_timeserving') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Hạn nộp</label>
                                    <input type="date" class="form-control" name="training_deadline" value="{{$train->training_deadline}}">
                                    @if($errors->has('training_deadline'))
                                      <p class="help text-danger">{{ $errors->first('training_deadline') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Địa điểm</label>
                                    <input type="text" class="form-control" name="training_address" value="{{$train->training_address}}">
                                    <input hidden type="text" name="enterprise_id" value="{{$en_id->enterprise_id}}" class="form-control">
                                    @if($errors->has('training_address'))
                                      <p class="help text-danger">{{ $errors->first('training_address') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Trình độ</label>
                                    <select name="skill_id" class="custom-select">
                                      <option selected value="">Chọn trình độ</option>
                                      @foreach($skill as $ski)
                                        <option value="{{$ski->id}}" @if($train->skill_id == $ski->id) selected @endif>{{$ski->skill_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('skill_id'))
                                      <p class="help text-danger">{{ $errors->first('skill_id') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <select name="area_id" class="custom-select">
                                      <option selected value="">Chọn tỉnh/thành phố</option>
                                      @foreach($area as $are)
                                        <option value="{{$are->id}}" @if($train->area_id == $are->id) selected @endif>{{$are->area_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('area_id'))
                                      <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mô tả khóa học</label>
                                    <textarea class="form-control ckeditor" rows="4" cols="0.5" name="training_describe">{{$train->training_describe}}</textarea>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                    <a href="{{url('enterprise/list_kdt')}}" class="btn btn-outline-secondary">Hủy bỏ</a>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop