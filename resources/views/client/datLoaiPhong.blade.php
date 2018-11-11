<?php
use App\DAO\PhongDAO;

?>
@extends('layouts._share.client')
@section('title','Tìm kiếm phòng')
@section('content')
<section class="accomodation_area section_gap">
	<div class="container">
		<div class="section_title text-center">
			<h2 class="title_color text-danger">Mời bạn chọn phòng loại {{$loaiPhong->TenLoai}} </h2>
		</div>
		@if(count($phongs) > 0)
		@if(count($phongs) < $request['SoPhong'] && $request['SoPhong'] !='' )
		<div>
			<h5 class="text-primary">Số phòng trống không đủ yêu cầu. Bạn có thể chọn thêm loại phòng khác ?</h5>
		</div>
		@else
		<div>
			<h5 class="text-primary">Có tất cả {{count($phongs)}} phòng !</h5>
		</div>
		<div class="row">
			@if(Session::has('thongbao'))
			<div class="alert alert-success col-md-12" role="alert">
				{{Session::get('thongbao')}}
			</div>
			@endif
		</div>
		@endif
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
								<img src="{{asset('image/phong')}}/{{$image}}" width="150px" height="150px">
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
									<img src="{{asset('image/thietbi/user.svg')}}" width="30" height="30">
									<p>{{$item->NguoiLon + $item->TreCon}} người</p>
								</div>
								<div class="col-md-3 text-center">
									<img src="{{asset('image/thietbi/bed.svg')}}" width="30" height="30">
									<p>{{$item->Giuong}} giường</p>
								</div>
								<div class="col-md-3 text-center">
									<img src="{{asset('image/thietbi/giuongphu.svg')}}" width="30" height="30">
									<p>{{$item->GiuongPhu}} giường phụ</p>
								</div>
								<div class="col-md-3 text-center">
									<img src="{{asset('image/thietbi/dientich.svg')}}" width="30" height="30">
									<p>{{$item->DienTich}} <sup>2</sup></p>
								</div>
							</div>
							<div class="col-md-12">
								<p>{!!$item->MoTa!!}</p>
							</div>
							<div class="col-md-12">
								<h3 class="text-primary">Giá : $ {{$item->DonGia}}/ngày </h3>
							</div>
							<div class="col-md-12">
								<a class="btn btn-info" data-toggle="collapse" data-target="#{{$item->MaPhong}}">Xem chi tiết phong</a>
								<a href="{{route('them-gio-hang',['id'=>$item->MaPhong,'ngayden'=>$request->NgayDen,'ngaydi'=>$request->NgayDi])}}" class="btn theme_btn button_hover" <?php if (Session::has('cart') && array_key_exists($item->MaPhong, Session::get('cart')->phongs)) {
	echo "hidden";
}
?> >Đặt phòng</a>
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
										<img src="{{asset('image/thietbi')}}/{{$tb->Image}}" width="30" height="30">
										<p>{{$tb->TenTB}}</p>
									</div>
								<?php endforeach?>
							</div>
							<div class="col-md-12">
								<h5>Bình luận {{$item->TenPhong}}:</h5>
							</div>
							<div class="col-md-12">
								<div class="fb-comments" data-href='http://localhost:8000/search/{{$item->MaPhong}}'></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endforeach?>


		@else
		<div>
			<h5 class="text-primary">Xin lỗi,Loại {{$loaiPhong->TenLoai}} đã hết phòng trống! Vui lòng đặt phòng loại khác.</h5>
		</div>
		@endif
	</div>
</section>
<div class="row">
	<div class="col-md-offset-6" style="margin: 0 auto">
		{{$listPhong->appends($request->all())->links()}}
	</div>
</div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=284765669040134&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection