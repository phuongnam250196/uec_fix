@extends('frontend.master')
@section('title', 'Sinh viên')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.sinhvien.nav.nav-student')
            </div>
            <div class="col-md-8 baiviet">
                <div class="dieuhuong-doc-search">
                    <div class="row dieuhuong-doc-search-2">
                        <div class="col-md-4 dieuhuong-doc-search-2-col dieuhuong-doc-search-2-text">
                            <i class="fas fa-search"></i>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
                          </div>
                        </div>
                        <div class="col-md-3 dieuhuong-doc-search-2-col">
                            <div class="form-group">
                              <select class="form-control">
                                <option>Chọn ngành nghề</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3 dieuhuong-doc-search-2-col">
                            <div class="form-group">
                              <select class="form-control" id="sel1">
                                <option>Tỉnh/Thành phố</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2 dieuhuong-doc-search-2-col">
                          <div class="form-group">
                            <input type="submit" class="form-control" value="Tìm kiếm">
                          </div>
                        </div>
                    </div>
                    <div class="row dieuhuong-doc-search-info">
                        <div class="col-6 text-left">
                            <p>Tổng số việc hiện có <span class="text-success">240</span> vị trí</p>
                        </div>
                        <div class="col-6 text-right">
                            <p><a href="#">Mới nhất</a> | <a href="#">Hạn nộp hồ sơ</a></p>
                        </div>
                    </div>
                   
                </div>
                <div class="baiviet-post">
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="#">PHP Developer (Junior )</a></h3>
                                    <p>Bravebits - Hà Nội</p>
                                </div>
                                <div class="col-md-2 student-time text-right">
                                    <p class="time-up"><a href="#">13/05/2018</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row student-content">
                            <div class="col-md-3 student-content-col">
                                <img src="images/brave.jpg" style="width:100%" alt="">
                            </div>
                            <div class="col-md-7 student-content-col">
                                <p class="noidung-post-x">Thân gửi trai xinh gái đẹp Developer đang tìm kiếm một cơ hội mới. Dự án của BraveBits đang phát triển không ngừng và công ty cần tìm kiếm thêm các cộng sự để cùng BB chiến đấu mang sản phẩm đi càng xa trong thị trường châu Âu, Mỹ.</p>
                                <a href="#">Xem chi tiết.</a>
                            </div>
                            
                            <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                                <p><a href="#">Đã xem <i class="fas fa-clipboard-check"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="#">Lập trình viên Node.js (Javascript)</a></h3>
                                    <p>CP dịch vụ truyền thông đa phương tiện - Hà Nội</p>
                                </div>
                                <div class="col-md-2 student-time text-right">
                                    <p class="time-up"><a href="#">13/05/2018</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row student-content">
                            <div class="col-md-3 student-content-col">
                                <img src="images/Fpt-Telecom.jpg" style="width:100%" alt="">
                            </div>
                            <div class="col-md-7 student-content-col">
                                <p class="noidung-post-x">Thân gửi trai xinh gái đẹp Developer đang tìm kiếm một cơ hội mới. Dự án của BraveBits đang phát triển không ngừng và công ty cần tìm kiếm thêm các cộng sự để cùng BB chiến đấu mang sản phẩm đi càng xa trong thị trường châu Âu, Mỹ.</p>
                                <a href="#">Xem chi tiết.</a>
                            </div>
                            
                            <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                                <p><a href="#">Đã xem <i class="fas fa-clipboard-check"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="#">Kỹ Sư Lập Trình Nhúng</a></h3>
                                    <p>Tập đoàn Viễn thông Quân đội Viettel - Hà Nội</p>
                                </div>
                                <div class="col-md-2 student-time text-right">
                                    <p class="time-up"><a href="#">13/05/2018</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row student-content">
                            <div class="col-md-3 student-content-col">
                                <img src="images/viettel.png" style="width:100%" alt="">
                            </div>
                            <div class="col-md-7 student-content-col">
                                <p class="noidung-post-x">Thân gửi trai xinh gái đẹp Developer đang tìm kiếm một cơ hội mới. Dự án của BraveBits đang phát triển không ngừng và công ty cần tìm kiếm thêm các cộng sự để cùng BB chiến đấu mang sản phẩm đi càng xa trong thị trường châu Âu, Mỹ.</p>
                                <a href="#">Xem chi tiết.</a>
                            </div>
                            
                            <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                                <p><a href="#">Đã xem <i class="fas fa-clipboard-check"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="#">Trợ lý Giám đốc Marketing</a></h3>
                                    <p>Công ty TNHH Venesa - Hà Nội</p>
                                </div>
                                <div class="col-md-2 student-time text-right">
                                    <p class="time-up"><a href="#">13/05/2018</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row student-content">
                            <div class="col-md-3 student-content-col">
                                <img src="images/social_square.jpg" style="width:100%" alt="">
                            </div>
                            <div class="col-md-7 student-content-col">
                                <p class="noidung-post-x">Thân gửi trai xinh gái đẹp Developer đang tìm kiếm một cơ hội mới. Dự án của BraveBits đang phát triển không ngừng và công ty cần tìm kiếm thêm các cộng sự để cùng BB chiến đấu mang sản phẩm đi càng xa trong thị trường châu Âu, Mỹ.</p>
                                <a href="#">Xem chi tiết.</a>
                            </div>
                            
                            <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                                <p><a href="#">Đã xem <i class="fas fa-clipboard-check"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="student">
                        <div class="student-title">
                            <div class="row">
                                <div class="col-md-10 student-title-h3">
                                    <h3><a href="#">Chỉ huy phó công trình dự án nội thất</a></h3>
                                    <p>Eurowindow - Hà Nội</p>
                                </div>
                                <div class="col-md-2 student-time text-right">
                                    <p class="time-up"><a href="#">13/05/2018</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row student-content">
                            <div class="col-md-3 student-content-col">
                                <img src="images/hoithao.PNG" style="width:100%" alt="">
                            </div>
                            <div class="col-md-7 student-content-col">
                                <p class="noidung-post-x">Thân gửi trai xinh gái đẹp Developer đang tìm kiếm một cơ hội mới. Dự án của BraveBits đang phát triển không ngừng và công ty cần tìm kiếm thêm các cộng sự để cùng BB chiến đấu mang sản phẩm đi càng xa trong thị trường châu Âu, Mỹ.</p>
                                <a href="#">Xem chi tiết.</a>
                            </div>
                            
                            <div class="col-md-2 student-content-col text-right student-content-col-nop">
                                <p><a href="#">Nộp ngay <i class="fab fa-telegram-plane"></i></a> </p>
                                <p><a href="#">Lưu lại <i class="far fa-star"></i> </a></p>
                                <p><a href="#">Đã xem <i class="fas fa-clipboard-check"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 student-pgn">
                        <div class="row">
                            <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
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