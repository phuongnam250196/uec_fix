@extends('backend.master')
@section('title', 'Sửa hình thức')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Danh mục khác - Sửa hình thức</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hình thức</li>
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
            <section class="col-lg-6 connectedSortable">
                <!-- Thêm mới hình thức -->
                <div class="box box-info">
                    
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Sửa hình thức</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <form method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if(session('sucess'))
                                        <div class="alert alert-success">{{session('sucess')}}</div>
                                    @endif
                                        <div class="form-group">
                                            <label>Tên hình thức</label>
                                            <input type="text" name="name" value="{{$nn->formality_name}}" class="form-control">
                                            @if($errors->has('name'))
                                              <p class="help text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                     
                                        <div class="form-group">
                                          <label>Mô tả hình thức làm việc</label>
                                          <textarea class="form-control" name="describe" rows="5">{{$nn->formality_describe}}</textarea>
                                          @if($errors->has('describe'))
                                              <p class="help text-danger">{{ $errors->first('describe') }}</p>
                                            @endif
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a class="pull-right btn btn-default" id="sendEmail" href="{{asset('admin/danhmuckhac/hinhthuc')}}">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button type="submit" class="pull-left btn btn-primary">Cập nhật </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-8 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid">

                </div>
                <!-- /.box -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop