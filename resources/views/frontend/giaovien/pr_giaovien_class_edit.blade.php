@extends('frontend.master')
@section('title', 'Cập nhật thông tin lớp')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Cập nhật lớp</strong></h1></div>
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
                                   @if(session('message'))
                                        <div class="alert alert-success">{{session('message')}}</div>
                                    @endif
                                    <div class="form-group">
                                      <label>Tên lớp</label>
                                      <input type="text" class="form-control" name="class_name" value="{{$class->class_name}}">
                                      @if($errors->has('class_name'))
                                        <p class="help text-danger">{{ $errors->first('class_name') }}</p>
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Mô tả lớp</label>
                                      <textarea name="class_describe" class="form-control ckeditor" cols="30" rows="10">{!! $class->class_describe!!}</textarea>
                                      @if($errors->has('class_describe'))
                                        <p class="help text-danger">{{ $errors->first('class_describe') }}</p>
                                      @endif
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                           <ul class="list-group">
                              <li class="list-group-item"><h4>Danh sách lớp</h4></li>
                              @foreach($classes as $class)
                                <li class="list-group-item">{{$class->class_name}} <a href="{{url('teacher/class/edit/'.$class->id)}}" class="btn"><i class="fas fa-check"></i></a><a onclick="return confirm('Bạn có chắc chắn muỗn xóa không?')" href="{{url('teacher/class/delete/'.$class->id)}}" class="btn"><i class="fas fa-times"></i></a></li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop