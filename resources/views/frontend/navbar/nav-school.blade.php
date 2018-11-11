<div class="dn-tab">
    <div class="dn-tab-title text-center">
        <h4><a href="{{url('school')}}">doashboard</a></h4>
    </div>
    <div id="accordion">
    <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" href="{{url('school/info')}}">Thông tin nhà trường</a>
        </div>
     </div>
    <div class="card">
        <div class="card-header">
            <a class="card-link" href="{{url('school/sinh_vien')}}">Quản lý tài khoản sinh viên</a> <a class="float-right" data-toggle="collapse" href="#collapseOne"><i class="ml-auto mt-2 fas fa-angle-down"></i></a>
        </div>
        <div id="collapseOne" class="collapse show">
            <ul>
                <li><a href="{{url('school/update_work')}}">Cập nhật việc làm</a></li>
                <li><a href="{{url('school/reset_password')}}">Reset Mật khẩu</a></li>
            </ul>
        </div>
    </div>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" href="{{url('school/report')}}">Báo cáo - Thống kê</a>
        </div>
      </div>
    </div>
</div>
<br>
<nav class="nav-child">
    <div class="nav-child-title text-center">
        <h3>Tin doanh nghiệp liên quan</h3>
    </div>
    <ul>
        @foreach(tin_new() as $new)
        <li>
            <div class="media">
              <img src="{{asset('/'.$new->recruitment_img)}}">
              <div class="media-body">
                <h4><a href="#">{{$new->recruitment_name}}</a></h4>
                <div class="media-body-nhatruong">
                    <p class="text-secondary">{{$new->enterprise_name}} - {{$new->area_name}}</p>
                    <p><small><i>{{$new->created_at}}</i></small></p>
                </div>
              </div>
            </div>
        </li>
        @endforeach
        
    </ul>
</nav>
<nav class="nav-child">
    <div class="nav-child-title text-center">
        <h3>Liên hệ</h3>
    </div>
    <ul>
        <li>Email: uec@gmail.com</li>
        <li>Phone: 0978 883 234</li>
        <li>Zalo: tlu-2</li>
    </ul>
</nav>