<?php
use App\Models\LoaiPhong;
?>
@extends('layouts._share.client')
@section('title','Loại phòng')
@section('content')
<section class="breadcrumb_area">
	<div class="overlay" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" style="opacity:0.4 !important; background-image: url('{{asset('image/loaiphong.jpg')}}')"></div>
	<div class="container">
		<div class="page-cover text-center">
			<h2 class="page-cover-tittle">Loại phòng & Giá Phòng</h2>
			<ol class="breadcrumb">
				<li><a href="{{route('client')}}">Trang chủ</a></li>
				<li class="active">Loại phòng & Giá Phòng</li>
			</ol>
		</div>
	</div>
</section>
<section class="accomodation_area" style="margin: 50px 0">
	<div class="container">
		<div class="section_title text-center">
			<h2 class="title_color">Tất cả các loại phòng của khách sạn</h2>
			<p>Tất cả chúng ta đều sống trong thời đại trẻ trung. Cuộc sống đang trở nên cực kỳ nhanh chóng,phát triển và đầy đủ tiện nghi...</p>
		</div>
	</div>
</section>
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
							<div class="col-md-6">
								<div class="book_tabel_item">
									<div class="form-group">
										<div class='input-group date' id='datetimepicker11'>
											<input type='text' name="NgayDen" class="form-control" placeholder="Thời gian đến"/>
											<span class="input-group-addon">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class='input-group date' id='datetimepicker1'>
											<input type='text' name="NgayDi" class="form-control" placeholder="Thời gian đi"/>
											<span class="input-group-addon">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</span>
										</div>
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
<?php foreach ($listLoaiPhong as $key => $item): ?>
	<section class="<?php if ($key % 2 == 1) {
	echo 'facilities_area';
}
?>">
	<div class="container">
		<div class="row mb-30"  style="margin: 50px 0">
			<div class="col-lg-6 col-md-6">
				<?php if ($key % 2 == 1): ?>
					<h3  style="color: white">{{$item->TenLoai}}</h3>
					<p  style="color: white">{!!$item->MoTa!!}</p>
					<a href="{{route('loaiphong.chitiet',['id'=>$item->BiDanh])}}" class="btn theme_btn button_hover">Tìm hiểu thêm</a>
					<a href="{{route('datphong',['name' => $item->BiDanh])}}" class="btn theme_btn button_hover">Đặt phòng</a>
					<?php else: ?>
						<?php foreach (LoaiPhong::image($item->images) as $i): ?>
							<img src="{{asset('image/loaiphong')}}/{{$i}}" width="100%" height="300px">
							@break
						<?php endforeach?>
					<?php endif?>
				</div>
				<div class="col-md-6">
					<?php if ($key % 2 == 1): ?>
						<?php foreach (LoaiPhong::image($item->images) as $i): ?>
							<img src="{{asset('image/loaiphong')}}/{{$i}}" width="100%" height="300px">
							@break
						<?php endforeach?>
						<?php else: ?>
							<h3>{{$item->TenLoai}}</h3>
							<p>{!!$item->MoTa!!}</p>
							<a href="{{route('loaiphong.chitiet',['id'=>$item->BiDanh])}}" class="btn theme_btn button_hover">Tìm hiểu thêm</a>
							<a href="{{route('datphong',['name' => $item->BiDanh])}}" class="btn theme_btn button_hover">Đặt phòng</a>
						<?php endif?>
					</div>
				</div>
			</div>
		</section>
	<?php endforeach?>

	@endsection