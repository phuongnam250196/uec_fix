@extends('backend.master')
@section('title', 'Tài khoản doanh nghiệp')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Tài khoản Doanh Nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tài khoản doanh nghiệp</li>
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
                        <h3 class="box-title"><strong>Tạo tài khoản doanh nghiệp</strong></h3>
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
                                      <select class="form-control" name="dn_user_info">
                                          <option value="">Chọn doanh nghiệp</option>
                                        @foreach($enter as $en)
                                            <option value="{{$en->id}}">{{$en->enterprise_name}}</option>
                                        @endforeach
                                      </select>
                                       @if($errors->has('dn_user_info'))
                                          <p class="help text-danger">{{ $errors->first('dn_user_info') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input required type="text" class="form-control" name="dn_user_name">
                                        @if($errors->has('dn_user_name'))
                                          <p class="help text-danger">{{ $errors->first('dn_user_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input required type="password" class="form-control" name="dn_user_pass">
                                        @if($errors->has('dn_user_pass'))
                                          <p class="help text-danger">{{ $errors->first('dn_user_pass') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input required type="password" class="form-control" name="dn_user_pass_2">
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
                                  {{--   <div class="form-group">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" disabled name="dn_user_name" value="{{$en->enterprise_name}}">
                                    </div> --}}
                                    
                                    <div class="form-group">
                                        <label>Logo công ty</label>
                                        <img id="image-avatar" style="width: 100%">
                                    </div>
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
                            <a class="btn btn-waring btn-sm" href="{{asset('admin/doanhnghiep/taikhoan/delete_all')}}">reset</a>
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
                                <th>Tài khoản</th>
                                <th>Công ty</th>
                                <th colspan="2" width="10%" class="text-center">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $u)
                              <tr>
                                <td>{{$u->enterprise_id}}</td>
                                <td> <a href="{{asset('admin/doanhnghiep/taikhoan/chitiet/'.$u->id)}}">{{$u->user_name}}</a></td>
                                @if(!empty($u->Enterprises->enterprise_name))
                                <td>{{$u->Enterprises->enterprise_name}}</td>
                                @else
                                <td>Công ty đã bị xóa</td>
                                @endif
                                {{-- <td>{{$u->area_name}}</td> --}}
                                <td><a class="btn btn-success" href="{{asset('admin/doanhnghiep/taikhoan/edit/'.$u->id)}}"><i class="fa fa-edit"></i></a></td>
                                <td><a class="btn btn-danger" href="{{asset('admin/doanhnghiep/taikhoan/delete/'.$u->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không ???')"><i class="fa fa-trash-o"></i></a></td>
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
    <script>
        $(document).ready(function(){
          $selectUser = $('select[name = "dn_user_info"]')
            $($selectUser).change(function(){
                var id = this.value

                $.ajax({
                    url: '/admin/doanhnghiep/taikhoan/get-avatar/'+id,
                    type: 'get',
                    success:function(data){
                        $('#image-avatar').attr('src','{{asset('../storage/app/public/')}}/' +data+'?'+new Date())
                        console.log(data)
                    },
                    errors: function (err) {
                        console.log(err)
                    }
                })

            })
        })
    </script>
@stop