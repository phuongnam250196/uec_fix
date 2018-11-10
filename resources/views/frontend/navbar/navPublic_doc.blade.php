    <nav class="nav-child">
        <div class="nav-child-title text-center">
            <h3>Bài viết mới nhất</h3>
        </div>
        <ul>
            @foreach(bai_viet_new() as $bv_new)
            <li>
                <a href="{{url('/baiviet/'.$bv_new->id)}}">{{$bv_new->news_name}}</a>
                <p>{{date_format($bv_new->created_at, 'd/m/Y')}}</p>
            </li>
            @endforeach
            
        </ul>
    </nav> 
    
    <nav class="nav-child">
        <div class="nav-child-title text-center">
            <h3>Sự kiện gần nhất</h3>
        </div>
        <ul>
            @foreach(su_kien_new() as $sk_new)
            <li>
                <a href="{{url('/jobfair/'.$sk_new->id)}}">{{$sk_new->jobfair_name}}</a>
                <p>{{date_format($sk_new->created_at, 'd/m/Y')}}</p>
            </li>
            @endforeach
        </ul>
    </nav> 

    <nav class="nav-child">
        <div class="nav-child-title text-center">
            <h3>Liên hệ</h3>
        </div>
        <ul>
            <li>
                <a href="{{url('/dangnhap')}}">Login</a>
            </li>
            <li>
                <a href="{{url('/doanhnghiep')}}">Doanh nghiệp mới</a>
            </li>
            <li>
                <a href="{{url('/timviec')}}">Việc làm mới</a>
            </li>
        </ul>
    </nav>