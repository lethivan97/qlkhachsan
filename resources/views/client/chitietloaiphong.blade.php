<?php
use App\Models\LoaiPhong;
?>
@extends('layouts._share.client')
@section('title',"Loại phòng $loaiphong->TenLoai")
@section('content')
<section class="breadcrumb_area">
	<div class="overlay" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" style="opacity:0.5 !important; background-image: url('{{asset('image/loaiphong.jpg')}}')"></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle">Phòng {{$loaiphong->TenLoai}}</h2>
			<p>
				<u>Hotel in Hanoi Vietnam, Khách sạn Royal Trung tâm Hà nội</u>
			</p>
			<ol class="breadcrumb">
				<li><a href="{{route('client')}}">Trang chủ</a></li>
				<li><a href="{{route('loaiphong')}}">Loại phòng & Giá Phòng</a></li>
				<li class="active">{{$loaiphong->TenLoai}}</li>
			</ol>
		</div>
	</div>
</section>
<section class="about_history_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="text-transform: uppercase;text-align: center;margin-bottom: 50px">TIỆN NGHI PHÒNG {{$loaiphong->TenLoai}}</h3>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/loaiphong/image-1.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">SỐ LƯỢNG KHÁCH</h4>
				<p>Max : {{$loaiphong->NguoiLon}} Người lớn
					@if($loaiphong->TreCon !== null)
					+ {{$loaiphong->TreCon}} Trẻ con
					@endif
				</p>

			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/loaiphong/image-2.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">GIƯỜNG</h4>
				<p>{{$loaiphong->Giuong}} Giường</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/loaiphong/image-3.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">GIƯỜNG PHỤ</h4>
				<p>{{$loaiphong->GiuongPhu}} Giường phụ</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/loaiphong/image-4.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">SỐ LƯỢNG PHÒNG</h4>
				<p>Max : {{$loaiphong->SLPhong}} Phòng</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/loaiphong/image-5.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">DIỆN TÍCH PHÒNG</h4>
				<p>{{$loaiphong->DienTich}}<sup>2</sup></p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/loaiphong/image-6.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">HƯỚNG NHÌN</h4>
				<p>{{$loaiphong->HuongNhin}}</p>
			</div>
		</div>
	</div>
</section>
<section class="about_history_area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="text-transform: uppercase;text-align: center;margin-bottom: 50px">Thông tin chi tiết</h3>
			</div>
		</div>
	</div>
</section>
<section class="facilities_area section_gapv">
	<div class="container">
		<div class="row" style="margin: 50px;color: white">
			<div class="col-md-5 row">
				<?php foreach (LoaiPhong::image($loaiphong->images) as $key => $i): ?>
					@if($key == 0)
					<div class="text-center col-md-12">
						<div class="hotel_img row">
							<img src="{{asset('image/loaiphong')}}/{{$i}}" width="100%" height="300">
						</div>
					</div>
					@endif
				<?php endforeach?>
				<div class="testimonial_slider owl-carousel" style="margin-top: 50px">
					@foreach(LoaiPhong::image($loaiphong->images) as $image )
					<div class="media">
						<img src="{{asset('image/loaiphong')}}/{{$image}}" width="50px" height="100px">
					</div>
					@endforeach

				</div>
			</div>
			<div class="col-md-7">
				<div style="margin-left: 50px">
					<p>{!!$loaiphong->MoTaChiTiet!!}</p>

					<h3 class="text-info">Giá chỉ từ : $ {{$loaiphong->DonGia}}/ngày </h3>

					<a href="{{route('datphong',['name' => $loaiphong->BiDanh])}}" class="btn theme_btn button_hover">Đặt phòng</a>

				</div>
			</div>
		</div>

	</div>
</section>
<section class="about_history_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h5>Bình luận loại phòng {{$loaiphong->TenLoai}}</h5>
				<div class="fb-comments" data-href='http://localhost:8000/loaiphong/{{$loaiphong->BiDanh}}' style="width: 100% !important" ></div>
			</div>
			<div class="col-md-6">
				<h5>Hãy ủng hộ page của khách sạn</h5>
				<div class="row">
					<div class="fb-page col-md-8" data-href="https://www.facebook.com/Royal-Hotel-2145985822332065/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Royal-Hotel-2145985822332065/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Royal-Hotel-2145985822332065/">Royal  Hotel</a></blockquote></div>
					<div class="col-md-4">
						<div class="fb-save" data-uri="https://www.facebook.com/Royal-Hotel-2145985822332065/" data-size="large"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=284765669040134&autoLogAppEvents=1';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	</div>
</section>

@endsection