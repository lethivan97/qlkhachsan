@extends('layouts._share.client')
@section('content')
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Giới thiệu về chúng tôi</h2>
            <ol class="breadcrumb">
                <li><a href="{{route('client')}}">Trang chủ</a></li>
                <li class="active">Giới thiệu</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ About History Area  =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color">Giới thiệu về chúng tôi <br>Lịch sử<br>Sứ mệnh & Tầm nhìn</h2>
                    <p>Nằm ở vị trí tuyệt đẹp ngay giữa trung tâm Thủ Đô của Việt Nam, Royal Hotel Hanoi luôn chào đón tất cả các vị khách đang tìm kiếm địa điểm nghỉ chân sang trọng với tiện nghi hàng đầu và dịch vụ chu đáo nhất tại Việt nam.</p>
                    <p>
                        Các phòng nghỉ sang trọng và nhiều tiện nghi, từ khu phòng hội nghị hiện đại đến nhà hàng buffet  Quốc tế  khách sạn Royal  trở thành sự lựa chọn hoàn hảo để đi công tác hay nghỉ ngơi. Royal Hanoi cũng mang đến một thế giới ẩm thực hấp dẫn để quý khách khám phá, từ những bữa ăn tự chọn theo chủ đề quốc tế quý khách sẽ được phục vụ tại nhà hàng của khách sạn.
                    </p>
                    <p>
                        Tọa lạc tại một vị trí đắc địa ở Hà Nội, khách sạn rất gần các quận trọng điểm và những điểm tham quan chính như Nhà hát Lớn Hà Nội, Khu Phố Cổ, Văn Miếu và Lăng Chủ tịch Hồ Chí Minh. Tôn vinh nền văn hoá giàu truyền thống của đất nước này, bên cạnh kỳ quan thiên nhiên Vịnh Hạ Long, bàn tiếp tân du lịch của khách sạn cung cấp rất nhiều lựa chọn để quý khách khám phá Việt Nam.
                    </p>
                    <p>
                        Tất cả các phòng đều có góc ngắm cảnh tuyệt đẹp, đội ngũ nhân viên chuyên nghiệp và tiện nghi vượt trội, Royal Hanoi là nơi hoàn hảo cho bất kỳ ai muốn xua tan sự hối hả và ồn ã của thành phố để trải nghiệm những phút giây thư giãn tuyệt vời. Nằm ở trung tâm với các điểm tham quan chính gần đó
                        Nội thất trang nhã với tầm nhìn tuyệt đẹp ra thành phố
                        Trang thiết bị hội nghị và hội nghị tuyệt vời
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="image/about_bg.jpg" alt="img">
            </div>
        </div>
    </div>
</section>
<!--================ About History Area  =================-->

<!--================ Facilities Area  =================-->
@include('layouts._share.client.tienich')
<!--================ Facilities Area  =================-->
@endsection