@extends('frontend.master')
@section('title', 'Trang chủ')
@section('banner')
    @include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc order-2 order-md-1">
                <nav class="nav-child">
                    <div class="nav-child-title text-center">
                        <h3>Bài viết mới nhất</h3>
                    </div>
                    <ul>
                        @foreach(bai_viet_new() as $bv_new)
                        <li>
                            <a href="{{url('baiviet/'.$bv_new->id)}}">{{$bv_new->news_name}}</a>
                            <p>{{date_format($bv_new->created_at, 'd/m/Y')}}</p>
                        </li>
                        @endforeach
                        
                    </ul>
                </nav> 
                
                <nav class="nav-child" >
                    <div class="nav-child-title text-center">
                        <h3>Sự kiện gần nhất</h3>
                    </div>
                    <ul>
                        @foreach(su_kien_new() as $sk_new)
                        <li>
                            <a href="{{url('/jobfair/'.$sk_new->id)}}">{{$sk_new->jobfair_name}}</a>
                            <p>{{date_format($sk_new->created_at, 'd/m/Y')}}</p>
                        </li>
                        @endforeach
                    </ul>
                </nav> 
        
                <nav class="nav-child">
                    <div class="nav-child-title text-center">
                        <h3>Liên hệ</h3>
                    </div>
                    <ul>
                        <li>
                            <a href="{{url('/dangnhap')}}">Login</a>
                        </li>
                        <li>
                            <a href="{{url('/doanhnghiep')}}">Doanh nghiệp mới</a>
                        </li>
                        <li>
                            <a href="{{url('/timviec')}}">Việc làm mới</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-md-8 baiviet order-1 order-md-2">
                <div class="baiviet-post">
                    <p class="post">Bài viết</p>
                    <div class="">
                        @foreach($news as $new2)
                        <div class="post-child">
                            <h3><a href="{{url('baiviet/'.$new2->id)}}">{{$new2->news_name}}</a></h3>
                            <p class="time-up">{{$new2->created_at}}</p>
                            <div class="x">
                                <img src="{{asset('/'.$new2->news_img)}}" alt="">
                                <div class="noidung-post-x">
                                    {!! strip_tags(preg_replace("/<img[^>]+\>/i", "(image) ", $new2->news_content)) !!}
                                </div>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                            
                           
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 student-pgn">
                        <div class="row">
                            {{$news->links()}}
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