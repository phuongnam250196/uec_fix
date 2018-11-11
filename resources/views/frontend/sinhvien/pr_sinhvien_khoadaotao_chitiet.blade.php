@extends('frontend.master')
@section('title', 'Sinh viên | Chi tiết khóa đào tạo')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.sinhvien.nav.nav-student')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>Khóa: {{$kdt->training_name}}</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('student')}}">Sinh viên</a></li>
                              <li class="breadcrumb-item active">Chi tiết kdt</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="khoa_dao_tao">
                    <div class="row kdt_row">
                        <div class="col-md-8 kdt_col">
                            <div class="kdt_detail" style="background: white;">
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Trình độ:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->skill_name}}</p>
                                </div>                          
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Số lượng học viên:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->training_amount_student}} người</p>
                                </div>
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Thời gian khóa học:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->training_timeserving}}</p>
                                </div>
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Hạn nộp:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->training_deadline}}</p>
                                </div> 
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Địa điểm:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->training_address}}</p>
                                </div> 
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Khu vực:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->area_name}}</p>
                                </div> 
                                <div class="row">
                                    <p class="noidung-post-x col-lg-5">Mô tả khóa học:</p>
                                    <p class="noidung-post-x col-lg-7">{{$kdt->training_describe}}</p>
                                </div>                           
                                
                                
                                <br>
                                <div class="btn btn_detail">
                                    @if(!empty($set) && $set->status == 1)
                                        <button id="dk_kdt" class="btn btn-outline-info" disabled='disabled'>Đăng ký</button>
                                    @else
                                        <button id="dk_kdt" class="btn btn-outline-info">Đăng ký</button>
                                    @endif

                                    @if(!empty($set) && $set->status_save == 1)
                                        <button id="dk_save" class="btn btn-outline-secondary" disabled='disabled'>Lưu lại</button>
                                    @else
                                        <button id="dk_save" class="btn btn-outline-secondary">Lưu lại</button>
                                    @endif
                                  <a href="{{url('/student/khoadaotao')}}" class="btn btn-outline-danger">Hủy bỏ </a>
                                </div>
                                <script>
                                     $(document).ready(function(){
                                        $('#dk_kdt').click(function(e){
                                            // alert('thanh cong')
                                    
                                           $.ajax({
                                              url: "{{ url('/student/khoadaotao/'.$kdt->id) }}",
                                              method: 'post',
                                              headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                              },
                                              data: {
                                                id: {{(!empty($set->id))?$set->id:0}},
                                                 training_id: {{$kdt->id}},
                                                 student_id: {{$st->student_id}}
                                              },
                                              success: function(result){
                                                 alert('Đăng ký học thành công')
                                                 location.reload()
                                              }});
                                         });

                                        $('#dk_save').click(function(e){
                                            // alert('thanh cong')
                                    
                                           $.ajax({
                                              url: "{{ url('/student/khoadaotao2/'.$kdt->id) }}",
                                              method: 'post',
                                              headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                              },
                                              data: {
                                                 id: {{(!empty($set->id))?$set->id:0}},
                                                 training_id: {{$kdt->id}},
                                                 student_id: {{$st->student_id}}
                                              },
                                              success: function(result){
                                                 alert('Bạn đã lưu khóa đào tạo')
                                                 console.log(result)
                                                 location.reload()
                                          }});
                                       });
                                });
                                </script>
                            </div>
                        </div>
                        <div class=" col-md-4 kdt_col">
                            <div class="text-center kdt_company">
                                <a href="#"><img class="rounded-circle" src="{{asset('/'.$kdt->enterprise_logo)}}" alt=""></a>
                                <p><strong>{{$kdt->enterprise_name}}</strong></p>
                                <div class="five_row">{!! $kdt->enterprise_describe !!}</div>
                                <div class="">
                                    <a href="{{$kdt->enterprise_web}}" class="btn border-secondary"><i class="fas fa-globe"></i> Website</a>
                                    <a href="{{$kdt->enterprise_fanpage}}" class="btn border-secondary"><i class="fab fa-facebook"></i> Fanpage</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop