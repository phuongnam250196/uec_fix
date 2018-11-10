@extends('frontend.master')
@section('title', 'Khóa đào tạo')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Khóa đào tạo</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="timviec">
                    <div class="row timviec-row">
                        @foreach($kdts as $kdt)
                            <div class="timviec-col-2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="hovereffect">
                                        <img class="card-img-top" src="{{asset('../storage/app/khoadaotao/'.$kdt->training_img)}}">
                                        <div class="overlay">
                                           <h2>{{$kdt->training_name}}</h2>
                                           <a class="info" href="{{url('khoadaotao/'.$kdt->id)}}">link here</a>
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
                            {{$kdts->links()}}
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