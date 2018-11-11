<div class="dn-tab">
    <div class="dn-tab-title text-center">
        <h4>doashboard</h4>
    </div>
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" href="{{url('enterprise/info')}}/{{Auth::user()->id}}">Quản lý tài khoản</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="card-link" href="{{url('enterprise/list_ttd')}}">Quản lý tin tuyển dụng</a> <a class="float-right" data-toggle="collapse" href="#collapseOne"><i class="ml-auto mt-2 fas fa-angle-down"></i></a>
            </div>
            <div id="collapseOne" class="collapse">
                <ul>
                    <li><a href="{{url('enterprise/add_ttd')}}">Tạo tin tuyển dụng</a></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="card-link" href="{{url('enterprise/list_kdt')}}">Quản lý khóa đào tạo</a> <a class="float-right" data-toggle="collapse" href="#collapse4"><i class="ml-auto mt-2 fas fa-angle-down"></i></a>
            </div>
            <div id="collapse4" class="collapse">
                <ul>
                    <li><a href="{{url('enterprise/add_kdt')}}">Thêm khóa đào tạo</a></li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" href="{{url('enterprise/cv')}}">Hồ sơ đã ứng tuyển</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" href="{{url('enterprise/report')}}">Báo cáo - Thống kê</a>
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
              <a href="{{url('/enterprise/detail_ttd/'.$new->id)}}"><img src="{{asset('/'.$new->recruitment_img)}}"></a>
              <div class="media-body">
                <h4><a href="{{url('/enterprise/detail_ttd/'.$new->id)}}">{{$new->recruitment_name}}</a></h4>
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