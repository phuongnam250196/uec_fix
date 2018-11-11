@extends('backend.master')
@section('title', 'Sửa thông tin sinh viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Sinh Viên</h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('admin/home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Sinh viên</li>
            <li class="active">Sửa</li>
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
                        <h3 class="box-title"><strong>Sửa thông tin sinh viên</strong></h3>
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
                                        <input type="text" class="form-control" name="student_code" value="{{$student->student_code}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="student_name" value="{{$student->student_name}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" class="form-control" name="student_birthday" value="{{$student->student_birthday}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select class="form-control" name="student_gender">
                                            @if($student->student_gender == 1)
                                                <option value="1">Nam</option>
                                            @else
                                                <option value="2">Nữ</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="number" class="form-control" name="student_phone" value="{{$student->student_phone}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="student_email" value="{{$student->student_email}}">
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
                                        @if(!empty($student->student_img))
                                            <img id="avatar" class="thumbnail" src="{{url('/'.$student->student_img)}}" width="100%">
                                        @else
                                            <img id="avatar" required="" class="thumbnail" src="{{url('upload/images/new_seo-10-512.png')}}" width="100%">
                                        @endif
                                        @if($errors->has('img'))
                                          <p class="help text-danger">{{ $errors->first('img') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-5 form-group">
                                            <label>Khoa</label>
                                            <select class="form-control" name="science_id">
                                                @foreach($science as $sci)
                                                    <option value="{{$sci->id}}" @if($sci->id == $student->science_id) selected @endif>{{$sci->science_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Chuyên ngành</label>
                                            <select class="form-control" name="specialize_id">
                                                @foreach($specialize as $spe)
                                                    <option value="{{$spe->id}}" @if($spe->id == $student->specialize_id) selected @endif>{{$spe->specialize_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Khóa học</label>
                                            <select class="form-control" name="course_id">
                                                @foreach($course as $cour)
                                                    <option value="{{$cour->id}}" @if($cour->id == $student->course_id) selected @endif>{{$cour->course_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Lớp</label>
                                            <select class="form-control" name="class_id">
                                                @foreach($class as $cl)
                                                    <option value="{{$cl->id}}" @if($cl->id == $student->class_id) selected @endif>{{$cl->class_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>     
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Giáo viên chủ nhiệm</label>
                                        <select class="form-control" name="teacher_id">
                                            @foreach($teacher as $teach)
                                                <option value="{{$teach->id}}" @if($teach->id == $student->teacher_id) selected @endif>{{$teach->teacher_name}}</option>
                                            @endforeach
                                        </select>   
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
                                    </div>
                                </div>    
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="student_address" value="{{$student->student_address}}">
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
                                        <input type="text" class="form-control" name="student_employment_name" value="{{$student->student_employment_name}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Chức vụ</label>
                                        <select class="form-control" name="position_id">
                                            @foreach($position as $pos)
                                                <option value="{{$pos->id}}" @if($pos->id == $student->position_id) selected @endif>{{$pos->position_name}}</option>
                                            @endforeach
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" name="student_company_name" value="{{$student->student_company_name}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6"> 
                                    <div class="form-group">
                                        <label>Thời gian làm việc</label>
                                        <input type="text" class="form-control" name="student_timeserving" value="{{$student->student_timeserving}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6"> 
                                    <div class="form-group">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" name="student_company_address" value="{{$student->student_company_address}}">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/sinhvien/thongtin')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button type="submit" class="pull-right btn btn-primary" style="margin-right: 10px">Cập nhật</button>
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