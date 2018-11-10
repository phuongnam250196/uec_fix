@extends('frontend.master')
@section('title', 'Sinh viên | Thêm mới CV')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Thêm mới CV</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Tạo CV</li>
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
                                <form  method="post">
                                    <div class="form-group">
                                        <label>Vị trí mong muốn</label>
                                        <input type="text" class="form-control" name="jobapplication_name" value="{{old('jobapplication_name')}}">
                                        @if($errors->has('jobapplication_name'))
                                            <p class="help text-danger">{{ $errors->first('jobapplication_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Lương</label>
                                        <input type="text" class="form-control" name="jobapplication_salary" value="{{old('jobapplication_salary')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngành nghề</label>
                                        <select name="career_id" class="custom-select">
                                          <option selected value="">Chọn ngành nghề</option>
                                          @foreach($career as $caree)
                                            <option value="{{$caree->id}}">{{$caree->career_name}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('career_id'))
                                            <p class="help text-danger">{{ $errors->first('career_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Địa điểm làm việc</label>
                                        <select name="area_id" class="custom-select">
                                          <option selected value="">Chọn Tỉnh/Thành phố</option>
                                          @foreach($area as $are)
                                            <option value="{{$are->id}}">{{$are->area_name}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('area_id'))
                                            <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Trình độ học vấn</label>
                                        <select name="education_id" class="custom-select">
                                          <option selected value="">Chọn bằng cấp cao nhất</option>
                                          @foreach($education as $edu)
                                            <option value="{{$edu->id}}">{{$edu->education_name}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('education_id'))
                                            <p class="help text-danger">{{ $errors->first('education_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Số năm kinh nghiệm</label>
                                        <select name="yearofexp_id" class="custom-select">
                                          <option selected value="">Chọn số năm kinh nghiệm</option>
                                          @foreach($yearofexp as $year)
                                            <option value="{{$year->id}}">{{$year->yearofexp_name}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('yearofexp_id'))
                                            <p class="help text-danger">{{ $errors->first('yearofexp_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Hình thức làm việc</label>
                                        <select name="formality_id" class="custom-select">
                                          <option selected value="">Chọn hình thức làm việc</option>
                                          @foreach($formality as $form)
                                          <option value="{{$form->id}}">{{$form->formality_name}}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('formality_id'))
                                            <p class="help text-danger">{{ $errors->first('formality_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mục tiêu nghề nghiệp</label>
                                        <textarea class="form-control ckeditor" rows="4" cols="0.5" name="jobapplication_purpose">{{old('jobapplication_purpose')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                                        <a href="{{url('student/cv')}}" class="btn btn-default">Hủy bỏ</a>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                           </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                          @if(!empty($userImg->student_img))
                              <img style="width: 100%" src="{{asset('../storage/app/sinhvien/'.$userImg->student_img)}}" alt="">
                              {{-- <p>{{$userImg->student_img}}</p> --}}
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