<?php
use App\Models\LoaiPhong;

$loaiPhong = LoaiPhong::all();
?>
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{route('client')}}"><img src="{{asset('image/Logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('client')}}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('gioithieu')}}">Giới thiệu</a></li>

                    <li class="nav-item submenu dropdown">
                        <a href="{{route('loaiphong')}}" class="nav-link" data-toggle="dropdown" role="button"  aria-expanded="false">Loại phòng & Giá phòng</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('loaiphong')}}">Tất cả</a></li>
                            <?php foreach ($loaiPhong as $item): ?>
                                <li class="nav-item"><a href="{{route('loaiphong.chitiet',['id'=>$item->BiDanh])}}" class="nav-link">{{$item->TenLoai}}</a></li>
                            <?php endforeach?>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('dichvu')}}">Dịch vụ khách sạn</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('lienhe')}}">Liên hệ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Đăng ký</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>