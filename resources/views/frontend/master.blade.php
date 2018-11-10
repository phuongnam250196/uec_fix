<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('Layout/Frontend')}}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <link rel="icon" type="image/ico" href="{{ asset('upload/images/tlu.png') }}" sizes="140x140">
    <link rel="stylesheet" href="css/animate.css">
    {{-- <script type="text/javascript" src="engine1/jquery.js"></script> --}}
    {{-- <link rel="stylesheet" href="css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/globals.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    <style>
        .breadcrumb_title .breadcrumb {
            margin-bottom: 0;
            padding: 0;
        }
        .click_hide_show {
            display: none;
        }
        @yield('style')
        

    </style>
    
</head>

<body>
    <header id="header-1" class="">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('gioithieu')}}">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('huongdoanhnghiep')}}">Hướng về Doanh nghiệp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('thongtinsinhvien')}}">Thông tin Sinh Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('dinhhuongnghe')}}">Định hướng nghề nghiệp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('jobfair')}}">Job Fair</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(Auth::user()) d-none @endif" href="{{asset('khaosat/sinhvien')}}"><i class="far fa-edit"></i> Làm khảo sát</a>
                            @if(Auth::user())
                                @if(Auth::user()->user_level == 2)
                                    <a class="nav-link" href="{{asset('/enterprise')}}"><i class="fas fa-reply" title="Quay lại"></i></a>
                                @endif
                                @if(Auth::user()->user_level == 3)
                                    <a class="nav-link" href="{{asset('/school')}}"><i class="fas fa-reply" title="Quay lại"></i></a>
                                @endif
                                @if(Auth::user()->user_level == 4)
                                    <a class="nav-link" href="{{asset('/teacher')}}"><i class="fas fa-reply" title="Quay lại"></i></a>
                                @endif
                                @if(Auth::user()->user_level == 5)
                                    <a class="nav-link" href="{{asset('/student')}}"><i class="fas fa-reply" title="Quay lại"></i></a>                            
                                @endif                        
                            @endif

                            
                        </li>
                        
                        @if(Auth::user())

                        <li class="nav-link"><i class="fas fa-bell">
                            {{-- <span class="badge badge-light">4</span> --}}
                        </i> - <i class="fas fa-user-circle"></i> {{ Auth::user()->user_name}}</li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link @if(Auth::user()) d-none @endif" href="{{asset('dangnhap')}}" ><i class="fas fa-user"></i> Login</a>
                            <a class="nav-link @if(!Auth::user()) d-none @endif" href="{{asset('logout2')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    {{-- Thay đổi banner --}}
    @yield('banner')
    {{-- End thay đổi banner --}}
    
   <!-- Thay đổi nội dung content tại đây -->
    @yield('main')
   <!-- End thay đổi nội dung -->

    <aside id="aside-index">
        <div class="container">
            <div class="owl-carousel owl-all">
                @foreach(Enterprise() as $en)
              <div class="item">
                <a href="{{url('doanhnghiep/chitiet/'.$en->id)}}" title="{{$en->enterprise_name}}"><img src="{{url('../storage/app/public/'.$en->enterprise_logo)}}" ></a>
              </div>
              @endforeach
            </div>
        </div>
    </aside>
    
    <footer id="ft-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 ft-1-col">
                    <h4>các quy định</h4>
                    <div class="ft-1-huongdan">
                        <ul>
                            <li><a href="{{asset('baiviet')}}">Bài viết</a></li>
                            <li><a href="{{asset('jobfair')}}">JobFair</a></li>
                            <li><a href="{{asset('dinhhuongnghe')}}">Định hướng nghề nghiệp</a></li>
                            <li><a href="{{asset('thongtinsinhvien')}}">Kết nối cựu sinh viên</a></li>
                            <li><a href="{{asset('thongtinsinhvien')}}">Thông tin sinh viên</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 ft-1-col">
                    <h4>liên kết hữu ích</h4>
                    <div class="ft-1-huongdan">
                        <ul>
                            <li><a href="{{asset('gioithieu')}}">Về với chúng tôi</a></li>
                            <li><a href="https://thanglong.edu.vn">thanglong.edu.vn</a></li>
                            <li><a href="https://elearning.thanglong.edu.vn">elearning.thanglong.edu.vn</a></li>
                            <li><a href="https://uec.thanglong.edu.vn">uec.thanglong.edu.vn</a></li>
                            <li><a href="https://fb.com">fb.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 ft-1-col">
                    <h4>Fanpage</h4>
                    <div class="ft-1-huongdan">
                       <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=223986208267206&autoLogAppEvents=1';
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-page" data-href="https://www.facebook.com/thanglonguniversity/" data-tabs="timeline" data-height="170" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thanglonguniversity/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thanglonguniversity/">Thang Long University</a></blockquote></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 ft-1-col">
                    <h4>Liên hệ</h4>
                    <div class="ft-1-huongdan-lienhe">
                        <ul>
                            <li><a href="{{url('/')}}">UEC - TLU</a></li>
                            <li>Cơ sở: CT12B Kim Văn Kim Lũ, Nghiêm Xuân Yêm, Đại Kim, Hoàng Mai, Hà Nội</li>
                            <li>Cơ sở 2: 31 Đường Chiến Thắng - Khu I - Thị Trấn Cẩm Giàng - Hải Dương</li>
                            <li>Số điện thoại: 024 3858 7346</li>
                            <li>Email: tlu@thanglong.edu.vn</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer id="ft-2">
        <div class="container">
            <div class="row text-center">
                <p>Copyright © 2018 Bản quyền thuộc UEC-TLU</p>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="engine1/wowslider.js"></script>
    <script type="text/javascript" src="engine1/script.js"></script>
    <script>
        @yield('script')
    </script>
    <script>
        // js chon anh
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
    </script> 
     <script src="js/wow.min.js"></script>
      <script>
      new WOW().init();
    </script>
</body>

</html>