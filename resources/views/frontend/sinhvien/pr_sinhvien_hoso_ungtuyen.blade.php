@extends('frontend.master')
@section('title', 'Sinh viên | CV')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Hồ sơ của tôi</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Danh sách CV</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    <div class="pr_dn_ttd-title">
                        @if($count < 1)
                            <a href="{{url('student/add_cv')}}" class="btn btn-outline-primary">Thêm mới</a>
                            <p class="pl-3">Bạn chưa có hồ sơ. Làm ơn cập nhật hồ sơ để xin việc.</p>
                        @else
                            @if(!empty($cv->id))
                            <a href="{{url('student/edit_cv/'.$cv->id)}}" class="btn btn-outline-primary">Cập nhật</a>
                            @endif
                        @endif
                    </div>
                    <br>
                    @if(!empty($cv->id))
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Thông tin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID hoso</td>
                                    <td>{{$cv->id}}</td>
                                </tr>
                                <tr>
                                    <td>Tên hồ sơ</td>
                                    <td>{{$cv->jobapplication_name}}</td>
                                </tr>
                                <tr>
                                    <td>Lương</td>
                                    <td>{{$cv->jobapplication_salary}}</td>
                                </tr>
                                <tr>
                                    <td>Ngành nghề</td>
                                    <td>{{$cv->career_name}}</td>
                                </tr>
                                <tr>
                                    <td>Bằng cấp</td>
                                    <td>{{$cv->education_name}}</td>
                                </tr>
                                <tr>
                                    <td>Năm kinh nghiệm</td>
                                    <td>{{$cv->yearofexp_name}}</td>
                                </tr>
                                <tr>
                                    <td>Hình thức</td>
                                    <td>{{$cv->formality_name}}</td>
                                </tr>
                                <tr>
                                    <td>Tỉnh/Thành phố</td>
                                    <td>{{$cv->area_name}}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td>{!! $cv->jobapplication_purpose !!}</td>
                                </tr>
                                <tr>
                                    <td>Người lập hồ sơ</td>
                                    <td>{{$cv->student_name}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop