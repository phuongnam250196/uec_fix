@extends('backend.master')
@section('title', 'Trang chủ')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Trang chủ</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Bài Viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Công việc</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Sinh viên</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Doanh nghiệp</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-8 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info text-primary"></i>
                        <h3 class="box-title"><strong>Thông tin UEC</strong></h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <p>Là đơn vị hàng đầu của Đại học Thăng Long</p>
                        <p>Đào tạo sinh viên có tri thức và kỹ năng làm việc ở bậc đại học và sau đại học với chất lượng tốt, đáp ứng yêu cầu cấp bách về nguồn nhân lực có trình độ cao của xã hội; bằng cách tạo ra những điều kiện học tập tốt, thực hành ứng dụng tối ưu trong bối cảnh toàn cầu hóa giáo dục, trong một thế giới hội nhập phẳng và nhanh. Chúng tôi đã và đang nỗ lực góp phần đưa sinh viên của mình tới các địa chỉ giáo dục tiên tiến trong khu vực và trên thế giới nhằm duy trì tính liên tục trong học tập, thực tập và nghiên cứu.</p>
                        <p>Trong sự kết nối ba thành phần nói trên thì cả ba bên đều mang lại lợi ích cho nhau. Song, với ba thành phần kết nối, sinh viên là viên gạch nóng nhất trong lò đào tạo nhân lực do vậy ngoài sự chủ động thay đổi chương trình đào tạo theo hướng bám sát thực tế của doanh nghiệp thì việc sớm định hướng xây dựng cho sinh viên đức tính tự tin, thể hiện bản lĩnh, trải nghiệm tự nghiên cứu, tự nâng cao tri thức và hoàn thiện cách làm việc nhóm cũng là một mục tiêu then chốt. Bằng vào những tố chất trên sinh viên không những chủ động tìm kiếm môi trường học tập, mà còn sẽ mang lại cho chính những Doanh nghiệp tuyển dụng họ các sáng tạo táo bạo được khơi lên từ góc nhìn thực tiễn trong đơn đặt hàng đào tạo của chính Doanh nghiệp đối với Nhà trường. <br>Đó là lý do tại sao chúng tôi đã tham gia một dự án hợp tác quốc tế nhằm giúp tăng cường mọi tương tác giữa Nhà Trường và các Doanh nghiệp, dẫn đến sự thành lập của Trung tâm Kết nối Đại học – Doanh Nghiệp (University-Enterprise Center, UEC) của Trường Đại học Thăng Long.<br>Tóm lại, chúng tôi hết sức hy vọng mô hình kết hợp Đại học – Doanh nghiệp sẽ được tăng cường, đẩy mạnh, nhân rộng đấy là nền tảng để Nhà trường nâng cao hơn nữa chất lượng đào tạo đáp ứng nhu cầu xã hội, tạo niềm tin ở xã hội và tâm lý chủ động mà an tâm đối với các Doanh nghiệp.<br>Hà Nội, ngày 5 tháng 12/2017 <br>Vũ Đỗ Quỳnh <br>Phó Hiệu trưởng, kiêm Giám đốc Trung tâm UEC-TLU <br>uec-tlu@thanglong.edu.vn</p>
                    </div>
                    
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-4 connectedSortable">
                
                <!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        TLU
                        <h3 class="box-title">logo  </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding text-center">
                        <img width="150" height="150" src="{{asset('../storage/app/logo/tlu.png')}}" class="img-circle" style="margin-top: 50px; margin-bottom: 100px;">
                    </div>
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