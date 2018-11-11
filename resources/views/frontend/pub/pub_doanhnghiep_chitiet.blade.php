@extends('frontend.master')
@section('title', 'Chi tiết doanh nghiệp')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('/doanhnghiep')}}">Doanh nghiệp</a></li>
            <li class="breadcrumb-item active">{{$enterp->enterprise_name}}</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="pub_dn">
                    <div class="row pub_dn-row">
                        <div class="col-md-3 pub_dn-col">
                            <div class="pub_dn-col-info">
                                <img src="images/brave.jpg" style="width: 100%">
                            </div>
                            <br>
                            <div class="pub_dn-col-info-content">
                                <ul>
                                    @foreach($area as $are)
                                    <li>
                                        <div class="d-flex">
                                            <div><a href="{{url('/doanhnghiep/'.$are->area_slug)}}">{{$are->area_name}}</a></div>
                                            {{-- <div class="ml-auto"><span class="badge badge-primary">11</span></div> --}}
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 pub_dn-col">
                            <div class="pub_dn-col-ab">
                                <div class="pub_dn-col-title">
                                    <h1 class="pub_dn-col-title-h1">{{$enterp->enterprise_name}}</h1>
                                </div>
                                <div class="pub_dn-col-content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img style="width: 100%" src="{{url('/'.$enterp->enterprise_logo)}}" alt="">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="">
                                                <p>Tỉnh/Thành phố: {{$area_e->area_name}}</p> 
                                                <p>Số lượng thành viên: {{$enterp->enterprise_size}} người</p> 
                                                <p>Email: {{$enterp->enterprise_email}}</p> 
                                                <p>Địa chỉ: {{$enterp->enterprise_address}}</p> 
                                                <p>Số điện thoại: {{$enterp->enterprise_phone}}</p>
                                                <p>website: {{$enterp->enterprise_web}}</p>
                                                <p>Fanpage: {{$enterp->enterprise_fanpage}}</p>
                                                <p>Miêu tả: {!! $enterp->enterprise_describe !!}</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                
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