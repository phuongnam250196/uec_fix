@extends('frontend.master')
@section('title', 'DN | Thông tin tuyển dụng')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.doanhnghiep.nav.nav-enter')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Đổi mật khẩu</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Đổi mật khẩu</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    <div class="pr_dn_ttd-title">
                        <h1>Thực tập lập trình PHP</h1>
                        <p><a href="#">Công ty ABC Việt Nam</a></p>
                    </div>
                    <div class="row pr_dn_ttd_luu_nop">
                        <div class="col-lg-8 pr_dn_ttd_luu">
                            <button class="btn btn-default"><i class="far fa-star"></i> Lưu việc làm</button>
                            <span><i class="fas fa-clock"></i> Hạn nộp hồ sơ: 12/12/2012</span>
                        </div>
                        <div class="col-lg-4 text-right pr_dn_ttd_nop">
                            <button class="btn btn-primary">Nộp hồ sơ</button>
                        </div>
                    </div>
                    <div class="row pr_dn_ttd_content">
                        <div class="col-lg-6">
                            <p><i class="fas fa-donate"></i> <strong>Mức lương:</strong> 7-10 triệu</p>
                            <p><i class="fas fa-briefcase"></i> <strong>Kinh nghiệm:</strong> Chưa có kinh nghiệm</p>
                            <p><i class="fas fa-bookmark"></i> <strong>Yêu cầu bằng cấp:</strong> Không yêu cầu bằng cấp</p>
                            <p><i class="fas fa-user-check"></i> <strong>Số lượng cần tuyển:</strong> 7</p>
                            <p><i class="fas fa-list"></i> <strong>Nghề nghiệp:</strong> IT phần mềm</p>
                        </div>
                        <div class="col-lg-6">
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Địa điểm làm việc:</strong> Hà Nội</p>
                            <p><i class="fas fa-user-tie"></i> <strong>Chức vụ:</strong> Nhân viên</p>
                            <p><i class="fas fa-id-card-alt"></i> <strong>Hình thức làm việc:</strong> Bán thời gian tạm thời</p>
                            <p><i class="fas fa-transgender-alt"></i> <strong>Yêu cầu giới tính:</strong> Nữ</p>
                            <p><i class="fas fa-birthday-cake"></i> <strong>Yêu cầu độ tuổi:</strong> 22-24 tuổi</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="baiviet-post">
                    <h3>Thông tin tuyển dụng Nhân Viên Bán Hàng (Khu Vực Hà Nội)</h3>
                    <div class="row pr_dn_ttd_content_2">
                        <div class="col-lg-4">
                            <h4>Mô tả công việc</h4>
                        </div>
                        <div class="col-lg-8">
                            <p>Sắp xếp, trưng bày sản phẩm cho hãng bia tươi Tiệp Gammer <br>- Làm việc tại các Nhà hàng, mời khách sử dụng bia Gammer <br>- Tham gia các chương trình truyền thông, thu hút khách hàng đến dùng thử và mua hàng <br>- Công việc chi tiết sẽ trao đổi trong quá trình phỏng vấn</p>
                        </div>
                    </div>
                    <div class="row pr_dn_ttd_content_2">
                        <div class="col-lg-4">
                            <h4>Quyền lợi được hưởng</h4>
                        </div>
                        <div class="col-lg-8">
                            <p>Sắp xếp, trưng bày sản phẩm cho hãng bia tươi Tiệp Gammer <br>- Làm việc tại các Nhà hàng, mời khách sử dụng bia Gammer <br>- Tham gia các chương trình truyền thông, thu hút khách hàng đến dùng thử và mua hàng <br>- Công việc chi tiết sẽ trao đổi trong quá trình phỏng vấn</p>
                        </div>
                    </div>
                    <div class="row pr_dn_ttd_content_2">
                        <div class="col-lg-4">
                            <h4>Yêu cầu khác</h4>
                        </div>
                        <div class="col-lg-8">
                            <p>Sắp xếp, trưng bày sản phẩm cho hãng bia tươi Tiệp Gammer <br>- Làm việc tại các Nhà hàng, mời khách sử dụng bia Gammer <br>- Tham gia các chương trình truyền thông, thu hút khách hàng đến dùng thử và mua hàng <br>- Công việc chi tiết sẽ trao đổi trong quá trình phỏng vấn</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="baiviet-post">
                    <h3>Thông tin liên hệ</h3>
                    <div class="row pr_dn_ttd_content_2">
                        <div class="col-lg-4">
                            <h4>Người liên hệ</h4>
                        </div>
                        <div class="col-lg-8">
                            <p>Nguyễn Thị Nhung</p>
                        </div>
                    </div>
                    <div class="row pr_dn_ttd_content_2">
                        <div class="col-lg-4">
                            <h4>Số điện thoại</h4>
                        </div>
                        <div class="col-lg-8">
                            <p>583453045803458</p>
                        </div>
                    </div>
                    <div class="row pr_dn_ttd_content_2">
                        <div class="col-lg-4">
                            <h4>Email</h4>
                        </div>
                        <div class="col-lg-8">
                            <p>ntn2313@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop