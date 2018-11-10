<div class="dn-tab">
    <div class="dn-tab-title text-center">
        <h4>doashboard</h4>
    </div>
    <div id="accordion">
    <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" href="{{url('teacher/info')}}">Quản lý tài khoản</a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
            <a class="card-link" href="{{url('teacher/list_sv')}}">Quản lý lớp - sinh viên</a> <a class="float-right" data-toggle="collapse" href="#collapseOne"><i class="ml-auto mt-2 fas fa-angle-down"></i></a>
        </div>
        <div id="collapseOne" class="collapse show">
          <ul>
            {{-- <li><a href="{{url('teacher/add_sv')}}">Xác nhận thông tin việc làm sinh viên</a></li> --}}
            <li><a href="{{url('teacher/class')}}">Thêm mới lớp</a></li>
            <li><a href="{{url('teacher/add_sv')}}">Thêm sinh viên</a></li>
          </ul>
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
              <img src="{{asset('local/storage/app/tintuyendung/'.$new->recruitment_img)}}">
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