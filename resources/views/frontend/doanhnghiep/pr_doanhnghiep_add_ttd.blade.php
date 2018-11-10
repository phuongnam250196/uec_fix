@extends('frontend.master')
@section('title', 'DN | Thêm tin tuyển dụng')
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
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Thêm mới tin tuyển dụng</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">Thêm mới</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="baiviet-post">
                    
                    <br>
                    <form class="pr_dn_ttd_form" method="post" enctype="multipart/form-data" >
                        <div class="row pr_dn_add_ttd_row">
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Tên tin tuyển dụng:</label>
                                    <input type="text" class="form-control" name="recruitment_name" value="{{old('recruitment_name')}}">
                                    @if($errors->has('recruitment_name'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 pr_dn_add_col">
                                {{-- <div class="form-group">
                                    <label>Ảnh minh họa</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="recruitment_img" id="customFile">
                                        <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                      </div>
                                      @if($errors->has('recruitment_img'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_img') }}</p>
                                    @endif
                                </div> --}}
                                <div class="form-group" >
                                    <label>Ảnh tin tuyển dụng</label>
                                    <input id="img" type="file" name="recruitment_img" class="form-control" style="display: none" onchange="changeImg(this)" >
                                    <img id="avatar" class="thumbnail" src="{{url('public/upload/images/new_seo-10-512.png')}}" width="100%">
                                    @if($errors->has('recruitment_img'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_img') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Mức lương</label>
                                    <input type="number" class="form-control" name="recruitment_salary" value="{{old('recruitment_salary')}}">
                                    @if($errors->has('recruitment_salary'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_salary') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Địa điểm làm việc</label>
                                    <select name="area_id" class="custom-select">
                                      <option selected value="">Chọn khu vực tìm việc</option>
                                      @foreach($area as $are)
                                        <option value="{{$are->id}}">{{$are->area_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('area_id'))
                                      <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Kinh nghiệm làm việc</label>
                                    <select name="yearofexp_id" class="custom-select">
                                      <option selected value="">Chọn kinh nghiệm làm việc</option>
                                      @foreach($yearofexp as $year)
                                        <option value="{{$year->id}}">{{$year->yearofexp_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('yearofexp_id'))
                                      <p class="help text-danger">{{ $errors->first('yearofexp_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <select name="position_id" class="custom-select">
                                      <option selected value="">Chọn chức vụ</option>
                                      @foreach($position as $positio)
                                        <option value="{{$positio->id}}">{{$positio->position_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('position_id'))
                                      <p class="help text-danger">{{ $errors->first('position_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Yêu cầu bằng cấp</label>
                                    <select name="education_id" class="custom-select">
                                      <option selected value="">Chọn loại bằng cấp</option>
                                      @foreach($education as $educate)
                                        <option value="{{$educate->id}}">{{$educate->education_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('education_id'))
                                      <p class="help text-danger">{{ $errors->first('education_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Hình thức làm việc</label>
                                    <select name="formality_id" class="custom-select">
                                      <option selected value="">Chọn hình thức làm việc</option>
                                      @foreach($formality as $formali)
                                        <option value="{{$formali->id}}">{{$formali->formality_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('formality_id'))
                                      <p class="help text-danger">{{ $errors->first('formality_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Số lượng tuyển</label>
                                    <input type="text" name="recruitment_amount" class="form-control">
                                    @if($errors->has('recruitment_amount'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_amount') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Yêu cầu giới tính</label>
                                    <div class="clearfix"></div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="recruitment_gender" value="1">
                                        <label class="custom-control-label" for="customRadio">Nam</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="recruitment_gender" value="2">
                                        <label class="custom-control-label" for="customRadio2">Nữ</label>
                                      </div> 
                                      @if($errors->has('recruitment_gender'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_gender') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Nghề nghiệp</label>
                                    <select name="career_id" class="custom-select">
                                      <option selected value="">Chọn nghề nghiệp</option>
                                      @foreach($career as $carr)
                                        <option value="{{$carr->id}}">{{$carr->career_name}}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('career_id'))
                                      <p class="help text-danger">{{ $errors->first('career_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Độ tuổi</label>
                                    <input type="text" name="recruitment_age" class="form-control">
                                    @if($errors->has('recruitment_age'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_age') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Hạn nộp hồ sơ</label>
                                    <input type="date" name="recruitment_deadline" class="form-control">
                                    @if($errors->has('recruitment_deadline'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_deadline') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Trạng thái tin</label>
                                    <select name="recruitment_status" class="custom-select">
                                      <option selected value="1">Đang tuyển</option>
                                      <option value="2">Hết hạn</option>
                                      <option value="3">Để sau</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Mô tả công việc</label>
                                    <textarea class="form-control ckeditor" name="recruitment_describe" rows="4" cols="0.5"></textarea>
                                    @if($errors->has('recruitment_describe'))
                                      <p class="help text-danger">{{ $errors->first('recruitment_describe') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Quyền lợi được hưởng</label>
                                    <textarea class="form-control ckeditor" name="recruitment_benefit" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 pr_dn_add_col">
                                <div class="form-group">
                                    <label>Yêu cầu khác</label>
                                    <textarea class="form-control ckeditor" name="recruitment_requirements" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 pr_dn_add_col">
                                <div class="form-group">
                                    <input hidden type="text" name="enterprise_id" value="{{Auth::user()->enterprise_id}}" class="form-control">
                                    <button type="submit" class="btn btn-outline-primary">Thêm mới</button>
                                    <a href="{{url('enterprise/list_ttd')}}" class="btn btn-outline-secondary">Hủy bỏ</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop