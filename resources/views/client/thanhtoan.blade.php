@extends('layouts._share.client')
@section('title','Thanh toán')
@section('content')
@if(Session::has('cart') && Session::get('cart')->tongTien > 0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="facilities_item" style="margin:200px 0;color: black">
				<div class="row">
					<div class="col-md-4">
						<div class="col-md-12">
							<h4 class="text-danger">Khách sạn</h4>
						</div>
						<div class="col-md-12">
							<strong>ROYAL HOTEL</strong>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12">
							<h4 class="text-danger">Đơn đặt phòng</h4>
						</div>
						<div class="col-md-12">
							<strong>Thanh toán đơn đặt phòng : {{Session::get('cart')->tongPhong}} phòng với số tiền $ {{Session::get('cart')->tongTien}}</strong>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12">
							<h4 class="text-danger">Tổng tiền thanh toán</h4>
						</div>
						<div class="col-md-12">
							<h3 class="text-warning">$ {{Session::get('cart')->tongTien}}</h3>
						</div>
					</div>
				</div>
				<div style="border: 1px solid">
				</div>
				<div class="row" style="margin-top: 30px">
					<div class="col-md-4">
						@if(isset($user))
						<h4 class="col-md-12 text-primary ">Xin chào : {{$user->name}}</h4>
						@else
						<h3 class="col-md-12 text-primary ">Xin chào bạn</h3>
						@endif
					</div>
					<div class="col-md-8 text-sm-right">
						<h4 class="col-md-12 text-primary ">Thanh toán đơn hàng</h4>
						<h5 class="col-md-12 text-danger ">Ngày thanh toán : {{Carbon\Carbon::now()->format('d-m-Y')}}</h5>
					</div>
				</div>
				<div class="row">
					@if(Session::has('thongbao'))
					<div class="alert alert-success col-md-12" role="alert">
						{{Session::get('thongbao')}}
					</div>
					@endif
				</div>
				<div class="row">
					<div class="row col-md-12" style="margin-top: 30px">
						<div class="col-md-6" style="border-right: 1px solid">
							<form  method="post" accept-charset="utf-8">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<h5>Thanh toán trực tiếp :</h5>
										<input type="text" name="LuaChon" value="0" hidden>
									</div>
								</div>
								<div class="form-group row" >
									<div class="col-md-4">
										<label for="TenKH">Tên khách hàng :</label>
									</div>
									<div class="col-md-8">
										<input type="text" name="TenKH" placeholder="Nhập tên khách hàng" class="form-control" value="<?php if (isset($user)) {
	echo $user->name;
}
?>">
									</div>
									<div class="col-md-12">
										@if($errors->has('TenKH'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenKH')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="Email">Email :</label>
									</div>
									<div class="col-md-8">
										<input type="email" name="Email" placeholder="Nhập email" class="form-control" value="<?php if (isset($user)) {
	echo $user->email;
}
?>" >
									</div>
									<div class="col-md-12">
										@if($errors->has('Email'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('Email')}}</p>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-4">
										<label for="DiaChi">Địa chỉ :</label>
									</div>
									<div class="col-md-8">
										<input type="text" name="DiaChi" placeholder="Nhập địa chỉ" class="form-control">
									</div>
									<div class="col-md-12">
										@if($errors->has('DiaChi'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenKH')}}</p>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-4">
										<label for="SDT">Điện thoại :</label>
									</div>
									<div class="col-md-8">
										<input type="number" name="SDT" placeholder="Nhập số điện thoại" class="form-control">
									</div>
									<div class="col-md-12">
										@if($errors->has('SDT'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('SDT')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group row" style="margin:50px auto" >
									<div class="col-md-12 text-center">
										<a href="{{route('danh-sach-phong-dat')}}" title="">Hủy giao dịch</a>
										<button type="submit" class="btn btn-sm btn-success" style="margin-left: 50px">Thanh toán</button>
									</div>

								</div>
							</form>
						</div>
						<div class="col-md-6">
							<form  method="post" class="col-md-12" id="payment-form" style="height: 350px">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<h5>Thanh toán online :</h5>
										<input type="text" name="LuaChon" value="1" hidden>
									</div>
								</div>
								<div class="form-row" style="margin: 110px 0">
									<div id="card-element" class="col-md-12">
										<!-- A Stripe Element will be inserted here. -->
									</div>

									<!-- Used to display form errors. -->
									<div id="card-errors" role="alert"></div>
								</div>
								<div class="row" style="margin-top: 50px">
									<div class="col-md-12 text-center">
										<a href="{{route('danh-sach-phong-dat')}}">Hủy giao dịch</a>
										<button class="btn btn-sm btn-success" style="margin-left: 50px">Thanh toán</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="text-danger" style="margin: 20px">Vui lòng kiểm tra email sau khi thanh toán thành công !!!</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
@endsection
