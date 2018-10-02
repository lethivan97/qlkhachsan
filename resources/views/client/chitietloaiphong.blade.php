<?php
use App\Models\LoaiPhong;
?>
@extends('layouts._share.client')
@section('content')
<section class="breadcrumb_area">
	<div class="overlay" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" style="opacity:0.5 !important; background-image: url('{{asset('image/loaiphong.jpg')}}')"></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle">Phòng {{$phong->TenLoai}}</h2>
			<ol class="breadcrumb">
				<li><a href="{{route('home')}}">Trang chủ</a></li>
				<li><a href="{{route('loaiphong')}}">Loại phòng & Giá Phòng</a></li>
				<li class="active">{{$phong->TenLoai}}</li>
			</ol>
		</div>
	</div>
</section>
<section class="about_history_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/phong/image-1.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">SỐ LƯỢNG KHÁCH</h4>
				<p>Max : {{$phong->SLNguoi}}</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/phong/image-2.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">GIƯỜNG</h4>
				<p>{{$phong->Giuong}}</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/phong/image-3.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">GIƯỜNG PHỤ</h4>
				<p>{{$phong->GiuongPhu}}</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/phong/image-4.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">SỐ LƯỢNG PHÒNG</h4>
				<p>Max : {{$phong->SLPhong}}</p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/phong/image-5.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">DIỆN TÍCH PHÒNG</h4>
				<p>{{$phong->DienTich}}<sup>2</sup></p>
			</div>
			<div class="col-md-2" style="text-align: center">
				<img src="{{asset('image/phong/image-6.PNG')}}" height="64">
				<h4 style="margin-top: 20px" class="title_color">HƯỚNG NHÌN</h4>
				<p>{{$phong->HuongNhin}}</p>
			</div>
		</div>
	</div>
</section>
<section class="facilities_area section_gapv">
	<div class="container">
		<div class="row" style="margin: 50px;color: white">
			<div class="col-md-4 row">
				<?php foreach (LoaiPhong::image($phong->images) as $key => $i): ?>
					@if($key == 0)
					<div class="accomodation_item text-center col-md-12">
						<div class="hotel_img row">
							<img src="{{asset('image/phong')}}/{{$i}}" width="100%" height="300">
						</div>
					</div>
					@endif
					<div class="col-md-3">
						<img src="{{asset('image/phong')}}/{{$i}}" width="100%" height="60">
					</div>
				<?php endforeach?>

			</div>
			<div class="col-md-8">
				<p>{{$phong->MoTaChiTiet}}</p>
				<a href="#" class="btn theme_btn button_hover">Đặt phòng</a>
			</div>
		</div>

	</div>
</section>
<section class="about_history_area section_gap">
	<div class="container">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
</section>

@endsection