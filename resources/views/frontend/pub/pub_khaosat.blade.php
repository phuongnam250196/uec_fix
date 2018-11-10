@extends('frontend.master')
@section('title', 'Khảo sát sinh viên')
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
            <li class="breadcrumb-item active">Sinh viên</li>
        </ul>
    </div>
</section>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-8 baiviet">
                <!-- Thay đổi tại đây -->
                <div class="thongtinsinhvien">
                    <div class=" col-lg-8 offset-lg-2 thongtinsinhvien-main khaosat">
                        <div class="thongtinsinhvien-title">
                            <h1 class="thongtinsinhvien-title-exp">Làm khảo sát sinh viên</h1>
                            <p>Thông tin bạn điền sẽ là nguồn dữ liệu phân tích của UEC sau này. Đề nghị điền chính xác, đúng sự thật.
                                <br>Thông tin (<b class="text-danger">*</b>) là thông tin bắt buộc phải điền.</p>
                        </div>
                        @if(Session('message'))
                            <p class="alert alert-success">{{Session('message')}}</p>
                        @endif
                        <hr>
                        <div class="khaosat-detail">
                            <form method="POST">
                                <div class="form-group">
                                    <label>1. Địa chỉ Email (<span class="text-danger"><strong>*</strong></span>)</label>
                                    <input type="email" name="student_email" class="form-control" placeholder="VD: abc@gmail.com">
                                    @if($errors->has('student_email'))
                                        <p class="help text-danger">{{ $errors->first('student_email') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>2. Họ và tên <span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_name" class="form-control" placeholder="VD: Trần Văn A">
                                    @if($errors->has('student_name'))
                                        <p class="help text-danger">{{ $errors->first('student_name') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>3. Giới tính <span class="text-danger"><strong>*</strong></span></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" value="1" class="form-check-input" name="student_gender">Nam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" value="2" class="form-check-input" name="student_gender">Nữ
                                        </label>
                                    </div>
                                    @if($errors->has('student_gender'))
                                        <p class="help text-danger">{{ $errors->first('student_gender') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>4. Mã Sinh Viên <span class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" name="student_code" class="form-control" placeholder="VD: A25288">
                                    @if($errors->has('student_code'))
                                        <p class="help text-danger">{{ $errors->first('student_code') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>5. Khóa tuyển vào <span class="text-danger"><strong>*</strong></span></label>
                                     <select class="custom-select" name="course_id">
                                        <option value="">VD: K27</option>
                                        @foreach($course as $cour)
                                            <option value="{{$cour->id}}">{{$cour->course_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('course_id'))
                                        <p class="help text-danger">{{ $errors->first('course_id') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>6. Ngành đào tạo/Tốt nghiệp <span class="text-danger"><strong>*</strong></span></label>
                                    <select class="custom-select" name="specialize_id">
                                        <option value="">VD: Toán tin</option>
                                        @foreach($specialize as $specia)
                                            <option value="{{$specia->id}}">{{$specia->specialize_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('specialize_id'))
                                        <p class="help text-danger">{{ $errors->first('specialize_id') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>7. Điện thoại liên hệ </label>
                                    <input type="text" name="student_phone" class="form-control" placeholder="VD: 01654 524 503">
                                </div>
                                <div class="form-group">
                                    <label>8. Nếu bạn đồng ý cho Trung tâm UEC cung cấp địa chỉ email của bạn cho các đối tác doanh nghiệp đang tuyển dụng các vị trí làm việc và thực tập, vui lòng đánh dấu ô thích hợp. <span class="text-danger"><strong>*</strong></span></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_sendEmailforEnterprise" value="1">Đồng ý
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_sendEmailforEnterprise" value="2">Không đồng
                                        </label>
                                    </div>
                                    @if($errors->has('student_sendEmailforEnterprise'))
                                        <p class="help text-danger">{{ $errors->first('student_sendEmailforEnterprise') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>9. Nếu bạn muốn nhận tờ thông tin điện tử của Trung tâm UEC-TLU, cung cấp các thông tin định hướng nghề nghiệp và tuyển dụng việc làm của các đối tác, vui lòng đánh dấu ô thích hợp <span class="text-danger"><strong>*</strong></span></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_receiveEmail" value="1">Đồng ý
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_receiveEmail" value="2">Không đồng
                                        </label>
                                    </div>
                                    @if($errors->has('student_receiveEmail'))
                                        <p class="help text-danger">{{ $errors->first('student_receiveEmail') }}</p>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>10. Bạn có muốn tham gia mạng lưới cựu sinh viên của Trường Đại Học Thăng Long sau khi đã tốt nghiệp không ? <span class="text-danger"><strong>*</strong></span></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_addinUEC" value="1">Đồng ý
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_addinUEC" value="2">Không đồng
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="student_addinUEC" value="3">Tôi chưa xác định được bây giờ
                                        </label>
                                    </div>
                                    @if($errors->has('student_addinUEC'))
                                        <p class="help text-danger">{{ $errors->first('student_addinUEC') }}</p>
                                      @endif
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