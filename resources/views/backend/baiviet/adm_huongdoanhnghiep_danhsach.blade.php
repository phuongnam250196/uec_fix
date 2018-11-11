@extends('backend.master')
@section('title', 'Tin tức')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý hướng về doanh nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Bài viết</li>
            <li>Hướng về doanh nghiệp</li>
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
                  <h3 class="box-title"><strong>Thêm mới</strong></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                      @if(empty($huong))
                        <a class="btn btn-info btn-sm" href="{{asset('admin/baiviet/huongdoanhnghiep')}}">Thêm mới</a>
                      @else 
                      <a class="btn btn-info btn-sm" href="{{asset('admin/baiviet/huongdoanhnghiep/edit/'.$huong->id)}}">Cập nhật</a>
                      @endif
                      <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /. tools -->
              </div>
              <div class="box-body">
                @if(!empty($huong))
                <div class="">
                  <label>Tiêu đề</label>
                  <p>{{$huong->towardbusiness_name}}</p>
                </div>
                <div class="">
                  <label>Ảnh minh học</label>
                 <p> <img src="{{asset('/'.$huong->towardbusiness_img)}}" width="100"></p>
                </div>
                <div>
                  <label>Nội dung</label>
                  <p>{!! $huong->towardbusiness_content !!}</p>
                </div>
              </div>
              <div class="box-footer clearfix">
                  <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
              </div>
              @else
              <p>Bạn chưa nhập có giới thiệu trường</p>
              @endif
            </div>
        </section>
        <section class="col-lg-3">          
            <div class="box box-info">
              <div class="box-header">
                  <h3 class="box-title"><strong>Danh sách mục liên quan</strong></h3>
              </div>
              <div class="box-body">
                  <ul class="list-group">
                    <li class="list-group-item"><a href="{{asset('admin/baiviet/tintuc')}}"><i class="fa fa-angle-double-right"></i> Viết tin tức</a></li>
                    <li class="list-group-item"><a href="{{asset('admin/baiviet/gioithieu')}}"><i class="fa fa-angle-double-right"></i> Nhập thông tin UEC</a></li>
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
      <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Sửa Hướng về doanh nghiệp</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input required type="text" id="tt_title" class="form-control" value="" name="tt_title">
                       
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Ảnh minh họa</label>
                        <input type="file" class="form-control" id="tt_img" value="" name="tt_img">
                       
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="form-group">
                      <label for="comment">Nội dung</label>
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
    </section>
    <!-- /.content -->
</div>
@stop