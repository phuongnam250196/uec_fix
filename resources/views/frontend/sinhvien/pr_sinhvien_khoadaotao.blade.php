@extends('frontend.master')
@section('title', 'Sinh viên | Khóa đào tạo')
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
                <div class="dieuhuong-doc-search">
                    <div class="row dieuhuong-doc-search-2">
                        <div class="col-md-4 dieuhuong-doc-search-2-col dieuhuong-doc-search-2-text">
                            <i class="fas fa-search"></i>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
                          </div>
                        </div>
                        <div class="col-md-3 dieuhuong-doc-search-2-col">
                            <div class="form-group">
                              <select class="form-control">
                                <option>Chọn ngành nghề</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3 dieuhuong-doc-search-2-col">
                            <div class="form-group">
                              <select class="form-control" id="sel1">
                                <option>Tỉnh/Thành phố</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2 dieuhuong-doc-search-2-col">
                          <div class="form-group">
                            <input type="submit" class="form-control" value="Tìm kiếm">
                          </div>
                        </div>
                    </div>
                    <div class="row dieuhuong-doc-search-info">
                        <div class="col-6 text-left">
                            <p>Tổng số việc hiện có <span class="text-success">240</span> vị trí</p>
                        </div>
                        <div class="col-6 text-right">
                            <p><a href="#">Mới nhất</a> | <a href="#">Hạn nộp hồ sơ</a></p>
                        </div>
                    </div>
                   
                </div>
                <div class="baiviet-post">
                    @foreach($kdts as $kdt)
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3 class="text-capitalize"><a href="{{url('student/khoadaotao/'.$kdt->id)}}"><strong>{{$kdt->training_name}}</strong></a></h3>
                                    <p class="text-secondary">{{$kdt->enterprise_name}} - {{$kdt->area_name}}</p>
                                </div>
                                <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Đã nộp <i class="fab fa-telegram-plane"></i></a> </p>
                                {{-- <p><a href="#">Đã lưu <i class="far fa-star"></i> </a></p> --}}
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row student-content">
                            <div class="col-md-10 student-content-col">
                                
                                <p class="noidung-post-x">{{$kdt->training_describe}}</p>
                                 <p class="time-up">Ngày bắt đầu: {{date("d/m/Y" ,strtotime($kdt->created_at))}}</p>
                            </div>
                            
                            
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="col-md-12 student-pgn">
                        <div class="row">
                            {{$kdts->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop