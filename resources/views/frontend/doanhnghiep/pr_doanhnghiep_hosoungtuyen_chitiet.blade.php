@extends('frontend.master')
@section('title', 'DN | Hồ sơ ứng tuyển')
@section('banner')
@include('frontend.slider.slider_pr')
@stop
@section('main')
<br>
<section id="dieuhuong-doc">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nav-doc">
                @include('frontend.doanhnghiep.nav.nav-enter')
            </div>
            <div class="col-md-8 baiviet">
                <div class="" style="background: white; margin-bottom: 15px;">
                    <div class="d-flex breadcrumb_title" style="padding-top: 5px;">
                      <div class="p-2 mr-auto"><h1 class="text-uppercase"><strong>{{$cv->jobapplication_name}}</strong></h1></div>
                      <div class="p-2">
                            <ul class="breadcrumb" style="background: white;">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{url('enterprise')}}">Doanh nghiệp</a></li>
                              <li class="breadcrumb-item active">hồ sơ chi tiết</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="row std_row">
                    <div class="col-md-8 std_col" >
                        <div class="std_col_1" style="background: white;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th>Thông tin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ID hoso</td>
                                            <td>{{$cv->id}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Lương</td>
                                            <td>{{$cv->jobapplication_salary}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngành nghề</td>
                                            <td>{{$cv->career_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Bằng cấp</td>
                                            <td>{{$cv->education_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Năm kinh nghiệm</td>
                                            <td>{{$cv->yearofexp_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Hình thức</td>
                                            <td>{{$cv->formality_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tỉnh/Thành phố</td>
                                            <td>{{$cv->area_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <td>{{$cv->jobapplication_purpose}}</td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái</td>
                                            <td>{{$cv->jobapplication_status==null?'Không':'có'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Người lập hồ sơ</td>
                                            <td>{{$cv->student_name}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                                @if(!empty($utr))
                                    <button class="btn btn-outline-primary" id="send_cv" title='Bạn đã mời làm việc' disabled='disabled'>Mời làm việc</button>
                                     <button class="btn btn-outline-secondary" id="tuchoi_cv" disabled='disabled'>Từ chối</button>
                                @else
                                    
                                    @if(!empty($utr2))
                                        <button class="btn btn-outline-primary" id="send_cv" disabled='disabled'>Mời làm việc</button>
                                        <button class="btn btn-outline-secondary" id="tuchoi_cv" title='Bạn đã từ chối hồ sơ' disabled='disabled'>Từ chối</button>
                                        
                                    @else
                                        <button class="btn btn-outline-primary" id="send_cv">Mời làm việc</button>
                                        <button class="btn btn-outline-secondary" id="tuchoi_cv">Từ chối</button>
                                    @endif
                                @endif
                                
                            </div>
                            <script>
                                 $(document).ready(function(){
                                    $('#send_cv').click(function(e){
                                        // alert('thanh cong')
                                
                                       $.ajax({
                                          url: "{{ url('/enterprise/cv_detail/'.$tin_id) }}",
                                          method: 'post',
                                          headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          },
                                          data: {
                                             id: {{$tin_id}},
                                             status: "work"
                                          },
                                          success: function(result){
                                             alert('Mời làm việc thành công')
                                             location.reload()
                                          }});
                                       });

                                    $('#tuchoi_cv').click(function(e){
                                        // alert('thanh cong')
                                
                                       $.ajax({
                                          url: "{{ url('/enterprise/cv_detail2/'.$tin_id) }}",
                                          method: 'post',
                                          headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          },
                                          data: {
                                             id: {{$tin_id}},
                                          },
                                          success: function(result){
                                             alert('Bạn đã từ chối hồ sơ này')
                                             location.reload()
                                          }});
                                       });
                                    });
                              </script>
                        </div>
                    </div>

                    <div class="col-md-4 std_col">
                        <div class="" style="background: white">
                          @if(!empty($userImg->student_img))
                            <img style="width: 100%" src="{{asset('../storage/app/sinhvien/'.$userImg->student_img)}}" alt="">
                            <p>{{$userImg->student_img}}</p>
                          @else
                            <p class="text-center p-5"><i class="fas fa-user-circle fa-10x text-blue"></i></p>
                          @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@stop