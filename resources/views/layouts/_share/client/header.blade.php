<?php
use App\Models\LoaiPhong;

$loaiPhong = LoaiPhong::all();
?>
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="#"><img src="image/Logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">Giới thiệu</a></li>

                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Loại phòng & Giá phòng</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($loaiPhong as $item): ?>
                                <li class="nav-item"><a class="nav-link" href="#">{{$item->TenLoai}}</a></li>
                            <?php endforeach?>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Dịch vụ khách sạn</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Đăng ký</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>