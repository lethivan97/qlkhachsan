<style type="text/css">
.testimonial_slider .owl-dots{
	margin-top: 30px !important;
}
</style>
@extends('layouts._share.client')
@section('title','Danh sách đặt phòng')
@section('content')
<div class="container">
	<div class="row">
		@if(Session::has('thongbao'))
		<div class="alert alert-success col-md-12" role="alert" style="margin-top: 200px">
			{{Session::get('thongbao')}}
		</div>
		@endif
	</div>
	@if($cart == null || $cart->tongPhong == 0 )
	<div class="alert alert-danger" role="alert" style="margin: 200px 0">
		Danh sách phòng trống. Mời bạn <a href="{{route('client')}}">đặt phòng</a>!!
	</div>
	@else
	<div style="margin: 200px 0" class="container" >
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-danger text-center">Phòng đặt ( {{$cart->tongPhong}} phòng )</h3>
			</div>
			<div class="col-md-8">
				<h4 class="text-primary">Tổng tiền thanh toán: ${{$cart->tongTien}}</h4>
			</div>
			<div class="col-md-4">
				<a href="{{ URL::previous() }}" class="btn btn-sm btn-success">Tiếp tục đặt phòng</a>
				<a href="{{route('thanh-toan')}}" class="btn btn-sm btn-info">Thanh toán</a>
				<a onclick="return confirm('Bạn có chắc chắn muốn hủy đặt {{$cart->tongPhong}} phòng không ?')" class="btn btn-sm btn-danger" href="{{route('xoa-phong')}}">
					Xóa tất cả
				</a>
			</div>
		</div>
		@foreach($cart->phongs as $phong)
		<section style="margin:20px 0">
			<div class="container">
				<div class="row mb_30">
					<div class="col-lg-12 col-md-12">
						<div class="facilities_item row" style="color: black">
							<div class="col-md-5">
								<div class="testimonial_slider owl-carousel">
									@foreach(App\DAO\PhongDAO::image($phong['phong']['Image']) as $image)
									<div class="media">
										<img src="{{asset('image/phong/chitiet')}}/{{$image}}" width="150px" height="150px">
									</div>
									@endforeach
								</div>
							</div>
							<div class="col-md-6">
								<h4>{{$phong['phong']['TenPhong']}}</h4>
								<b>Giá Phòng / Ngày : ${{$phong['phong']['DonGia']}}</b>
								<br>
								<b>Ngày nhận : {{$phong['ngayden']}}</b>
								<br>
								<b>Ngày trả phòng : {{$phong['ngaydi']}}</b>
								<br>
								<b>Tiền trả : ${{$phong['dongia']}}</b>
							</div>
							<div class="col-md-1">
								<a onclick="return confirm('Bạn có chắc chắn muốn hủy đặt {{$phong['phong']['TenPhong']}} không ?')" class="btn btn-sm btn-danger" href="{{route('xoa-phong-dat',$phong['phong']['MaPhong'])}}">
									<i class="fa fa-minus"></i>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		@endforeach
	</div>
	@endif
</div>

@endsection