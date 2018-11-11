@extends('backend.master')
@section('title', 'Tài khoản Nhà trường')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Nhà trường</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <form method="post">
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
                                        <label>Logo trường</label><img src="{{asset('/'.$school2->school_logo)}}" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <button type="submit" class="pull-left btn btn-primary">Xác nhận </button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Danh sách tài khoản</h3>
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
                            <thead>
                              <tr>
                                <th class="text-center">STT</th>
                                <th>Tên tài khoản</th>
                                <th>Số điện thoại</th>
                                <th colspan="2" width="10%">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody {{$dem=1}}>
                                @foreach($user_school as $us)
                                  <tr>
                                    <td class="text-center">{{$dem++}}</td>
                                    <td>{{$us->user_name}}</td>
                                    <td>{{$us->school_phone}}</td>
                                    <td><a class="btn btn-success" href="{{url('admin/nhatruong/taikhoan/edit/'.$us->id)}}"><i class="fa fa-edit"></i></a></td>
                                    <td><a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không???')" class="btn btn-danger" href="{{url('admin/nhatruong/taikhoan/delete/'.$us->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                  </tr>
                                  @endforeach
                            </tbody>
                          </table>
                          </div>
                          <div class="box-footer clearfix text-right">
                            {{ $user_school->links('vendor.pagination.bootstrap-4') }}
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