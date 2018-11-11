@extends('frontend.master')
@section('title', 'Tìm việc')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tìm việc</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay doi tai day -->
                <div class="timviec">
                    <div class="row timviec-row">
                        @foreach($timviec as $tim)
                        <div class="timviec-col col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="hovereffect">
                                {{-- <img class="img-responsive" src="http://placehold.it/350x200" alt=""> --}}
                                <img class="img-responsive card-img-top" src="{{asset('/'.$tim->recruitment_img)}}">
                                <div class="overlay">
                                   <h2>{{$tim->recruitment_name}}</h2>
                                   <a class="info" href="{{url('timviec/'.$tim->id)}}">Xem chi tiết</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <br>
                <div class="baiviet-post" style="background: none;">
                    <div class="col-md-12 student-pgn">
                        <div class="row">
                            {{$timviec->links()}}
                        </div>
                    </div>
                </div>
                <!-- End thay đổi -->
            </div>
            <div class="col-md-4 nav-doc">
                @include('frontend.navbar.navPublic_doc')
            </div>
        </div>
    </div>
</section>
<br>
@stop