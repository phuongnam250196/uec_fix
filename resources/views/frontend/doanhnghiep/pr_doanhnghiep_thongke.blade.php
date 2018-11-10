@extends('frontend.master')
@section('title', 'DN | Thống kê')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Báo cáo - Thống kê</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">Thống kê</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="dieuhuong-doc-search">
                    <form action="{{url('/enterprise/report')}}" method="GET">
                        <div class="row dieuhuong-doc-search-2">
                            <div class="col-md-2 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <select class="form-control" name="order_by">
                                        <option value="asc">Tăng</option>
                                        <option value="desc">Giảm</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="col-md-5 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <select class="form-control" name="recruitment_id">
                                        <option value="">Tên việc</option>
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}">{{$job->recruitment_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <select class="form-control" name="area_id">
                                        <option>Tỉnh/Thành phố</option>
                                        @foreach($area as $are)
                                            <option value="{{$are->id}}">{{$are->area_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <input type="submit" class="form-control" value="Tìm">
                                </div>
                            </div>
                            {{-- <div class="col-md-1 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <input type="submit" class="form-control" value="Excel">
                                </div>
                            </div> --}}
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="baiviet-post">
                    <div class="tt-thongked">
                        <div class="table-responsive">
                            <table class="table table-hover" style="width: 2000px;">
                                <thead>
                                    <tr>
                                        <th width="20">ID</th>
                                        <th>Mã sinh viên</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Khoa</th>
                                        <th>Chuyên ngành</th>
                                        <th>Khóa</th>
                                        <th>Lớp</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Giáo viên</th>
                                        <th>Địa chỉ</th>
                                        <th>Tỉnh/thành phố</th>
                                    </tr>
                                </thead>
                                <tbody {{$dem=1}}>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$dem++}}</td>
                                        <td>{{$student->student_code}}</td>
                                        <td>{{$student->student_name}}</td>
                                        <td>{{$student->student_birthday}}</td>
                                        <td>{{$student->science_id}}</td>
                                        <td>{{$student->specialize_id}}</td>
                                        <td>{{$student->course_id}}</td>
                                        <td>{{$student->class_id}}</td>
                                        <td>{{$student->student_phone}}</td>
                                        <td>{{$student->student_email}}</td>
                                        <td>{{$student->teacher_id}}</td>
                                        <td>{{$student->student_address}}</td>
                                        <td>{{$student->area_id}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                {{-- <div class="col-md-12 pr_dn_paginate">
                    <div class="row">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
</section>
<br>
@stop