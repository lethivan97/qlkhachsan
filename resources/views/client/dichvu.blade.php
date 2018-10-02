@extends('layouts._share.client')
@section('content')
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Dịch vụ của chúng tôi</h2>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Dịch vụ</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Mọi thứ đều được hội tụ tại nơi đây</h2>
            <p>Ai là người cực kỳ yêu thích với hệ sinh thái thân thiện ?</p>
        </div>
        <div class="row mb_30">
            <div class="col-md-12">
                <div class="facilities_item row ">
                    <div class="col-md-8">
                        <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Nhà hàng</h4>
                        <p>Nhà hàng sang trọng , lịch sự với rất nhiều đặc sản từ những vùng miền khác nhau để phục vụ một bữa ăn tốt nhất cho khách hàng.</p>
                        <p style="margin-top: 10px">
                            <a href="https://www.google.com.vn/" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('image/nhahang.jpg')}}" width="100%">
                    </div>
                </div>

            </div>
            <div class="col-lg-12 col-md-12">
                <div class="facilities_item row">
                    <div class="col-md-4">
                        <img src="{{asset('image/phongtt.jpg')}}" width="100%">
                    </div>
                    <div class="col-md-8">
                        <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Câu lạc bộ thể thao</h4>
                        <p>Với nhiều môn thể thao tập luyện nhằm nâng cao sức khỏe với không gian thoải mái sẽ khiến khách hàng trở nên khỏe khoắn hơn.</p>
                        <p style="margin-top: 10px">
                            <a href="https://www.google.com.vn/" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="facilities_item row">
                    <div class="col-md-8">
                        <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Hồ bơi</h4>
                        <p>Hồ bơi trong xanh với hướng nhìn tuyệt với,không gian thoáng đãng.Là nơi lý tưởng để khách hàng thư giãn và tận hưởng cuộc sống tại đây.</p>
                        <p style="margin-top: 10px">
                            <a href="https://www.google.com.vn/" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('image/beboi.jpg')}}" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="facilities_item row">
                    <div class="col-md-4">
                        <img src="{{asset('image/thuecar.jpg')}}" width="100%">
                    </div>
                    <div class="col-md-8">
                        <h4 class="sec_h4"><i class="lnr lnr-car"></i>Thuê ô tô</h4>
                        <p>Nhằm đáp ứng dịch vụ tốt nhất và thuận tiên cho khách hàng , khách sạn có dịch vụ ô tô đưa đón , thoải mái dễ chịu.</p>
                        <p style="margin-top: 10px">
                            <a href="https://www.google.com.vn/" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="facilities_item row">
                    <div class="col-md-8">
                        <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Khu mua sắm</h4>
                        <p>Nhằm phục vụ khách hàng,trung tâm mua sắm luôn mở cửa sẵn sàng phục vụ nhu cầu của khách.</p>
                        <p style="margin-top: 10px">
                            <a href="https://www.google.com.vn/" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('image/khumuasam.jpg')}}" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="facilities_item row">
                    <div class="col-md-4">
                        <img src="{{asset('image/quanbar.jpg')}}" width="100%">
                    </div>
                    <div class="col-md-8">
                        <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Quán ba</h4>
                        <p>Quán bar đẹp lung linh ,sôi động hay du dương... , với đầy đủ mọi thứ luôn sẵn sàng đợi khách hàng.</p>
                        <p style="margin-top: 10px">
                            <a href="https://www.google.com.vn/" class="button_hover theme_btn_two">Tìm hiểu thêm</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection