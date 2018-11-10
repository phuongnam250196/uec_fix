@extends('frontend.master')
@section('title', 'DN | Hồ sơ ứng tuyển')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Danh sách hồ sơ ứng tuyển</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">Danh sách</li>
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
                                    <th>Tin tuyển dụng</th>
                                    {{-- <th>Hồ sơ</th> --}}
                                    <th>Người nộp</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày nhận</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody {{$dem=1}}>
                                @foreach($cvs as $cv)
                                <tr>
                                    <td class="text-center">{{$dem++}}</td>
                                    <td>{{$cv->recruitment_name}}</td>
                                    {{-- <th>{{$cv->jobapplication_name}}</th> --}}
                                    <td><a href="{{url('enterprise/cv_detail/'.$cv->id)}}">{{$cv->student_name}}</a></td>
                                    <td>
                                        @if($cv->active_work == 0)
                                            <label class="text-info">Đang tuyển</label>
                                        @else
                                            @if($cv->active_work == 1)
                                                <label class="text-success">Trúng tuyển</label>
                                            @else
                                                <label class="text-danger">Bị loại</label>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{date_format($cv->created_at, 'd-m-Y')}}</td>
                                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hồ sơ này không???')" href="#"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-md-12 pr_dn_paginate">
                    <div class="row">
                        {{$cvs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop