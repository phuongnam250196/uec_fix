<div class="dn-tab">
    <div class="dn-tab-title text-center">
        <h4>doashboard</h4>
    </div>
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="card-link" href="{{url('student/info')}}">Thông tin cá nhân</a> <a class="float-right" data-toggle="collapse" href="#collapse5"><i class="ml-auto mt-2 fas fa-angle-down"></i></a>
            </div>
            <div id="collapse5" class="collapse show">
              <ul>
                <li><a href="{{url('student/update_work')}}">Cập nhật việc làm</a></li>
              </ul>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <a class="card-link" href="{{url('student/cv')}}">Tạo CV</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="card-link" href="{{url('student/tintuyendung')}}">Tin tuyển dụng</a>
            </div>
        </div>
          
        <div class="card">
            <div class="card-header">
                <a class="card-link" href="{{url('student/khoadaotao')}}">Xem khóa đào tạo</a> 
            </div>
        </div>
          <div class="card">
            <div class="card-header">
              <a class="collapsed card-link" href="{{url('student/result')}}">Xem kết quả ứng tuyển</a>
            </div>
          </div>
    </div>
</div>

<nav class="nav-child">
    <div class="nav-child-title text-center">
        <h3>Tin doanh nghiệp liên quan</h3>
    </div>
    <ul>
        @foreach(tin_new() as $new)
        <li>
            <div class="media">
              <a href="{{url('student/tintuyendung/'.$new->id)}}"><img src="{{asset('local/storage/app/tintuyendung/'.$new->recruitment_img)}}"></a>
              <div class="media-body">
                <h4><a href="{{url('student/tintuyendung/'.$new->id)}}">{{$new->recruitment_name}}</a></h4>
                <div class="media-body-nhatruong">
                    <p class="text-secondary">{{$new->enterprise_name}} - {{$new->recruitment_name}}</p>
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