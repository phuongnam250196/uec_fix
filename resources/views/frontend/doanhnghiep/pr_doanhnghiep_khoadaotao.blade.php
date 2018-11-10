@extends('frontend.master')
@section('title', 'DN | Khóa đào tạo')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Danh sách khóa đào tạo</strong></h1></div>
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
                    <div class="pr_dn_ttd-title">
                        <a href="{{url('enterprise/add_kdt')}}" class="btn btn-outline-primary">Thêm mới</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên khóa đào tạo</th>
                                    <th>Trình độ</th>
                                    <th>Ngày tạo</th>
                                    <th colspan="2" class="text-center">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($training as $train)
                                <tr>
                                    <td class="text-center">{{$train->id}}</td>
                                    <td><a href="{{url('enterprise/detail_kdt/'.$train->id)}}">{{$train->training_name}}</a></td>
                                    <td>
                                        @foreach($skill as $s)
                                            @if($train->skill_id == $s->id) 
                                                {{$s->skill_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{date_format($train->created_at, 'd-m-Y')}}</td>
                                    <td class="text-center"><a href="{{url('enterprise/edit_kdt/'.$train->id)}}"><i class="fas fa-edit"></i></a></td>
                                    <td class="text-center"><a href="{{url('enterprise/delete_kdt/'.$train->id)}}" onclick="return confirm('Bạn có chắc muốn xóa khóa đào tạo này không???')"><i class="fas fa-trash"></i></a></td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-md-12 pr_dn_paginate">
                    <div class="row">
                        {{$training->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop