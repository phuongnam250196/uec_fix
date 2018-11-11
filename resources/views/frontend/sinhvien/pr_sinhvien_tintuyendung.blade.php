@extends('frontend.master')
@section('title', 'Sinh viên | Tin tuyển dụng')
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
                    <form method="GET" action="{{url('student/search')}}">
                        <div class="row dieuhuong-doc-search-2">
                            <div class="col-md-4 dieuhuong-doc-search-2-col dieuhuong-doc-search-2-text">
                                <i class="fas fa-search"></i>
                              <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
                              </div>
                            </div>
                            <div class="col-md-3 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                  <select class="form-control" name="career_id">
                                    <option value="">Chọn ngành nghề</option>
                                    @foreach($career as $ca)
                                        <option value="{{$ca->id}}">{{$ca->career_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3 dieuhuong-doc-search-2-col">
                                <div class="form-group">
                                  <select class="form-control" name="area_id">
                                    <option value="">Tỉnh/Thành phố</option>
                                    @foreach($area as $are)
                                        <option value="{{$are->id}}">{{$are->area_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-2 dieuhuong-doc-search-2-col">
                              <div class="form-group">
                                <input type="submit" class="form-control" value="Tìm kiếm">
                              </div>
                            </div>
                            {{csrf_field()}}
                        </div>
                        <div class="row dieuhuong-doc-search-info">
                            <div class="col-6 text-left">
                                <p>Tổng số việc hiện có <span class="text-success">{{$tintds->count()}}</span> vị trí</p>
                            </div>
                            {{-- <div class="col-6 text-right">
                                <p><a href="#">Mới nhất</a> | <a href="#">Hạn nộp hồ sơ</a></p>
                            </div> --}}
                        </div>
                    </form>
                </div>
                <div class="baiviet-post">
                    @foreach($tintds as $tintd)
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="{{url('student/tintuyendung/'.$tintd->id)}}"><strong>{{$tintd->recruitment_name}}</strong></a></h3>
                                    <p>{{{$tintd->enterprise_name}}} - {{$tintd->area_name}}</p>
                                </div>
                                <div class="col-md-2 student-time text-right">
                                    <p class="time-up">{{date("d/m/Y" ,strtotime($tintd->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row student-content">
                            <div class="col-md-3 student-content-col">
                                <img src="{{asset('/'.$tintd->recruitment_img)}}" style="width:100%; padding-top: 7px;" alt="">
                            </div>
                            <div class="col-md-7 student-content-col">
                                <div class="noidung-post-x">{!! $tintd->recruitment_describe !!}</div>
                            </div>
                            
                            {{-- <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                            </div> --}}
                        </div>
                    </div>
                    @endforeach
                   
                    <div class="col-md-12 student-pgn">
                        <div class="row">
                            {{$tintds->links()}}
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