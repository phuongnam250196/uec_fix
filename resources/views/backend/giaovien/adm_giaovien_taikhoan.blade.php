@extends('backend.master')
@section('title', 'Tài khoản giáo viên')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Tài khoản Giáo viên</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Giáo viên</li>
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
            <section class="col-lg-7 connectedSortable">          
                <!-- Tạo tài khoản doanh nghiệp -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Tạo tài khoản giáo viên</strong></h3>
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
                                      <label>Danh sách giáo viên</label>
                                      <select class="form-control" name="gv_user_info">
                                        <option>Chọn giáo viên</option>
                                        @foreach($teach as $te)
                                            <option rel="{{$te->teacher_name}}" value="{{$te->id}}">{{$te->teacher_name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input required type="text" class="form-control" name="gv_user_name">
                                        @if($errors->has('gv_user_name'))
                                          <p class="help text-danger">{{ $errors->first('gv_user_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input required type="password" class="form-control" name="gv_user_pass">
                                        @if($errors->has('gv_user_pass'))
                                          <p class="help text-danger">{{ $errors->first('gv_user_pass') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input required type="password" class="form-control" name="gv_user_pass_2">
                                        @if($errors->has('gv_user_pass_2'))
                                          <p class="help text-danger">{{ $errors->first('gv_user_pass_2') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Loại tài khoản</label>
                                      <select class="form-control" disabled name="gv_user_type">
                                        <option value="4">Giáo viên</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <img name="image-swap" id="image-avatar" width="100%">
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                          $selectUser = $('select[name = "gv_user_info"]')
                                            $($selectUser).change(function(){
                                                var id = this.value

                                                $.ajax({
                                                    url: '/admin/giaovien/taikhoan/get-avatar/'+id,
                                                    type: 'get',
                                                    success:function(data){
                                                        $('#image-avatar').attr('src','{{asset('../storage/app/giaovien/')}}/' +data+'?'+new Date())
                                                        console.log(data)
                                                    },
                                                    errors: function (err) {
                                                        console.log(err)
                                                    }
                                                })

                                            })
                                        })
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                            <button class="pull-left btn btn-primary">Xác nhận </button>
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
                                <th>ID</th>
                                <th>Tên tài khoản</th>
                                <th>Tên giáo viên</th>
                                <th colspan="2" width="10%" class="text-center">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($list_user as $u)
                              <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->user_name}}</td>
                                <td>{{$u->teacher_name}}</td>
                                <td><a class="btn btn-success" href="{{url('admin/giaovien/taikhoan/edit/'.$u->id)}}"><i class="fa fa-edit"></i></a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{url('admin/giaovien/taikhoan/delete/'.$u->id)}}"><i class="fa fa-trash-o"></i></a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          </div>
                          <div class="box-footer clearfix text-right">
                            {{ $list_user->links('vendor.pagination.bootstrap-4') }}
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