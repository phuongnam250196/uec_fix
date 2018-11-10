@extends('frontend.master')
@section('title', 'Thông tin doanh nghiệp')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')
<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item">Doanh nghiệp</li>
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
                                    <h1 class="pub_dn-col-title-h1">Doanh nghiệp liên kết với UEC</h1>
                                </div>
                                <div class="alert alert-primary pub_dn-col-sum">
                                  <p><strong>Danh sách doanh nghiệp </strong> <br>Có tổng số <strong>{{$count}}</strong> doanh nghiệp.</p> 
                                </div>
                                @foreach($enterprise_pub as $enter)
                                <div class="pub_dn-col-content">
                                    <div class="company-name">
                                        <h3 class="text-uppercase"><a href="{{url('/doanhnghiep/chitiet/'.$enter->id)}}">{{$enter->enterprise_full_name}}</a></h3>
                                        <hr>
                                    </div>
                                    <div class="row company-row">
                                        <div class="col-md-6 text-left">
                                            <p>Tỉnh/Thành phố: {{$enter->area_name}}</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <p>Ngày thành lập: {{date_format($enter->created_at, 'd-m-Y')}}</p>
                                        </div>
                                    </div>
                                    <div class="company-ab">
                                        <p>Địa chỉ: <strong>{{$enter->enterprise_address}}</strong></p>
                                        <p>Cập nhật: ({{$enter->updated_at}})</p>
                                        <p><i>Mô tả công ty: <strong>{!! strip_tags($enter->enterprise_describe) !!}</strong></i></p>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    {{$enterprise_pub->links()}}
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