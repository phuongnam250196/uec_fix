@extends('backend.master')
@section('title', 'Thêm Doanh nghiệp')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Thông tin Doanh Nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thông tin doanh nghiệp</li>
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
                {{-- Thêm một doanh nghiệp --}}
                <div class="box box-info">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="box-header">
                            <i class="fa fa-plus-circle text-primary"></i>
                            <h3 class="box-title"><strong>Thêm mới một doanh nghiệp</strong></h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên doanh nghiệp (Tên đầy đủ)</label>
                                        <input required type="text" class="form-control" value="{{old('dn_name')}}" name="dn_name">
                                        @if($errors->has('dn_name'))
                                          <p class="help text-danger">{{ $errors->first('dn_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Tên giao dịch (Tên viết tắt)</label>
                                        <input required type="text" class="form-control" value="{{old('dn_acronym')}}" name="dn_acronym">
                                    </div>
                                    <div class="form-group">
                                        <label>Quy mô doanh nghiệp</label>
                                        <input required type="number" class="form-control" value="{{old('dn_size')}}" name="dn_size">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Logo công ty</label>
                                        <input id="img" type="file" name="dn_logo" class="form-control" style="display: none" onchange="changeImg(this)" >
                                        <img id="avatar" class="thumbnail" src="{{url('upload/images/new_seo-10-512.png')}}" width="100%">
                                        @if($errors->has('dn_logo'))
                                          <p class="help text-danger">{{ $errors->first('dn_logo') }}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nhập mã số thuế</label>
                                        <input required type="number" class="form-control" name="dn_tax_code" value="{{old('dn_tax_code')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control" id="sel1" name="dn_area">
                                            @foreach($area as $area)
                                                <option value="{{$area->id}}">{{$area->area_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Số điện thoại cố định</label>
                                        <input required type="number" class="form-control" name="dn_phone" value="{{old('dn_phone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" name="dn_address" value="{{old('dn_address')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" class="form-control" name="dn_email" value="{{old('dn_email')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input required type="text" class="form-control" name="dn_website" value="{{old('dn_website')}}">
                                        @if($errors->has('dn_website'))
                                          <p class="help text-danger">{{ $errors->first('dn_website') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="comment">Giới thiệu công ty</label>
                                      <textarea required class="form-control ckeditor" rows="5" id="comment" name="dn_describe">{{old('dn_describe')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-left btn btn-primary" type="submit">Thêm mới </button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                {{-- Thêm file danh nghiệp --}}
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
                                        <label>Chọn file thông tin</label>
                                        <input type="file" class="form-control" name="file_excel_dn">
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/doanhnghiep/thongtin/danhsach')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-left btn btn-primary" name="save" value="save" type="submit">Thêm mới </button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
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