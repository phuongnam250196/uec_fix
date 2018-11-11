@extends('backend.master')
@section('title', 'Thông tin chi tiết')
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
            <section class="col-lg-12 connectedSortable">          
                {{-- Thông tin doanh nghiệp --}}
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
                            <thead>
                              <tr>
                                <th class="text-center">Mã</th>
                                <th>Logo doanh nghiệp</th>
                                <th>Tên doanh nghiệp</th>
                                <th colspan="2" width="20%" class="text-center">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($dnct as $dnct)
                                  <tr>
                                    <td class="text-center">{{$dnct->enp_id}}</td>
                                    <td><img src="{{asset('/'.$dnct->enp_logo)}}" width="50"></td>
                                    <td>{{$dnct->enp_full_name}}</td>
                                    <td><a href="#" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
                                    <td><a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa</a></td>
                                  </tr>
                                  @endforeach
                            </tbody>
                          </table>
                      </div>
                          
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@stop