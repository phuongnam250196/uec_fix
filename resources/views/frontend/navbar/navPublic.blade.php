<nav id="nav-menu">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand d-lg-none" href="{{url('/')}}"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#colap2">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="colap2">
        <ul class="navbar-nav m-auto">
          <li class="nav-item  {{ Request::is('/')?'active':'' }}">
            <a class="nav-link" href="{{asset('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{asset('baiviet')}}"><i class="fas fa-newspaper"></i> Tin tức</a>
          </li> --}}
          <li class="nav-item  {{ (Request::is('doanhnghiep'))?'active':'' }}">
            <a class="nav-link" href="{{asset('doanhnghiep')}}"><i class="fas fa-building"></i> Doanh nghiệp</a>
          </li>
          <li class="nav-item {{ Request::is('timviec')?'active':'' }}">
            <a class="nav-link" href="{{asset('timviec')}}"><i class="fas fa-search-plus"></i> Tìm việc làm</a>
          </li> 
          <li class="nav-item  {{ Request::is('khoadaotao')?'active':'' }}">
            <a class="nav-link" href="{{asset('khoadaotao')}}"><i class="fas fa-book"></i> Khóa đào tạo</a>
          </li>
          <li class="nav-item  {{ Request::is('lienhe')?'active':'' }}">
            <a class="nav-link" href="{{asset('lienhe')}}"><i class="fas fa-mobile-alt"></i> Liên hệ</a>
          </li> 
        </ul>
      </div> 
    </nav>
  </div>
</nav>