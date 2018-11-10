@extends('frontend.master')
@section('title', 'Khảo sát cựu sinh viên')
@section('banner')
@include('frontend.slider.slider_pub')
@stop
@section('main')
@include('frontend.navbar.navPublic')

<section id="breadcrumb-link">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item">Khảo sát</li>
            <li class="breadcrumb-item active">Cựu sinh viên</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="thongtinsinhvien">
                    <div class="col-md-8 offset-2 thongtinsinhvien-main khaosat">
                        <div class="thongtinsinhvien-title">
                            <h1 class="thongtinsinhvien-title-exp">Làm khảo sát cựu sinh viên</h1>
                            <p>Thông tin bạn điền sẽ là nguồn dữ liệu phân tích của UEC sau này. Đề nghị điền chính xác, đúng sự thật.
                                <br>Thông tin (<b class="text-danger">*</b>) là thông tin bắt buộc phải điền.</p>
                        </div>
                        <hr>
                        <div class="khaosat-detail">
                            <form method="POST">
                                <div class="form-group">
                                    <label>1. Địa chỉ Email (<span class="text-danger"><strong>*</strong></span>)</label>
                                    <input type="email" name="student_email" class="form-control" placeholder="VD: abc@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label>2. Họ và tên <span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_name" class="form-control" placeholder="VD: Trần Văn A">
                                </div>
                                <div class="form-group">
                                    <label>3. Ngày sinh</label>
                                    <input type="date" name="student_birthday" class="form-control" placeholder="VD:12/12/1996">
                                </div>
                                <div class="form-group">
                                    <label>4. Giới tính <span class="text-danger"><strong>*</strong></span></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="1" name="student_gender">Nam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="2" name="student_gender">Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>5. Mã Sinh Viên <span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_code" class="form-control" placeholder="VD: A25288">
                                </div>
                                <div class="form-group">
                                    <label>6. Niên khóa đã theo học <span class="text-danger"><strong>*</strong></span></label>
                                    <select class="custom-select" name="course_id">
                                        <option>K21</option>
                                        <option>K22</option>
                                        <option>K23</option>
                                        <option>K24</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>7. Ngành học: <span class="text-danger"><strong>*</strong></span></label>
                                    <select class="custom-select" name="specialize_id">
                                        <option>Quản trị kinh doanh</option>
                                        <option>Kế toán</option>
                                        <option>Khoa học máy tính</option>
                                        <option>Ngôn ngữ Nhật</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>8. Năm ra trường <span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_ourschool" class="form-control" placeholder="VD: 2018">
                                </div>
                                <div class="form-group">
                                    <label>9. Xếp loại tốt nghiệp <span class="text-danger"><strong>*</strong></span></label>
                                    <select class="custom-select" name="student_distribution">
                                        <option>Giỏi</option>
                                        <option>Khá</option>
                                        <option>Trung bình khá</option>
                                        <option>Trung bình</option>
                                        <option>Chưa nhận bằng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>10. Nếu hiện nay Anh/Chị đang đi làm, vui lòng cho biết tên cơ quan <span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_company_name" class="form-control" placeholder="VD: FPT">
                                </div>
                                <div class="form-group">
                                    <label>11. Địa chỉ cơ quan (chỉ cần ghi Tỉnh/Thành phố)</label>
                                    <input type="text" name="student_company_address" class="form-control" placeholder="VD: Hà Nội">
                                </div>
                                <div class="form-group">
                                    <label>12. Vị trí công việc <span class="text-danger"><strong>*</strong></span></label>
                                    <select class="custom-select" name="student_company_position">
                                        <option>Lãnh đạo</option>
                                        <option>Quản lý</option>
                                        <option>Chuyên viên/Nhân viên</option>
                                        <option>Khác</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>13. Điện thoại liên hệ với Anh/Chị<span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_phone" class="form-control" placeholder="VD: 01654 524 503">
                                </div>
                                <div class="form-group">
                                    <label>14. Anh/Chị có muốn tham gia mạng lưới cựu sinh viên của Trường Đại Học Thăng Long không ? <span class="text-danger"><strong>*</strong></span></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_addinUEC" value="1">Có
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_addinUEC" value="2">Không
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_addinUEC" value="3">Tôi chưa xác định được bây giờ
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>15. Anh/Chị có muốn nhận các thông tin về các vị trí tuyển dụng và các thông tin hữu ích khác từ phía Trung tâm Kết nối đại học-doanh nghiệp (xem trang web tại <a href="http://uec.thanglong.edu.vn">http://uec.thanglong.edu.vn/</a>) không</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_receiveEmail" value="1">Đồng ý nhận
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_receiveEmail" value="2">Không đồng ý nhận
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_receiveEmail" value="3">Chưa cần nhận bây giờ
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary khaosat-send">Gửi phiếu</button>
                                {{csrf_field()}}
                            </form>
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