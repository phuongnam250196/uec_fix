@extends('backend.master')
@section('title', 'Nghề nghiệp')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Danh mục khác - Nghề nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Nghề nghiệp</li>
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
            <section class="col-lg-5 connectedSortable">
                <!-- Thêm mới nghề nghiệp -->
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
                        <form method="POST">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(session('sucess'))
                                            <div class="alert alert-success">{{session('sucess')}}</div>
                                        @endif
                                            <div class="form-group">
                                                <label>Tên nghề nghiệp</label>
                                                <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control">
                                                @if($errors->has('name'))
                                                  <p class="help text-danger">{{ $errors->first('name') }}</p>
                                                @endif
                                            </div>
                                         
                                            <div class="form-group">
                                              <label>Mô tả nghề nghiệp</label>
                                              <textarea id="describe" class="form-control" name="describe" rows="5"></textarea>
                                              @if($errors->has('describe'))
                                                  <p class="help text-danger">{{ $errors->first('describe') }}</p>
                                                @endif
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer clearfix">
                                <button type="button" class="pull-left btn btn-primary" id="them">Thêm mới </button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </form>
                
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-7 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Danh sách nghề nghiệp đã tạo</h3>
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
                        @if(session('success'))
                            <div class="alert alert-success text-center">{{session('success')}}</div>
                        @endif
                       <div class="table-responsive">          
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">Mã nghề</th>
                                <th>Tên nghề nghiềp</th>
                                <th>Mô tả nghề</th>
                                <th class="text-center" colspan="2">Tùy chọn</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($nn as $nghenghiep)
                                  <tr class="item-nghe-nghiep" id="url{{$nghenghiep->id}}">
                                    <td class="text-center">{{$nghenghiep->id}}</td>
                                    <td>{{$nghenghiep->career_name}}</td>
                                    <td>{{$nghenghiep->career_describe}}</td>
                                    <td width="5%"><a class="btn btn-warning" style="margin-right: 5px;" href="{{asset('admin/danhmuckhac/nghenghiep/edit/'.$nghenghiep->id)}}"><i class="fa fa-edit"></i> Sửa</a></td>
                                    <td width="5%"><a class="btn btn-danger" href="{{asset('admin/danhmuckhac/nghenghiep/delete/'.$nghenghiep->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" data-id="{{$nghenghiep->id}}" data-token="{{csrf_token()}}" value="{{$nghenghiep->id}}"><i class="fa fa-trash-o"></i> Xóa</a></td>
                                  </tr>
                                  @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="box-footer clearfix text-right">
                            {{ $nn->links('vendor.pagination.bootstrap-4') }}
                        </div>
                         
                    </div>
                </div>
                <!-- /.box -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <script>
        $(document).ready(function(){
            $('#them').click(function() {  
                // alert('dsajdsla')
                $.ajax({
                    url : '{{asset('admin/danhmuckhac/nghenghiep')}}',
                    type: 'POST',
                    data: {
                            name : $('#name').val(),
                            describe : $('#describe').val()
                        },
                   headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function(data) {
                       console.log(data.message);
                       alert('dfsf')
                       let id = data.id

                       let html = ''
                        html = '<tr class="item-nghe-nghiep">'+
                        '<td class="text-center">'+id+'</td>'+
                        '<td>'+$('#name').val()+'</td>'+
                        '<td>'+$('#describe').val()+'</td>'+
                        '<td><a id="btn-edit" class="btn btn-warning" style="margin-right: 5px;" href="{{url('admin/danhmuckhac/nghenghiep/edit/')}}.$nghenghiep->id"><i class="fa fa-edit"></i> Sửa</a></td><td><a id="btn-delete" class="btn btn-danger" href="#" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\')"><i class="fa fa-trash-o"></i> Xóa</a></td></tr>'
                    
    
                       $('.item-nghe-nghiep:eq(0)').before(html)
                      
                    },
                    error:function(err){
                        console.log(err)
                    }
                });
            });

            $('#btn-delete').click(function() {
               var id=$(this).attr('value');
                $.ajax({
                    url: "{{asset('admin/danhmuckhac/nghenghiep/delete')}}/"+id,
                    type: 'GET',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                       console.log('thanh cong');
                       $("#url"+id).remove();
                    },
                });
            });
        })
    </script>
    <!-- /.content -->
</div>
@stop