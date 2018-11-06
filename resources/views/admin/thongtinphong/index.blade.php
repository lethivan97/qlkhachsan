@extends('layouts._share.admin')
@section('title',"Thông tin chi tiết phòng")
@section('content')
<?php
use App\DAO\ThongTinPhongDAO;
$chitietDAO = new ThongTinPhongDAO();
?>
<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<div class="container">
	<div class="row">
		<h2>Thông tin chi tiết phòng</h2>
	</div>
	<div class="row">
		@if(count($phongs) > 0)
		@foreach($phongs as $phong)
		<div class="col-lg-3 col-6">
			<div class="small-box {@if($phong->MaTT == 1) bg-info @elseif($phong->MaTT == 2) bg-warning @else bg-success @endif}">
				<div class="inner">
					<h4>{{$phong->TenPhong}}</h4>
					<p>{{$phong->TenTT}}</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				@if($phong->MaTT == 2 || $phong->MaTT == 3)
				<a class="small-box-footer" data-toggle="modal" data-target="#chitietphong{{$phong->MaPhong}}">
					Chi tiết khách <i class="fa fa-arrow-circle-right"></i>
				</a>
				@endif
			</div>
		</div>
		<div class="modal fade bd-example-modal-lg" id="chitietphong{{$phong->MaPhong}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-center" id="exampleModalCenterTitle">Thông tin chi tiết <span class="text-danger">{{$phong->TenPhong}}</span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-md-12">
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th>Tên Khách Hàng</th>
										<th>Trạng Thái</th>
										<th>Ngày Đến</th>
										<th>Ngày Đi</th>
										<th>Tiền Thanh Tóan</th>
									</tr>
								</thead>
								<tbody>
									@foreach($chitietDAO->chitietphong($phong->MaPhong) as $ct)
									<tr>
										<td>{{$ct->TenKH}}</td>
										<td>
											@if($ct->MaTT == 2)
											Đã đặt phòng
											@else
											Đang sử dụng
											@endif
										</td>
										<td>{{$ct->NgayDen}}</td>
										<td>{{$ct->NgayDi}}</td>
										<td>${{$ct->SoNgay * $ct->DonGia}}</td>
									</tr>
									@endforeach
									<tr class="text-right">
										<td colspan="5"><span class="text-danger">Tổng tiền dự kiến : </span>${{$chitietDAO->tongtientheophong($phong->MaPhong)->tongtien}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endif
	</div>
	<div class="row">
		<div class="col-md-offset-6" style="margin: 0 auto">
			{!!$phongs->links()!!}
		</div>
	</div>
</div>
@endsection