<?php
use App\Models\LoaiPhong;
?>
@extends('layouts._share.client')
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
							<img src="{{asset('image/phong')}}/{{$i}}" width="100%" height="300px">
							@break
						<?php endforeach?>
					<?php endif?>
				</div>
				<div class="col-md-6">
					<?php if ($key % 2 == 1): ?>
						<?php foreach (LoaiPhong::image($item->images) as $i): ?>
							<img src="{{asset('image/phong')}}/{{$i}}" width="100%" height="300px">
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