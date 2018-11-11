@extends('frontend.master')
@section('title', 'Định hướng nghề nghiệp')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Định hướng nghề nghiệp</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="thongtinsinhvien">
                    <div class="thongtinsinhvien-main">
                        <div class="thongtinsinhvien-title">
                            <h1 class="thongtinsinhvien-title-exp">{{$dh_first->careerorientation_name}}</h1>
                        </div>
                        <div class="row thongtinsinhvien-row">
                            <div class="col-md-8 thongtinsinhvien-content">
                                {!! $dh_first->careerorientation_content !!}
                                <div class="dinhhuong-content-lienquan">

                                    <h5>Các sự kiện đã qua:</h5>
                                    @foreach($dh_other as $dh)
                                    <p><strong><a href="{{url('dinhhuongnghe/'.$dh->id)}}">{{$dh->careerorientation_name}}</a></strong></p>
                                    <div class="dinhhuong-content-lienquan-2">
                                        {{-- {!! $dh->careerorientation_content !!} --}}
                                        {!! strip_tags(preg_replace("/<img[^>]+\>/i", "(image) ", $dh->careerorientation_content)) !!}
                                    </div>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 thongtinsinhvien-img">
                                <img src="{{asset('/'.$dh_first->careerorientation_img)}}">
                                @foreach($dh_other as $dh)
                                    <img src="{{asset('/'.$dh->careerorientation_img)}}">
                                @endforeach
                            </div>
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