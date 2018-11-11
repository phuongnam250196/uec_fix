@extends('backend.master')
@section('title', 'Nhà trường')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Nhà trường</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thông tin Nhà trường</li>
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
                                        <label>Mã trường</label>
                                        <input required type="text" class="form-control" value="{{old('nt_code')}}" name="nt_code">
                                        @if($errors->has('nt_code'))
                                          <p class="help text-danger">{{ $errors->first('nt_code') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Logo trường</label>
                                        <input id="img" required="" type="file" name="nt_logo" class="form-control" style="display: none" onchange="changeImg(this)" >
                                        <img id="avatar" class="thumbnail" src="{{url('upload/images/new_seo-10-512.png')}}" width="100%" height="170">
                                        
                                        @if($errors->has('nt_logo'))
                                          <p class="help text-danger">{{ $errors->first('nt_logo') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" class="form-control" value="{{old('nt_email')}}" name="nt_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input required type="number" class="form-control" value="{{old('nt_phone')}}" name="nt_phone">
                                        @if($errors->has('nt_phone'))
                                          <p class="help text-danger">{{ $errors->first('nt_phone') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tên trường</label>
                                        <input required type="text" class="form-control" value="{{old('nt_name')}}" name="nt_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control" id="sel1" value="{{old('nt_area')}}" name="nt_area">
                                            @foreach($area as $a)
                                                <option value="{{$a->id}}">{{$a->area_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ trường</label>
                                        <input required type="text" class="form-control" value="{{old('nt_address')}}" name="nt_address">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input required type="text" class="form-control" value="{{old('nt_website')}}" name="nt_website">
                                        @if($errors->has('nt_website'))
                                          <p class="help text-danger">{{ $errors->first('nt_website') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="comment">Giới thiệu trường</label>
                                      <textarea required class="form-control ckeditor" rows="5" id="comment" name="nt_describe">{{old('nt_describe')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin\home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left" ></i></a>
                            <button class="pull-left btn btn-primary" @if(!empty($s)) disabled @endif title="Bạn không thể thêm">Thêm mới </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Danh sách thông tin</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                       <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Mã trường</td>
                                <td>{{$s->school_code}}</td>
                                <td  rowspan="3" class="text-right"><img style="width:100px; height: 100px" src="{{asset('/'.$s->school_logo)}}" alt=""></td>
                              </tr>
                              <tr>
                                <td>Tên trường</td>
                                <td>{{$s->school_name}}</td>
                              </tr>
                              <tr>
                                <td>Khu vực</td>
                                @foreach($area as $are)
                                    @if($are->id == $s->area_id)
                                        <td>{{$are->area_name}}</td>
                                    @endif
                                @endforeach
                                
                              </tr>
                              <tr>
                                <td>Địa chỉ</td>
                                <td>{{$s->school_address}}</td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td colspan="2">{{$s->school_email}}</td>
                              </tr>
                              <tr>
                                <td>Số điện thoại</td>
                                <td colspan="2">{{$s->school_phone}}</td>
                              </tr>
                              <tr>
                                <td>website</td>
                                <td colspan="2">{{$s->school_web}}</td>
                              </tr>
                              <tr>
                                <td>Giới thiệu</td>
                                <td colspan="2">{!!$s->school_describe!!}</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                      <div class="box-footer clearfix">
                         {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square" ></i> Cập nhật</button> --}}
                          <a href="{{asset('admin\nhatruong\thongtin\edit\1')}}" class="pull-left btn btn-primary" id="sendEmail">Cập nhật <i class="fa fa-pencil-square" ></i></a>
                      </div>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>This is a small modal.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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