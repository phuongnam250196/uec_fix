@extends('backend.master')
@section('title', 'Nhà trường')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Nhà trường</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Thông tin Nhà trường</li>
            <li class="active">Cập nhật</li>
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
                        <h3 class="box-title"><strong>Cập nhật</strong></h3>
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
                                        <label>Mã trường</label>
                                        <input required type="text" class="form-control" value="{{$school->school_code}}" name="nt_code">
                                        @if($errors->has('nt_code'))
                                          <p class="help text-danger">{{ $errors->first('nt_code') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Logo trường</label>
                                        <input id="img" type="file" name="nt_logo" class="form-control" style="display: none" onchange="changeImg(this)" >
                                        <img id="avatar" class="thumbnail" src="{{url('../storage/app/school/'.$school->school_logo)}}" width="100%">
                                        @if($errors->has('nt_logo'))
                                          <p class="help text-danger">{{ $errors->first('nt_logo') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" class="form-control" value="{{$school->school_email}}" name="nt_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input required type="number" class="form-control" value="{{$school->school_phone}}" name="nt_phone">
                                        @if($errors->has('nt_phone'))
                                          <p class="help text-danger">{{ $errors->first('nt_phone') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên trường</label>
                                        <input required type="text" class="form-control" value="{{$school->school_name}}" name="nt_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control" id="sel1" value="{{$school->area_id}}" name="nt_area">
                                            @foreach($area as $a)
                                                <option value="{{$a->id}}" @if($a->id == $school->area_id) selected @endif>{{$a->area_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ trường</label>
                                        <input required type="text" class="form-control" value="{{$school->school_address}}" name="nt_address">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input required type="text" class="form-control" value="{{$school->school_web}}" name="nt_website">
                                        @if($errors->has('nt_website'))
                                          <p class="help text-danger">{{ $errors->first('nt_website') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="comment">Giới thiệu trường</label>
                                      <textarea required class="form-control ckeditor" rows="5" id="comment" name="nt_describe">{{$school->school_describe}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin\nhatruong\thongtin')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left" ></i></a>
                            <button class="pull-left btn btn-primary">Cập nhật </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
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