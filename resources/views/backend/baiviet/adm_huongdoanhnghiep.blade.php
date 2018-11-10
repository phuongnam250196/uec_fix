@extends('backend.master')
@section('title', 'Hướng về doanh nghiệp')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý hướng về doanh nghiệp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li>Bài viết</li>
            <li class="active">Hướng về doanh nghiệp</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <section class="col-lg-9 connectedSortable">          
            <div class="box box-info">
                <form method="post" enctype="multipart/form-data">
                    <div class="box-header">
                        <i class="fa fa-plus-circle text-primary"></i>
                        <h3 class="box-title"><strong>Thêm mới</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          
                            <a class="btn btn-info btn-sm" href="{{url('admin/baiviet/huongdoanhnghiep/danhsach')}}">Danh sách</a>
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                              <div class="form-group">
                                  <label>Chọn ảnh</label>
                                  {{-- <input type="file" class="form-control" value="" name="tt_img"> --}}
                                  <input id="img" type="file" name="tt_img" class="form-control" style="display: none" onchange="changeImg(this)" >
                                  <img id="avatar" class="thumbnail" src="{{url('public/upload/images/new_seo-10-512.png')}}" width="100%">
                              </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input required type="text" class="form-control" value="" name="tt_title">
                                   
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="comment">Nội dung</label>
                                  <textarea id="tt_content" class="ckeditor" name="tt_content" rows="10" style="width: 100%">
                                  </textarea>
                                   <script type="text/javascript">
                                    var editor = CKEDITOR.replace('tt_content',{
                                      language:'vi',
                                      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
                                      filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
                                      filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                      filebrowserFlashUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    });
                                  </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="{{asset('admin/home')}}" class="pull-right btn btn-default" id="sendEmail">Back <i class="fa fa-arrow-circle-left"></i></a>
                        <button class="pull-left btn btn-primary">Thêm mới </button>
                    </div>
                    {{csrf_field()}}
                </form>
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
    </section>
</div>
@stop