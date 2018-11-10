@extends('frontend.master')
@section('title', 'Sinh viên | Cập nhật việc làm')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật việc làm</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Việc làm</li>
                            </ul>
                      </div>
                    </div>
                </div>
                
                <div class="khoa_dao_tao">
                    <div class="row kdt_row">
                        <div class="col-md-8 kdt_col">
                          <form method="POST">
                            <div class="update_congviec" style="background: white;">
                              <div class="form-group">
                                <label>Tên việc làm</label>
                                <input type="text" class="form-control" name="student_employment_name" value="{{$studentWork->student_employment_name}}">
                                @if($errors->has('student_employment_name'))
                                  <p class="help text-danger">{{ $errors->first('student_employment_name') }}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label>Chức vụ</label>
                                <select class="custom-select form-control" name="position_id">
                                  <option  value="">Chọn chức vụ</option>
                                  @foreach($position as $pos)
                                  <option value="{{$pos->id}}" @if($pos->id == $studentWork->position_id) selected @endif>{{{$pos->position_name}}}</option>
                                  @endforeach
                                </select>
                                @if($errors->has('position_id'))
                                  <p class="help text-danger">{{ $errors->first('position_id') }}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label>Tên công ty</label>
                                <input type="text" class="form-control" name="student_company_name" value="{{$studentWork->student_company_name}}">
                                @if($errors->has('student_company_name'))
                                  <p class="help text-danger">{{ $errors->first('student_company_name') }}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label>Thời gian làm việc</label>
                                <input type="text" class="form-control" name="student_timeserving" value="{{$studentWork->student_timeserving}}">
                                @if($errors->has('student_timeserving'))
                                  <p class="help text-danger">{{ $errors->first('student_timeserving') }}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label>Địa chỉ công ty</label>
                                <input type="text" class="form-control" name="student_company_address" value="{{$studentWork->student_company_address}}">
                              </div>
                              <br>
                              <div class="text-center">
                                <button type="submit" class="btn btn-outline-info">Cập nhật</button>
                                <a href="{{url('student/info')}}" class="btn btn-outline-secondary">Hủy cập nhật</a>
                              </div>
                            </div>
                            {{csrf_field()}}
                          </form>
                        </div>
                        <div class="col-md-4 kdt_col">
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
    </div>
</section>
<br>
@stop