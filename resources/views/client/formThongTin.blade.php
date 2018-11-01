@extends('layouts._share.client')
@section('title','Tìm kiếm phòng')
@section('content')
<div class="hotel_booking_area position" style="margin-top: 200px;margin-bottom: 200px">
	<div class="container">
		<div class="col-md-12">
			<h4 class="text-danger text-center">Mời bạn nhập thông tin đặt phòng !! Hãy chắc chắn bạn đã điền đầy đủ thông tin !</h4>
		</div>
		<div class="hotel_booking_table">
			<div class="col-md-4">
				<h3>Thông tin thời gian<br>số lượng đặt phòng {{$loaiPhong['TenLoai']}}</h3>
			</div>
			<div class="col-md-8">
				<div class="boking_table">
					<div class="row">
						<form class="row" method="get" style="width: 100%" action="{{route('datphong.post')}}" >
							<input type="text" name="MaLoai" hidden="true" value="{{$loaiPhong['MaLoai']}}">
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
										<div class='input-group'>
											<input type='text' name="SoPhong" class="form-control" placeholder="Số phòng đặt"/>
										</div>
									</div>
									<button class="book_now_btn button_hover" type="submit">Hiển thị</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection