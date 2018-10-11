@extends('layouts._share.client')
@section('content')
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Liên hệ với chúng tôi</h2>
            <ol class="breadcrumb">
                <li><a href="{{route('client')}}">Trang chủ</a></li>
                <li class="active">Liên hệ</li>
            </ol>
        </div>
    </div>
</section>

<!--================Contact Area =================-->
<section class="contact_area section_gap">
    <div class="container">
        <div id="mapBox" class="mapBox">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59585.9672011207!2d105.76781020150746!3d21.027765915589985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab424a50fff9%3A0xbe3a7f3670c0a45f!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBHaWFvIHRow7RuZyBW4bqtbiB04bqjaQ!5e0!3m2!1svi!2s!4v1538357758324" width="600" height="450" frameborder="0" style="border:0;width: 100%" allowfullscreen></iframe>

        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Hà Nội, Việt Nam</h6>
                        <p>Phố Hoàn Kiếm</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">+84933534999</a></h6>
                        <p>Phục vụ tất cả các ngày trong tuần từ 9 đến 18 giờ.</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">levan.hy.97@gmail.com</a></h6>
                        <p>Liên hệ với chúng tôi bất kì lúc nào!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Nội dung"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn theme_btn button_hover">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection