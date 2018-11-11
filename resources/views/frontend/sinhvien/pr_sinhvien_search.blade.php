@extends('frontend.master')
@section('title', 'Sinh viên | Tìm kiếm')
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
                
                <div class="baiviet-post">
                    @foreach($tintds as $tintd)
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="{{url('student/tintuyendung/'.$tintd->id)}}"><strong>{{$tintd->recruitment_name}}</strong></a></h3>
                                    <p>
                                        @foreach($enterprise as $en)
                                            @if($en->id == $tintd->enterprise_id)
                                                {{$en->enterprise_name}}
                                            @endif
                                        @endforeach
                                         - 
                                         @foreach($area as $are)
                                            @if($are->id == $tintd->area_id)
                                                {{$are->area_name}}
                                            @endif
                                        @endforeach
                                    </p>

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
                                <p class="noidung-post-x">{{$tintd->recruitment_describe}}</p>
                            </div>
                            
                            <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                            </div>
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