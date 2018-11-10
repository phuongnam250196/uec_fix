@extends('backend.master')
@section('title', 'Thông tin Doanh nghiệp')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới Doanh Nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Doanh nghiệp</li>
            <li class="active">Thêm mới</li>
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
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-12 connectedSortable">
                {{-- Danh sach danh nghiệp --}}
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Danh sách thông tin</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <a class="btn btn-info btn-sm" href="{{url('admin/doanhnghiep/thongtin/add')}}">Thêm mới</a>
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
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Tỉnh/Thành phố</th>
                                <th colspan="2" width="20%" class="text-center">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($enter as $a)
                                  <tr id="url{{$a->id}}">
                                    <td class="text-center">{{$a->id}}</td>
                                    <td><img src="{{asset('../storage/app/public/'.$a->enterprise_logo)}}" width="50"></td>
                                    <td>{{$a->enterprise_full_name}}</td>
                                    <td>{{$a->enterprise_phone}}</td>
                                    <td>{{$a->enterprise_email}}</td>
                                    <td>{{$a->area_name}}</td>
                                    <td><a  href="{{asset('admin/doanhnghiep/thongtin/edit/'.$a->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa không???')" class="btn btn-danger del" data-id="{{$a->id}}" data-token="{{csrf_token()}}" value="{{$a->id}}"><i class="fa fa-trash-o"></i> Xóa</a>
                                        <script>    
                                              $('.del').click(function() {
                                                var id=$(this).attr('value');
                                                $.ajax({
                                                    url: "{{asset('admin/doanhnghiep/thongtin/delete')}}/"+id,
                                                    type: 'GET',
                                                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                                    success: function() {
                                                       console.log('thanh cong');
                                                       $("#url"+id).remove();
                                                    },
                                                });
                                            });
                                      </script>
                                    </td>


                                  </tr>
                                  
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                          <div class="box-footer clearfix text-right">
                            {{ $enter->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                    <!-- /.box-body -->
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