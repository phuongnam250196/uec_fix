@extends('backend.master')
@section('title', 'Danh sách giáo viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Giáo viên</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách Giáo viên</li>
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
            <section class="col-lg-12 connectedSortable">
                {{-- Danh sach danh nghiệp --}}
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Danh sách thông tin</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <a class="btn btn-info btn-sm" href="{{url('admin/giaovien/thongtin/')}}">Thêm mới</a>
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
                                <th class="text-center">Mã</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên giáo viên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Khoa</th>
                                <th colspan="2" width="20%" class="text-center">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($teach as $a)
                                  <tr>
                                    <td class="text-center">{{$a->id}}</td>
                                    <td><img src="{{asset('../storage/app/giaovien/'.$a->teacher_img)}}" width="100"></td>
                                    <td>{{$a->teacher_name}}</td>
                                    <td>{{$a->teacher_phone}}</td>
                                    <td>{{$a->teacher_email}}</td>
                                    <td>{{$a->science_name}}</td>
                                    <td><a  href="{{asset('admin/giaovien/thongtin/edit/'.$a->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
                                    <td><a href="{{asset('admin/giaovien/thongtin/delete/'.$a->id)}}" onclick="return confirm('Bạn có chắc muốn xóa không???')" class="btn btn-danger del"><i class="fa fa-trash-o"></i> Xóa</a></td>


                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                          <div class="box-footer clearfix text-right">
                            {{ $teach->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->
            </section>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop