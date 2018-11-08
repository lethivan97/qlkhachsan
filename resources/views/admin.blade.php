@extends('layouts._share.admin')
@section('title','Trang chủ')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3>Phòng</h3>

					<p>Phòng đẹp , hiện đại ...</p>
				</div>
				<div class="icon">
					<i class="fa fa-h-square"></i>
				</div>
				<a href="{{route('admin.phong')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-4 col-6">
			<!-- small box -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3>TK Khách</h3>

					<p>Lịch khách theo ngày ...</p>
				</div>
				<div class="icon">
					<i class="fa fa-calendar"></i>
				</div>
				<a href="{{route('thong-ke-khach')}}" class="small-box-footer">Xem thêm<i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-4 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h3>User</h3>

					<p>Thông tin user</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{route('admin.user')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<!-- ./col -->
	</div>
	<div class="row" style="margin-top: 50px">
		<div class="col-lg-4 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>Thiết Bị</h3>

					<p>Thiết bị hiện đại , tối tân ...</p>
				</div>
				<div class="icon">
					<i class="fa fa-cogs"></i>
				</div>
				<a href="{{route('admin.thietbi')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-4 col-6">
			<div class="small-box bg-warning">
				<div class="inner">
					<h3>Đơn đặt</h3>

					<p>Đơn đặt theo phòng</p>
				</div>
				<div class="icon">
					<i class="fa fa-th"></i>
				</div>
				<a href="{{route('don-dat')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-4 col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>Loại Phòng</h3>

					<p>Nhiều kiểu phòng ...</p>
				</div>
				<div class="icon">
					<i class="fa fa-dashboard"></i>
				</div>
				<a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 50px">
		<div class="col-lg-4 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3>Báo cáo</h3>

					<p>Báo cáo doanh thu,lượt khách đặt</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="{{route('bao-cao')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

	</div>
</div>
</div>
@endsection