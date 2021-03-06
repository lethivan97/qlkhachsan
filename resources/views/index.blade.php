<?php
use App\Models\LoaiPhong;
$listLoaiPhong = LoaiPhong::all();
session_start();
?>
@extends('layouts._share.client')
@section('content')
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Chào mừng đến với khách sạn</h6>
                <h2>Royal Hotel</h2>
                <p>Chào Mừng Quý Khách Đến Khách Sạn Royal Hotel Ha noi.
                Khách sạn Royal Hotel sẽ là ngôi nhà thứ 2 trong chuyến đi của quý khách tới thủ đô Hà Nội. </p>
                <p>
                    Quý khách sẽ có một địa chỉ lưu trú thật ấm cúng, tiện nghi tại Hà Nội.
                    Tọa lạc tại Vị trí Trung tâm Hà Nội với trên 58 phòng khách sạn trang thiết bị hiện đại trong tòa nhà cao 14 tầng bao gồm cả tầng hầm để xe và nhà hàng, quán bar tại tầng 2 và tầng 3 của tòa nhà và rất nhiều dịch vụ khác .  Để đặt phòng quý khách vui lòng liên hệ trực tiếp bộ phận đặt phòng: Điện thoại: (+84-24) 3944 6188 - Hotline: +84933534999
                </p>
                <a class="btn theme_btn button_hover">E-mail: levan.hy.97@gmail.com</a>
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-4">
                    <h2>Đặt phòng<br>ngay bây giờ !</h2>
                </div>
                <div class="col-md-8">
                    <div class="boking_table">
                        <div class="row">
                            <form class="row" method="get" style="width: 100%" action="{{route('search')}}">
                                <div class="col-md-12">
                                    @if(Session::has('thongbao'))
                                    <p class="text-danger">{{Session::get('thongbao')}}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker11'>
                                                <input type="text"  name="NgayDen" class="form-control" autocomplete="off" placeholder="Thời gian đến"/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if($errors->has('NgayDen'))
                                            <p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('NgayDen')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type="text"  name="NgayDi" class="form-control" autocomplete="off" placeholder="Thời gian đi"/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if($errors->has('NgayDi'))
                                            <p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('NgayDi')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="book_tabel_item">
                                        <div class="input-group">
                                            <select class="wide" name="MaLoai">
                                                <option data-display="Loại Phòng" value="">Loại Phòng</option>
                                                <?php foreach ($listLoaiPhong as $item): ?>
                                                    <option value="{{$item->MaLoai}}">{{$item->TenLoai}}</option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <button class="book_now_btn button_hover" type="submit">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Banner Area =================-->

<!--================ Accomodation Area  =================-->

<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Loại phòng của khách sạn</h2>
            <p>Tất cả chúng ta đều sống trong thời đại trẻ trung. Cuộc sống đang trở nên cực kỳ nhanh chóng,phát triển và đầy đủ tiện nghi...</p>
        </div>
        <div class="row mb_30">
            <?php foreach ($listLoaiPhong as $item): ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <?php foreach (LoaiPhong::image($item->images) as $i): ?>
                                <a href="{{route('loaiphong.chitiet',['name' => $item->BiDanh])}}" >
                                    <img src="{{asset('image/loaiphong')}}/{{$i}}" width="262" height="270">
                                </a>

                                @break
                            <?php endforeach?>
                            <a href="{{route('datphong',['name' => $item->BiDanh])}}" class="btn theme_btn button_hover">Đặt phòng</a>
                        </div>
                        <a href="{{route('loaiphong.chitiet',['name' => $item->BiDanh])}}"><h4 class="sec_h4">{{$item->TenLoai}}</h4></a>
                        <h5>${{$item->DonGia}}/ngày</h5>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->

<!--================ Facilities Area  =================-->
@include('layouts._share.client.tienich')
<!--================ Facilities Area  =================-->

<!--================ About History Area  =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color">Giới thiệu về chúng tôi <br>Lịch sử<br>Sứ mệnh & Tầm nhìn</h2>
                    <p>Nằm ở vị trí tuyệt đẹp ngay giữa trung tâm Thủ Đô của Việt Nam, Royal Hotel Hanoi luôn chào đón tất cả các vị khách đang tìm kiếm địa điểm nghỉ chân sang trọng với tiện nghi hàng đầu và dịch vụ chu đáo nhất tại Việt nam.</p>
                    <p>
                        Các phòng nghỉ sang trọng và nhiều tiện nghi, từ khu phòng hội nghị hiện đại đến nhà hàng buffet  Quốc tế  khách sạn Royal  trở thành sự lựa chọn hoàn hảo để đi công tác hay nghỉ ngơi. Royal Hanoi cũng mang đến một thế giới ẩm thực hấp dẫn để quý khách khám phá, từ những bữa ăn tự chọn theo chủ đề quốc tế quý khách sẽ được phục vụ tại nhà hàng của khách sạn.....
                    </p>
                    <a href="{{route('gioithieu')}}" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="image/about_bg.jpg" alt="img">
            </div>
        </div>
    </div>
</section>
@endsection