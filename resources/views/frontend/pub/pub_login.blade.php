@extends('frontend.master')
@section('title', 'Login')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc order-md-1 order-2">
                <nav class="nav-child">
                    <div class="nav-child-title text-center">
                        <h3>Bài viết mới nhất</h3>
                    </div>
                    <ul>
                        @foreach(bai_viet_new() as $bv_new)
                        <li>
                            <a href="{{url('/baiviet/'.$bv_new->id)}}">{{$bv_new->news_name}}</a>
                            <p>{{date_format($bv_new->created_at, 'd/m/Y')}}</p>
                        </li>
                        @endforeach
                        
                    </ul>
                </nav> 
            </div>
            <div class="col-md-8 baiviet order-1 order-md-2">
                <!-- Thay đổi tại đây -->
                <div class="thongtinsinhvien">
                    <section class="breadcrumb-link">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Login</li>
                        </ul>
                    </section>
                    <div class="thongtinsinhvien-main">
                        <div class="login-content offset-lg-2 col-lg-8">
                            <div class="login-title text-center">
                                <h1 class="login-title-exp">đăng nhập</h1>
                                <br>
                                <p>Trang đăng nhập vào tài khoản của bạn trên <br> tài khoản được cấp</p>
                                <hr>
                                <br>
                            </div>
                            @include('errors.note')
                            <form method="post">
                                
                                <div class="form-group">
                                    <label>Tài khoản</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="fa fa-user fa-2x"></span>
                                        </div>
                                        <input type="text" class="form-control" name="user_name" placeholder="Nhập tài khoản">
                                      </div>
                                      @if($errors->has('user_name'))
                                      <p class="help text-danger">{{ $errors->first('user_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="fas fa-lock fa-2x"></span>
                                        </div>
                                        <input type="password" class="form-control" name="user_password" placeholder="Nhập mật khẩu">

                                      </div>
                                      @if($errors->has('user_password'))
                                          <p class="help text-danger">{{ $errors->first('user_password') }}</p>
                                          @endif
                                </div>
                                <br>
                                <div class="form-group form-check">
                                    <div class="d-flex">
                                        <div class="text-left">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="remember" type="checkbox" value="nho"> Ghi nhớ
                                            </label>
                                        </div>
                                        <div class="ml-auto">
                                            <a href="#" class="text-right">Quên mật khẩu</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center login-btn">
                                    <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <p>© 2016 Classy Login Form. All rights reserved | Design by W3layouts</p>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End thay đổi -->
            </div>
        </div>
    </div>
</section>
<br>
@stop