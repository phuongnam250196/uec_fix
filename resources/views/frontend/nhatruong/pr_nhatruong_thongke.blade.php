@extends('frontend.master')
@section('title', 'NT | Thống kê')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Báo cáo - Thống kê</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('school')}}">Nhà trường</a></li>
                              <li class="breadcrumb-item active">Tạo mới</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="dieuhuong-doc-search">
                    <form method="GET">
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
                                    <input type="text" class="form-control" placeholder="Tên sinh viên, Mã sinh viên" name="word">
                                </div>
                            </div>
                            <div class="col-md-3 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <select class="form-control" name="specialize_id">
                                        <option value="">Chuyên ngành</option>
                                        @foreach($specialize as $spe)
                                            <option value="{{$spe->id}}">{{$spe->specialize_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <input type="submit" class="form-control" value="Tìm">
                                </div>
                            </div>
                            <div class="col-md-1 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                    <input type="submit" class="form-control" value="Excel">
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                @if(!empty($reports))
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
                                <tbody>
                                    @foreach($reports as $key=>$report)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$report->student_code}}</td>
                                        <td>{{$report->student_name}}</td>
                                        <td>{{$report->student_birthday}}</td>
                                        <td>{{$report->Science->science_name}}</td>
                                        <td>{{$report->Specialize->specialize_name}}</td>
                                        <td>{{$report->Course->course_name}}</td>
                                        <td>{{$report->Class->class_name}}</td>
                                        <td>{{$report->student_phone}}</td>
                                        <td>{{$report->student_email}}</td>
                                        <td>{{$report->Teacher->teacher_name}}</td>
                                        <td>{{$report->student_address}}</td>
                                        <td>{{$report->Area->area_name}}</td>
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
                        {{$reports->links()}}
                    </div>
                </div> --}}
                @endif
            </div>
        </div>
    </div>
</section>
<br>
@stop