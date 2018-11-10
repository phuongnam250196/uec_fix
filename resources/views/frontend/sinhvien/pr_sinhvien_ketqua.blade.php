@extends('frontend.master')
@section('title', 'Sinh viên | Kết quả ứng tuyển')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Danh sách kết quả ứng tuyển</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Danh sách kết quả</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th>Công ty</th>
                                    <th>Việc đã nộp</th>
                                    <th>Kết quả</th>
                                    <th>Ngày nhận</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody {{$dem=1}}>
                                @foreach($kqs as $kq)
                                <tr>
                                    <td class="text-center">{{$dem++}}</td>
                                    <td>{{$kq->enterprise_name}}</td>
                                    <td>{{$kq->recruitment_name}}</td>
                                    <td>@if($kq->active_work == 1) <label class='text-success'>Trúng tuyển  </label> @elseif($kq->active_work==2) <label class="text-danger">Bị loại</label> @else <label class="text-info">Đang chờ</label> @endif</td>
                                    <td>{{date_format($kq->updated_at, 'd-m-Y')}}</td>
                                    <td class="text-center"><a onclick="return confirm('Bạn có muốn xóa kết quả này không???')" href="{{url('student/result_del/'.$kq->id)}}"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-md-12 student-pgn">
                    <div class="row">
                        {{$kqs->links()}}
                    </div>
                </div>
                    <br>
            </div>
        </div>
    </div>
</section>
<br>
@stop