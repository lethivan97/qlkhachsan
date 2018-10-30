@extends('layouts._share.client')
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
					<h5 class="col-md-12 text-center text-danger ">Bạn chọn 1 trong 2 hình thức thanh toán: Thanh toán online / Thanh toán sau khi nhận phòng</h5>
				</div>
				<div class="row">
					<form  method="post" accept-charset="utf-8" class="col-md-12">
						@csrf
						<div class="row">
							<h5>Thông tin chung :</h5>
						</div>
						<div class="form-group row col-md-6" style="margin:10px auto" >
							<div class="col-md-4">
								<label for="TenKH">Tên khách hàng :</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="TenKH" placeholder="Nhập tên khách hàng" class="form-control">
							</div>
						</div>
						<div class="form-group row col-md-6" style="margin:0 auto">
							<div class="col-md-4">
								<label for="DiaChi">Địa chỉ :</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="DiaChi" placeholder="Nhập địa chỉ" class="form-control">
							</div>
						</div>
						<div class="row" style="margin-top: 30px">
							<div class="col-md-6" style="border-right: 1px solid">
								<div class="row">
									<h5 >Thanh toán trực tiếp :</h5>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="Email">Email :</label>
									</div>
									<div class="col-md-8">
										<input type="email" name="Email" placeholder="Nhập email" class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="SDT">Điện thoại :</label>
									</div>
									<div class="col-md-8">
										<input type="number" name="SDT" placeholder="Nhập số điện thoại" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<h5 class="col-md-12">Thanh toán online :</h5>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="Name">Tên người dùng thẻ :</label>
									</div>
									<div class="col-md-8">
										<input type="text" name="Name" placeholder="Nhập tên" class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="STK">Số tài khoản :</label>
									</div>
									<div class="col-md-8">
										<input type="number" name="STK" placeholder="Nhập số tài khoản" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="NPH">Ngày phát hành :</label>
									</div>
									<div class="col-md-8">
										<select name="Thang" class="col-md-6">
											<option >--Chọn tháng--</option>
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
										<label class="col-md-6"><input type="text" name="Nam" placeholder="Nhập năm" class="form-control"></label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="SoTien">Số tiền:</label>
									</div>
									<div class="col-md-8">
										<input type="number" name="SoTien" placeholder="Nhập số tiền" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row col-md-6" style="margin:50px auto" >
							<div class="col-md-12 text-center">
								<a href="#" title="">Hủy giao dịch</a>
								<button class="btn btn-sm btn-primary" style="margin-left: 50px">Thanh toán</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endsection