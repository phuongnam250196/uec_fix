@extends('frontend.master')
@section('title', 'NT | Danh sách sinh viên')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Thông tin trường</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('school')}}">Nhà trường</a></li>
                              <li class="breadcrumb-item active">Thông tin</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Mã sinh viên</th>
                                    <th>Họ tên</th>
                                    <th>Khoa</th>
                                    <th>Chuyên ngành</th>
                                    <th colspan="2">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody {{$dem = 1}}>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="text-center">{{$dem++}}</td>
                                        <td>{{$student->student_code}}</td>
                                        <td class="text-center">{{$student->student_name}}</td>
                                        <td>{{$student->science_name}}</td>
                                        <td>{{$student->specialize_name}}</td>
                                        <td class="text-center"><a href="{{url('school/update_student/'.$student->id)}}"><i class="fas fa-edit"></i></a></td>
                                        <td class="text-center"><a onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không???')" href="{{url('school/del_student/'.$student->id)}}"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                     <div class="col-md-12 student-pgn">
                        <div class="row">
                            {{$students->links()}}
                        </div>
                    </div>
                    <br>
                </div>
                <br>
                
            </div>
        </div>
    </div>
</section>
<br>
@stop