    @extends('backend.master')
@section('title', 'Thêm danh sách sinh viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Sinh Viên</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sinh viên</li>
            <li class="active">Thêm danh sách</li>
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
            <section class="col-lg-4 connectedSortable">
                <!-- Tạo 1 tài khoản sinh viên -->
                <div class="box box-info">
                    <div class="box-header">
                        
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Thêm danh sách sinh viên</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    @if(!empty($status))
                            <p class="alert alert-success">{{$status}}</p>
                    @endif
                    <form method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Thông tin cá nhân</h3>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Chọn file thông tin</label>
                                        <input type="file" class="form-control" name="std_img">
                                        @if($errors->has('std_img'))
                                          <p class="help text-danger">{{ $errors->first('std_img') }}</p>
                                        @endif
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/sinhvien/thongtin')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-left btn btn-primary">Thêm mới </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                
                <!-- End tạo 1 tài khoản -->
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
           {{--  <section class="col-lg-8 connectedSortable">
                <!-- Tạo 1 tài khoản sinh viên -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Thêm danh sách sinh viên</strong></h3>
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
                                <div class="box-header with-border">
                                  <h3 class="box-title">Thông tin cá nhân</h3>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Ảnh đại diện </label>
                                        <input type="file" class="form-control" name="std_img">
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-left btn btn-primary">Thêm mới </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                
                <!-- End tạo 1 tài khoản -->
            </section> --}}
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop