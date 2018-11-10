@extends('backend.master')
@section('title', 'Thêm 1 sinh viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Sinh Viên</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sinh viên</li>
            <li class="active">Thêm 1 sinh viên</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
                <!-- Tạo 1 tài khoản sinh viên -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Thêm thông tin cho 1 sinh viên</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="box-header with-border">
                              <h3 class="box-title">Thông tin cá nhân</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Mã sinh viên</label>
                                        <input type="text" class="form-control" name="student_code">
                                        @if($errors->has('student_code'))
                                          <p class="help text-danger">{{ $errors->first('student_code') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="student_name">
                                        @if($errors->has('student_name'))
                                          <p class="help text-danger">{{ $errors->first('student_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" class="form-control" name="student_birthday">
                                        @if($errors->has('student_birthday'))
                                          <p class="help text-danger">{{ $errors->first('student_birthday') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select class="form-control" name="student_gender">
                                            <option value="">Chọn giới tính</option>
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                        </select>
                                        @if($errors->has('student_gender'))
                                          <p class="help text-danger">{{ $errors->first('student_gender') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="number" class="form-control" name="student_phone">
                                        @if($errors->has('student_phone'))
                                          <p class="help text-danger">{{ $errors->first('student_phone') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="student_email">
                                        @if($errors->has('student_email'))
                                          <p class="help text-danger">{{ $errors->first('student_email') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="box-header with-border">
                              <h3 class="box-title">Thông tin đi học</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group col-md-8">
                                        <label>Ảnh đại diện </label>
                                        <input id="img" type="file" name="student_img" class="form-control" style="display: none" onchange="changeImg(this)" >
                                        <img id="avatar" required="" class="thumbnail" src="{{url('upload/images/new_seo-10-512.png')}}" width="100%">
                                        @if($errors->has('student_img'))
                                          <p class="help text-danger">{{ $errors->first('student_img') }}</p>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-5 form-group">
                                            <label>Khoa</label>
                                            <select class="form-control" name="science_id">
                                                @foreach($science as $sci)
                                                    <option value="{{$sci->id}}">{{$sci->science_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('science_id'))
                                              <p class="help text-danger">{{ $errors->first('science_id') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Chuyên ngành</label>
                                            <select class="form-control" name="specialize_id">
                                                @foreach($specialize as $spe)
                                                    <option value="{{$spe->id}}">{{$spe->specialize_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('specialize_id'))
                                              <p class="help text-danger">{{ $errors->first('specialize_id') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Khóa học</label>
                                            <select class="form-control" name="course_id">
                                                @foreach($course as $cour)
                                                    <option value="{{$cour->id}}">{{$cour->course_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('course_id'))
                                              <p class="help text-danger">{{ $errors->first('course_id') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Lớp</label>
                                            <select class="form-control" name="class_id">
                                                @foreach($class as $cl)
                                                    <option value="{{$cl->id}}">{{$cl->class_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('class_id'))
                                              <p class="help text-danger">{{ $errors->first('class_id') }}</p>
                                            @endif
                                        </div>     
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Giáo viên chủ nhiệm</label>
                                        <select class="form-control" name="teacher_id">
                                            @foreach($teacher as $teach)
                                                <option value="{{$teach->id}}">{{$teach->teacher_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('v'))
                                          <p class="help text-danger">{{ $errors->first('v') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control" name="area_id">
                                            @foreach($area as $a)
                                            <option value="{{$a->id}}">{{$a->area_name}}</option>
                                           @endforeach
                                        </select>
                                        @if($errors->has('area_id'))
                                          <p class="help text-danger">{{ $errors->first('area_id') }}</p>
                                        @endif
                                    </div>
                                </div>    
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="student_address">
                                        @if($errors->has('student_address'))
                                          <p class="help text-danger">{{ $errors->first('student_address') }}</p>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">Thông tin việc làm</h3>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Tên việc làm</label>
                                        <input type="text" class="form-control" name="student_employ_name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Chức vụ</label>
                                        <select class="form-control" name="position_id">
                                            @foreach($position as $pos)
                                            <option value="{{$pos->id}}">{{$pos->position_name}}</option>
                                           @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" name="student_company_name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6"> 
                                    <div class="form-group">
                                        <label>Thời gian làm việc</label>
                                        <input type="text" class="form-control" name="student_timeserving">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6"> 
                                    <div class="form-group">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" name="student_company_address">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/sinhvien/thongtin')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-right btn btn-primary" style="margin-right: 10px">Thêm mới </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                
                <!-- End tạo 1 tài khoản -->
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop