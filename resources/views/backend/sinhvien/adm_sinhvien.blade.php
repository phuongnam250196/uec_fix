@extends('backend.master')
@section('title', 'Thông tin sinh viên')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Sinh Viên</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sinh viên</li>
            <li class="active">Thông tin</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                 <div class="box-footer clearfix">
                    <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                    <a href="{{asset('admin/sinhvien/thongtin/themmot')}}" class="pull-left btn btn-primary" style="margin-right: 10px;">Thêm một sinh viên</a>
                    <a href="{{asset('admin/sinhvien/thongtin/themnhieu')}}" class="pull-left btn btn-primary">Thêm danh sách sinh viên</a>
                </div>
                <div class="box-header">
                  <button id="selectAll" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-play"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" />
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div> 
                @if(!empty($message))
                  ádfdsfds
                @endif
                
                @if(Session('them'))
                  <p class="alert alert-success">{{Session('them')}}</p>
                @endif
                <div class="box-body table-responsive no-padding dd">
                  <table class="table table-hover">
                    <tr>
                      <th>Lựa chọn</th>
                      <th>ID</th>
                      <th>Mã sinh viên</th>
                      <th>Họ tên sinh viên</th>
                      <th>Khoa</th>
                      <th>Lớp</th>
                      <th>Tốt nghiệp</th>
                      <th colspan="2" width="10%" class="text-center">Tùy chọn</th>
                    </tr>
                    @foreach($std as $s)
                    <tr>
                      <td width="5%" class="text-center"><input class="checkhour" type="checkbox" /></td>
                      <td>{{$s->id}}</td>
                      <td><a href="#" data-toggle="modal" data-target="#myModal">{{$s->student_code}}</a></td>
                      <td>{{$s->student_name}}</td>
                      <td>
                        @foreach($science as $sci)
                          @if($sci->id == $s->science_id)
                            <span class="label label-success">{{$sci->science_name}}</span>
                          @endif
                        @endforeach
                      </td>
                      
                      <td>
                        @foreach($class as $clas)
                          @if($clas->id == $s->class_id)
                            <span class="label label-success">{{$clas->class_name}}</span>
                          @endif
                        @endforeach
                      </td>
                      <td>{{(!empty($s->student_status)?'Tốt nghiệp': 'Chưa tốt nghiệp')}}</td>
                      <td><a href="{{asset('admin/sinhvien/thongtin/edit/'.$s->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                      <td><a href="{{asset('admin/sinhvien/thongtin/delete/'.$s->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    @endforeach
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {{$std->links('vendor.pagination.bootstrap-4')}}
                </div>
              </div><!-- /.box -->
            </div>
          </div>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thông tin chi tiết sinh viên</h4>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal.</p>
                   <p>Some text in the modal.</p>
                    <p>Some text in the modal.</p>
                     <p>Some text in the modal.</p>
                      <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </section>
   <script>

    var selectAll = document.getElementById('selectAll')
  
    selectAll.addEventListener('click',()=>{

          let input = selectAll.childNodes[0]

          if(input.checked)
          {
            input.checked = false
            let listCheckOut = document.getElementsByClassName('checkhour')
      
            for(let i = 0 ;i< listCheckOut.length ;i++)
            {
              listCheckOut[i].checked = false
            }
          }
          else{
            input.checked = true
            let listCheckOut = document.getElementsByClassName('checkhour')
      
           for(let i = 0 ;i< listCheckOut.length ;i++)
            {
              listCheckOut[i].checked = true
            }
          }
    })

     // $(document).ready(function() {
     //    // $(".checkbox-toggle").click(function() {
     //      // alert('dfsfsd')
     //      // Thêm thuộc tính checked cho ô checkAll
     //     // $(".dd table tr td input[type='checkbox']").attr('checked', '');
     //    //  var a = $('input:checkbox').is('checked');
     //    //    if (! $(".dd table tr td input[type='checkbox']").is('checked')) {
     //    //       $(".dd table tr td input[type='checkbox']").attr('checked', 'checked');
     //    //   } else {
     //    //       $(".dd table tr td input[type='checkbox']").removeAttr('checked');
     //    //   }   
     //    // });
     //    // 
     //    $('.checkbox-toggle').click(function(){
      
          
     //     // $(".dd table tr td input[type='checkbox']").attr('checked', true);
     //     // $(".checkbox-toggle").removeClass('.checkbox-toggle').addClass('abc');
     //    });

     //    $('.abc').click(function(){
     //       $(".dd table tr td input[type='checkbox']").removeAttr('checked');
     //      $(".abc").addClass('.checkbox-toggle').removeClass('abc');
     //    });
     //    // var clicked = false;
     //    // $(".checkbox-toggle").on("click", function() {
     //    //   $(".checkhour").prop("checked", !clicked);
     //    //   clicked = !clicked;
     //    // });
     //  });
   </script>
    <!-- /.content -->
</div>
@stop