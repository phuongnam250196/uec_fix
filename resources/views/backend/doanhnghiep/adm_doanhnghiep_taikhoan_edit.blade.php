@extends('backend.master')
@section('title', 'Sửa tài khoản doanh nghiệp')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Tài khoản Doanh Nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Tài khoản doanh nghiệp</li>
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
            <section class="col-lg-7 connectedSortable">          
                <!-- Tạo tài khoản doanh nghiệp -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Cập nhật tài khoản doanh nghiệp</strong></h3>
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
                                <div class="col-lg-7">
                                    <div class="form-group">
                                      <label>Tên giao dịch công ty (Tên viết tắt)</label>
                                      <select class="form-control" name="dn_user_info" disabled="" value="{{$list_user->enterprise_id}}">
                                        <option value="{{$enter->id}}">{{$enter->enterprise_name}}</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input required type="text" class="form-control" name="dn_user_name" value="{{$list_user->user_name}}">
                                        @if($errors->has('dn_user_name'))
                                          <p class="help text-danger">{{ $errors->first('dn_user_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input required type="password" class="form-control" name="dn_user_pass" value="">
                                        @if($errors->has('dn_user_pass'))
                                          <p class="help text-danger">{{ $errors->first('dn_user_pass') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input required type="password" class="form-control" name="dn_user_pass_2" value="">
                                        @if($errors->has('dn_user_pass_2'))
                                          <p class="help text-danger">{{ $errors->first('dn_user_pass_2') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Loại tài khoản</label>
                                      <select class="form-control" disabled name="dn_user_type">
                                        <option value="2">Doanh nghiệp</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    {{-- <img id="avatar" class="thumbnail" src="{{url('../storage/app/public/'.$enp->enterprise_logo)}}" width="100%"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/doanhnghiep/taikhoan')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
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