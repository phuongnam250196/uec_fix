@extends('backend.master')
@section('title', 'Giáo viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Giáo viên</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thông tin Giáo viên</li>
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
            <section class="col-lg-7 connectedSortable">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Thêm mới</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input id="img" required="" type="file" name="gv_img" class="form-control" style="display: none" onchange="changeImg(this)" >
                                        <img id="avatar" class="thumbnail" src="{{url('/upload/images/new_seo-10-512.png')}}" width="100%">
                                        @if($errors->has('gv_img'))
                                          <p class="help text-danger">{{ $errors->first('gv_img') }}</p>
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên giáo viên</label>
                                        <input required type="text" class="form-control" value="{{old('gv_name')}}" name="gv_name">
                                        @if($errors->has('gv_name'))
                                          <p class="help text-danger">{{ $errors->first('gv_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" class="form-control" value="{{old('gv_email')}}" name="gv_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input required type="number" class="form-control" value="{{old('gv_phone')}}" name="gv_phone">
                                        @if($errors->has('gv_phone'))
                                          <p class="help text-danger">{{ $errors->first('gv_phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input required type="date" class="form-control" value="{{old('gv_birthday')}}" name="gv_birthday">
                                    </div>
                                    <div class="form-group">
                                        <label>Khoa</label>
                                        <select class="form-control" value="{{old('gv_science')}}" name="gv_science">
                                            @foreach($science as $a)
                                                <option value="{{$a->id}}">{{$a->science_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control" id="sel1" value="{{old('gv_area')}}" name="gv_area">
                                            @foreach($area as $a)
                                                <option value="{{$a->id}}">{{$a->area_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ giáo viên</label>
                                        <input required type="text" class="form-control" value="{{old('gv_address')}}" name="gv_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin\home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left" ></i></a>
                            <button class="pull-left btn btn-primary">Thêm mới </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Thêm mới</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Chọn file excel</label>
                                <input required type="file" class="form-control" name="gv_excel">
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <button class="pull-right btn btn-primary" name="save" value="save">Thêm mới </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>

                
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop