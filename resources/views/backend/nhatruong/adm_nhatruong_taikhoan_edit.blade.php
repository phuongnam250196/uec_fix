@extends('backend.master')
@section('title', 'Tài khoản Nhà trường')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Nhà trường</h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('admin/home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Tài khoản nhà trường</li>
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
                <!-- Tạo tài khoản nhà trường -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Tạo tài khoản nhà trường</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                  <label>Mã trường</label>
                                  <select class="form-control" name="school_id">
                                    @foreach($school as $sch)
                                        <option value="{{$sch->id}}">{{$sch->school_code}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" class="form-control" name="user_name">
                                    @if($errors->has('user_name'))
                                      <p class="help text-danger">{{ $errors->first('user_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" name="password">
                                    @if($errors->has('password'))
                                      <p class="help text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" name="password_2">
                                    @if($errors->has('password_2'))
                                      <p class="help text-danger">{{ $errors->first('password_2') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label>Loại tài khoản</label>
                                  <select class="form-control" disabled="" name="school_type">
                                    <option value="3">Nhà trường</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Tên trường</label>
                                    <input type="text" class="form-control" disabled="" value="{{$school2->school_name}}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Logo trường</label><img src="{{asset('../storage/app/school/'.$school2->school_logo)}}" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></button>
                        <button class="pull-left btn btn-primary">Xác nhận </button>
                    </div>
                </div>

            </section>
            <!-- /.Left col -->
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop