    @extends('frontend.master')
@section('title', 'GV | tìm kiếm')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.navbar.nav-teacher')
            </div>
            <div class="col-md-8 baiviet">
                <div class="dieuhuong-doc-search">
                    <h4>Tìm kiếm được (<strong class="text-success">{{$tintuc_count}}</strong>) tin</h4>
                </div>
                <div class="row nhatruong-row">
                    <div class="col-md-8 nhatruong-col-1">
                        <div class="baiviet-post">
                            @foreach($tintucs as $tin)
                            <div class="student">
                                <div class="student-title">
                                    <div class="row">
                                        <div class="col-md-9 student-title-h3">
                                            <h3><a href="{{url('/')}}">{{$tin->news_name}}</a></h3>
                                            {{-- <p>Bravebits - Hà Nội</p> --}}
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
                                        <div class="noidung-post-x teacher-col">
                                            {!! strip_tags(preg_replace("/<img[^>]+\>/i", "(image) ", $tin->news_content)) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="col-md-12 student-pgn">
                                <div class="row">
                                   {{$tintucs->links()}}
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4 nhatruong-col-2">
                        <div class="nhatruong-col-2-info">
                            <div class="nhatruong-r-title text-center">
                                <h4>danh sách lớp</h4>
                            </div>
                            <div class="nhatruong-r-content">
                                <ul>
                                    <li><a href="#">KHMT - TI27g1</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Toán ứng dụng - TM29g2</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">Truyền thông mạng MT - TC30e2</a> (<span class="badge">11</span>)</li>
                                    <li><a href="#">KHMT - TI21f2</a> (<span class="badge">11</span>)</li>
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