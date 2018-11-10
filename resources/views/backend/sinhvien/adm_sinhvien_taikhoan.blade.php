@extends('backend.master')
@section('title', 'Tài khoản sinh viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Sinh Viên</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sinh viên</li>
            <li class="active">Tài khoản</li>
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
            <section class="col-lg-8 connectedSortable">
                <!-- Tạo 1 tài khoản sinh viên -->
                <div class="box box-info">
                    <div class="box-body table-responsive no-padding dd">

                      <table class="table table-hover" {{$dem=1}}>
                        <tr>
                          <th width="5%">ID</th>
                          {{-- <th>id student</th> --}}
                          <th width="20%">Mã sinh viên</th>
                          <th width="30%">Ngày tạo</th>
                          <th colspan="2" width="20%" class="text-center">Tùy chọn</th>
                        </tr>
                        @foreach($m as $u)
                        <tr>
                          <td>{{$dem++}}</td>
                          {{-- <td>{{$u->student_id}}</td> --}}
                          <td><a href="#">{{$u->user_name}}</a></td>
                          <td>{{$u->created_at}}</td>
                          <td><a href="{{asset('admin/sinhvien/taikhoan/edit/'.$u->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
                          <td><a href="{{asset('admin/sinhvien/taikhoan/delete/'.$u->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash-o"></i> Xóa</a></td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
                    <div class="box-footer clearfix text-right">
                        {{ $m->links('vendor.pagination.bootstrap-4') }}
                    </div>      
                </div>
                <!-- End tạo 1 tài khoản -->
            </section>
             <section class="col-lg-4 connectedSortable">
                <!-- Tạo 1 tài khoản sinh viên -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Tạo tài khoản</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <a class="btn btn-info btn-sm" href="{{url('admin/sinhvien/taikhoan/reset')}}">Reset</a>
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            @if(!empty(session('success')))
                            <p class="alert alert-success">{{session('success')}}</p>
                            @endif
                            @if(!empty(session('error')))
                            <p>{{session('error')}}</p>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Mã sinh viên</label>
                                        <input type="text" class="form-control" name="user_name" value="{{old('user_name')}}">
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
                                        <input type="password" class="form-control" name="pass_2">
                                        @if($errors->has('pass_2'))
                                          <p class="help text-danger">{{ $errors->first('pass_2') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-left btn btn-primary">Tạo tài khoản</button>
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