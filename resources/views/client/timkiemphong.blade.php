<?php
use App\DAO\PhongDAO;
?>
@extends('layouts._share.client')
@section('content')
<section class="accomodation_area section_gap">
	<div class="container">
		<div class="section_title text-center">
			<h2 class="title_color">Thông tin tìm kiếm với yêu cầu</h2>
			<h4 class="text-danger">Ngày Đến : {{$request->NgayDen}}</h4>
			<h4 class="text-danger">Ngày Đi : {{$request->NgayDi}}</h4>
			<h4 class="text-danger">Loại Phòng : {{$tenLoai}}</h4>
		</div>
		@if(count($listPhong) > 0)
		<?php foreach ($listPhong as $key => $item): ?>
			<section class="<?php if ($key % 2 == 1) {
	echo 'facilities_area';
}
?>" style="<?php if ($key % 2 == 1) {
	echo 'background-color: #f1f1f5';
}
?>">
			<div class="container">
				<div class="row mb-30"  style="margin: 50px 0">
					<div class="col-md-6">
						<div class="testimonial_slider owl-carousel">
							@foreach(PhongDAO::image($item->Image) as $image)
							<div class="media">
								<img src="{{asset('image/phong/chitiet')}}/{{$image}}" width="150px" height="150px">
							</div>
							@endforeach

						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="row">
							<div class="col-md-12">
								<h3>{{$item->TenPhong}}</h3>
							</div>
							<div class="col-md-12">
								<p style="text-transform:uppercase ">Chi tiết phòng</p>
							</div>
							<div class="row col-md-12">
								<div class="col-md-3 text-center">
									<img src="{{asset('image/phong/user.svg')}}" width="30" height="30">
									<p>{{$item->NguoiLon + $item->TreCon}} người</p>
								</div>
								<div class="col-md-3 text-center">
									<img src="{{asset('image/phong/bed.svg')}}" width="30" height="30">
									<p>{{$item->Giuong}} giường</p>
								</div>
								<div class="col-md-3 text-center">
									<img src="{{asset('image/phong/giuongphu.svg')}}" width="30" height="30">
									<p>{{$item->GiuongPhu}} giường phụ</p>
								</div>
								<div class="col-md-3 text-center">
									<img src="{{asset('image/phong/dientich.svg')}}" width="30" height="30">
									<p>{{$item->DienTich}} <sup>2</sup></p>
								</div>
							</div>
							<div class="col-md-12">
								<p>{{$item->MoTa}}</p>
							</div>
							<div class="col-md-12">
								<h3 class="text-primary">Giá : $ {{$item->DonGia}}/đêm </h3>
							</div>
							<div class="col-md-12">
								<a class="btn btn-info" data-toggle="collapse" data-target="#{{$item->MaPhong}}">Xem chi tiết phong</a>
								<a href="#" class="btn theme_btn button_hover">Đặt phòng</a>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-12 collapse"  id="{{$item->MaPhong}}">
							<div class="col-md-12">
								<p style="text-transform:uppercase ">Phương tiện phòng</p>
							</div>
							<div class="row">
								<?php foreach (PhongDAO::getThietBi($item->MaPhong) as $tb): ?>
									<div class="col-md-2 text-center">
										<img src="{{asset('image/phong')}}/{{$tb->Image}}" width="30" height="30">
										<p>{{$tb->TenTB}}</p>
									</div>
								<?php endforeach?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endforeach?>

		@endif

	</div>
</section>

@endsection