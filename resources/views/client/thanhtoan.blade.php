@extends('layouts._share.client')
@section('title',Thanh toán')
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
					<h3 class="col-md-12 text-center text-primary ">Thanh toán đơn hàng</h3>
				</div>
				<div class="row">
					<h5 class="col-md-12 text-center text-danger ">Bạn chọn 1 trong 2 hình thức thanh toán sau</h5>
				</div>
				<div class="row">
					<form  method="post" accept-charset="utf-8" class="col-md-12" id="checkout-form">
						@csrf

						<!-- <div class="row">
							<div id="charge-error" class="alert alert-danger {{!Session::has('error')? 'hidden' : ''}}">
								{{Session::get('error')}}
							</div>
						</div> -->
						<div class="row" style="margin-top: 30px">
							<div class="col-md-6" style="border-right: 1px solid">
								<div class="row">
									<div class="col-md-12">
										<h5><input type="radio" name="LuaChon" value="0">	Thanh toán trực tiếp :</h5>
									</div>
								</div>
								<div class="form-group row" >
									<div class="col-md-4">
										<label for="TenKH">Tên khách hàng :</label>
									</div>
									<div class="col-md-8">
										<input type="text" name="TenKH" placeholder="Nhập tên khách hàng" class="form-control">
									</div>
									<div class="col-md-12">
										@if($errors->has('TenKH'))
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenKH')}}</p>
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
										<label for="Email">Email :</label>
									</div>
									<div class="col-md-8">
										<input type="email" name="Email" placeholder="Nhập email" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									@if($errors->has('Email'))
									<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenKH')}}</p>
									@endif
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
										<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenKH')}}</p>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<h5><input type="radio" name="LuaChon" value="1">	Thanh toán online :</h5>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="card-name">Tên người dùng thẻ :</label>
									</div>
									<div class="col-md-8">
										<input type="text" name="card-name" id="card-name" placeholder="Nhập tên" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="card-number">Số tài khoản :</label>
									</div>
									<div class="col-md-8">
										<input type="number" name="card-number" id="card-number" placeholder="Nhập số tài khoản" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="card-expiry-month">Ngày phát hành :</label>
									</div>
									<div class="col-md-8">
										<select name="card-expiry-month" class="col-md-6" id="card-expiry-month">
											<option value="0">--Chọn tháng--</option>
											<option value="1">Tháng 1</option>
											<option value="2">Tháng 2</option>
											<option value="3">Tháng 3</option>
											<option value="4">Tháng 4</option>
											<option value="5">Tháng 5</option>
											<option value="6">Tháng 6</option>
											<option value="7">Tháng 7</option>
											<option value="8">Tháng 8</option>
											<option value="9">Tháng 9</option>
											<option value="10">Tháng 10</option>
											<option value="11">Tháng 11</option>
											<option value="12">Tháng 12</option>
										</select>
										<label class="col-md-6"><input id="card-expiry-year" type="text" name="card-expiry-year" placeholder="Nhập năm" class="form-control"></label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="card-cvc">Số tiền:</label>
									</div>
									<div class="col-md-8">
										<input type="number" name="card-cvc" id="card-cvc" placeholder="Nhập số tiền" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row col-md-6" style="margin:50px auto" >
							<div class="col-md-12 text-center">
								<a href="{{route('danh-sach-phong-dat')}}" title="">Hủy giao dịch</a>
								<button class="btn btn-sm btn-primary" style="margin-left: 50px">Thanh toán</button>
							</div>

						</div>
					</form>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="text-danger">Vui lòng kiểm tra email sau khi thanh toán thành công !!!</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@endsection
