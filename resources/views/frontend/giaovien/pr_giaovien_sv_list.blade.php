@extends('frontend.master')
@section('title', 'Danh sách sinh viên dựa trên lớp')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Danh sách sinh viên theo lớp</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('teacher')}}">Giáo viên</a></li>
                              <li class="breadcrumb-item active">Danh sách</li>
                            </ul>
                      </div>
                    </div>
                </div>
                

                <div class="row std_row">
                    <div class="col-md-12 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div id="accordion">
                              @foreach($class as $c)
                              <div class="card">
                                <div class="card-header" data-toggle="collapse" href="#{{$c->class_slug}}">
                                <strong class="text-uppercase"> Lớp {{$c->class_name}}</strong> 
                                </div>
                                <div id="{{$c->class_slug}}" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                    
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th>Mã sinh viên</th>
                                          <th>Họ tên</th>
                                          <th>Chuyên ngành</th>
                                          <th>Khoa</th>
                                          <th>Email</th>
                                          <th colspan="2">Tùy chọn</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($student as $t)
                                          @if($t->class_id == $c->id)
                                          <tr>
                                            <td>{{$t->student_code}}</td>
                                            <td>{{$t->student_name}}</td>
                                            <td>{{$t->specialize_id}}</td>
                                            <td>{{$t->science_id}}</td>
                                            <td>{{$t->student_email}}</td>
                                            <td><a href="{{url('teacher/edit_sv/'.$t->id)}}"><i class="fas fa-edit"></i></a></td>
                                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{url('teacher/delete_sv/'.$t->id)}}"><i class="fas fa-trash"></i></a></td>
                                          </tr>
                                          @endif
                                        @endforeach
                                      </tbody>
                                    </table>
                                      
                                  </div>
                                </div>
                              </div>
                              @endforeach
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