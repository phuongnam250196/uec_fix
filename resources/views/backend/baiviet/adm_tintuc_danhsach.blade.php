@extends('backend.master')
@section('title', 'Tin tức')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Tin tức</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Bài viết</li>
            <li>Tin tức</li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-lg-9 connectedSortable">          
            <div class="box box-info">
              <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong></strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          
                            <a class="btn btn-info btn-sm" href="{{url('admin/baiviet/tintuc')}}">Thêm mới</a>
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                <div class="box-body table-responsive no-padding dd">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th width="30%">Tiêu đề tin</th>
                      <th>Ảnh minh họa</th>
                      <th>Nội dung</th>
                      <th colspan="2" class="text-center">Tùy chọn</th>
                    </tr>
                    @foreach($data as $tintuc)
                    <tr>
                      <td>{{$tintuc->id}}</td>
                      <td>{{$tintuc->news_name}}</td>
                      <td><img src="{{asset('../storage/app/tintuc/'.$tintuc->news_img)}}" width="100"></td>
                      <td><div class="cut-string">{!! strip_tags(preg_replace("/<img[^>]+\>/i", "(image) ", $tintuc->news_content)) !!}</div></td>
                      <td><a href="{{asset('admin/baiviet/tintuc/edit/'.$tintuc->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
                      <td><a href="{{asset('admin/baiviet/tintuc/delete/'.$tintuc->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash-o"></i> Xóa</a></td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                {{$data->links('vendor.pagination.bootstrap-4')}}
                <div class="box-footer clearfix">
                    <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>                    
                </div>
                    {{csrf_field()}}
            </div>
        </section>
        
        <section class="col-lg-3">          
            <div class="box box-info">
              <div class="box-header">
                  <h3 class="box-title"><strong>Danh sách mục liên quan</strong></h3>
              </div>
              <div class="box-body">
                  <ul class="list-group">
                    <li class="list-group-item"><a href="{{asset('admin/baiviet/gioithieu')}}"><i class="fa fa-angle-double-right"></i> Nhập thông tin UEC</a></li>
                    <li class="list-group-item"><a href="{{asset('admin/baiviet/huongdoanhnghiep')}}"><i class="fa fa-angle-double-right"></i> Hướng về doanh nghiệp</a></li>
                    <li class="list-group-item"><a href="{{asset('admin/baiviet/thongtinsinhvien')}}"><i class="fa fa-angle-double-right"></i> Thông tin sinh viên</a></li>
                    <li class="list-group-item"><a href="{{asset('admin/baiviet/dinhhuongnghe')}}"><i class="fa fa-angle-double-right"></i> Định hướng nghề nghiệp</a></li>
                    <li class="list-group-item "><a href="{{asset('admin/baiviet/jobfair')}}"><i class="fa fa-angle-double-right"></i> Job Fair</a></li>
                  </ul>
              </div>
            </div>
        </section>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Bạn đang xem tin tức</h4>
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
     <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sửa Tin tức</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Tiêu đề tin tức</label>
                        <input required type="text" id="tt_title" class="form-control" value="" name="tt_title">
                       
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Chọn ảnh minh họa tin tức</label>
                        <input type="file" class="form-control" id="tt_img" value="" name="tt_img">
                       
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="form-group">
                      <label for="comment">Nội dung tin tức</label>
                      <textarea id="tt_content" name="tt_content" rows="10" style="width: 100%"></textarea>
                       <script type="text/javascript">
                        $(function () {
                          CKEDITOR.replace('tt_content');
                          $(".textarea").wysihtml5();
                        });
                      </script>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="sbm_success" class="btn btn-success">Cập nhật</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
     {{--  <script type="text/javascript">

        $(document).ready(function() {
          $('#myModal2').delegate('#sbm_success', 'click', function() {

               var form_data = new FormData();
               var files = $('#tt_img')[0].files[0];
               form_data.append('tt_img', files);
               form_data.append('tt_title', $('#myModal2 input[name="tt_title"]').val());
               form_data.append('tt_content', $('#tt_content').val());

               $.ajax({
                  type: 'POST',
                  url: '{{asset('admin/baiviet/tintuc/danhsach/')}}',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  contentType: false,
                  processData: false,
                  data: form_data,
                  enctype: 'multipart/form-data',
                  // method: 'POST',
                  success: function(data) {
                      alert('thu');
                      if (data.status == 1) {
                          alert('Cập nhật thành công!');
                          // window.location="{{url('/')}}";
                      }
                  },
                  error: function(xhr) { // if error occured

                  }
              });

           });
        });
       

      </script> --}}
    </section>
    <!-- /.content -->
</div>
@stop