@extends('frontend.master')
@section('title', 'Liên hệ')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="breadcrumb-item active">Liên hệ</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <div class="thongtinsinhvien">
                    <div class="thongtinsinhvien-main">
                        <div class="thongtinsinhvien-title">
                            <h1 class="thongtinsinhvien-title-exp">Liên hệ với chúng tôi</h1>
                        </div>
                        <div class="row lienhe-row">
                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14900.652023262268!2d105.82022!3d20.986102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x89435a3528118ff5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaMSDbmcgTG9uZw!5e0!3m2!1svi!2sus!4v1538720450335" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6">
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="email" name="" class="form-control" placeholder="Lê Thị A">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" placeholder="abc@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <select id="country" class="form-control" name="country">
                                            <option value="australia">Bạn là ai ?</option>
                                            <option value="canada">Sinh viên</option>
                                            <option value="usa">Giáo viên</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Nội dung</label>
                                        <textarea id="subject" class="form-control" name="subject" placeholder="Tôi muốn tìm hiểu về..." style="height:170px"></textarea>
                                    </div>
                                    <input class="btn btn-outline-primary" type="submit" value="Gửi yêu cầu">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 nav-doc">
                @include('frontend.navbar.navPublic_doc')
            </div>
        </div>
    </div>
</section>
<br>
@stop