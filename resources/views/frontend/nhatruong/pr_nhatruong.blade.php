
@extends('frontend.master')
@section('title', 'Nhà trường')
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
                
                <div class="row nhatruong-row">
                    <div class="col-md-8 nhatruong-col-1">
                        <div class="baiviet-post">
                            @foreach($tintuc as $tin)
                            <div class="student">
                                <div class="student-title">
                                    <div class="row">
                                        <div class="col-md-9 student-title-h3">
                                            <h3><a href="#">{{$tin->news_name}}</a></h3>
                                            <p>Bravebits - Hà Nội</p>
                                        </div>
                                        <div class="col-md-3 student-time text-right">
                                            <p class="time-up">{{date_format($tin->created_at, 'd-m-Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row student-content">
                                    <div class="col-md-4 student-content-col">
                                        <img src="{{asset('/'.$tin->news_img)}}" style="width:100%" alt="">
                                    </div>
                                    <div class="col-md-8 student-content-col">
                                        <p class="five-row">
                                            {!! strip_tags(preg_replace("/<img[^>]+\>/i", "(image) ", $tin->news_content)) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="student">
                                <div class="student-title">
                                    <div class="row">
                                        <div class="col-md-9 student-title-h3">
                                            <h3><a href="#">PHP Developer (Junior )</a></h3>
                                            <p>Bravebits - Hà Nội</p>
                                        </div>
                                        <div class="col-md-3 student-time text-right">
                                            <p class="time-up"><a href="#">13/05/2018</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 student-pgn">
                                <div class="row">
                                    {{$tintuc->links()}}
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4 nhatruong-col-2">
                        <div class="nhatruong-col-2-info">
                            <div class="nhatruong-r-title text-center">
                                <h4>danh sách tài khoản</h4>
                            </div>
                            <div class="nhatruong-r-content">
                                <ul>
                                    <li><a href="#">Ngôn ngữ Anh</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Toán - Tin ứng dụng</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Khoa học máy tính</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Mạng máy tính và viễn thông</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Hệ thống thông tin quản lý</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Kế toán</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Tài chính - Ngân hàng</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Quản trị Kinh doanh</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Ngôn ngữ Trung Quốc</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Ngôn ngữ Pháp</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Ngôn ngữ Nhật</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Việt Nam học</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Công tác Xã hội</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Điều dưỡng</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Y tế Công cộng</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Quản lý bệnh viện</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Quản lý Kinh doanh - Cao học</a></li>
                                    <li><a href="#">Tài chính Ngân hàng - Cao học</a></li>
                                    <li><a href="#">Toán - Cao học</a></li>
                                    <li><a href="#">Công tác Xã hội - Cao học</a></li>
                                    <li><a href="#">Y tế Công cộng - Cao học</a></li>
                                    <li><a href="#">Quản trị dịch vụ du lịch - Lữ hành</a></li>
                                    <li><a href="#">Ngành ngôn ngữ Hàn</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Thanh nhạc</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Dinh dưỡng</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Chưa xác định</a> (<span class="badge">11</span>)</li>
                                </ul>
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