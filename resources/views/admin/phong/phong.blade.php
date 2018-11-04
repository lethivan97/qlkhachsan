@extends('layouts._share.admin')
@section('title',"Phòng")
@section('content')
<?php
use App\DAO\PhongDAO;
use App\Models\LoaiPhong;
use App\Models\Phong;
use App\Models\TrangThai;
if (count($phongs) > 0) {
	$loaiphongs = LoaiPhong::all();
	$trangthais = TrangThai::all();
}
?>
<div class="container">
	<h2>Danh sách phòng</h2>
	<div class="row">
		<div class="col-md-6">
			<form method="get" action="{{route('admin.phong')}}">
				<input type="text" style="width: 300px;float: left;margin-right: 20px" id="search" name="key" placeholder="Nhập tên phòng" onkeyup="searchFunction();" class="form-control">
				<input type="submit" value="Lọc" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-6">
			<a href="{{route('admin.phong.them-moi')}}" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-plus-circle"></i></a>

		</div>
	</div>
	@if(count($phongs) > 0)
	<table class="table table-striped" id="tableId" style="margin-top: 20px">
		<thead>
			<tr>
				<th>STT</th>
				<th>Ảnh</th>
				<th>Tên phòng</th>
				<th>Loại phòng</th>
				<th>Trạng thái</th>
				<th>Đơn giá/Ngày</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($phongs as $row)
			<tr>
				<td>{{$row->MaPhong}}</td>
				<td>
					<?php foreach (Phong::image($row->images) as $i): ?>
						<a href="#" >
							<img src="{{asset('image/phong')}}/{{$i}}" width="100" height="100">
						</a>

						@break
					<?php endforeach?>
				</td>
				<td>{{$row->TenPhong}}</td>
				<td>{{$row->TenLoai}}</td>
				<td>{{$row->TenTT}}</td>
				<td>${{$row->DonGia}}</td>
				<td>
					<a href="{{route('admin.phong.sua-phong',['id'=>$row->MaPhong])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
					<button class="btn btn-sm" data-toggle="modal" data-target="#chitietphong{{$row->MaPhong}}"><i class="fa fa-eye"></i></button>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="{{route('admin.phong.xoa-phong',['id'=>$row->MaPhong])}}"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<div class="modal fade bd-example-modal-lg" id="chitietphong{{$row->MaPhong}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center" id="exampleModalCenterTitle">Thông tin <span class="text-danger">{{$row->TenPhong}}</span></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 row">
										<p>Ảnh :</p>
										<div class="col-md-12 row testimonial_slider owl-carousel">
											@foreach(Phong::image($row->images) as $image)
											<div class="media">
												<img src="{{asset('image/phong')}}/{{$image}}" width="50px">
											</div>
											@endforeach
										</div>

									</div>
									<div class="col-md-8 row">
										<div class="col-md-3">
											Tên Phòng :
										</div>
										<div class="col-md-9">
											{{$row->TenPhong}}
										</div>
										<div class="col-md-3">
											Loại Phòng :
										</div>
										<div class="col-md-9">
											{{$row->TenLoai}}
										</div>
										<div class="col-md-3">
											Giá/Ngày :
										</div>
										<div class="col-md-9">
											${{$row->DonGia}}
										</div>
										<div class="col-md-3">
											Mô tả :
										</div>
										<div class="col-md-9">
											{!!$row->MoTa!!}
										</div>
										<div class="col-md-3">
											Thiết bị :
										</div>
										<div class="col-md-9">
											<?php foreach (PhongDAO::getThietBi($row->MaPhong) as $tb): ?>
												<p>{{$tb->TenTB}}</p>
											<?php endforeach?>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-offset-6" style="margin: 0 auto">
			{{$phongs->links()}}
		</div>
	</div>
	@endif
</div>

<script>
	function searchFunction() {
		var input, filter, table, tr, td, i;
		input = document.getElementById("search");
		filter = input.value.toUpperCase();
		table = document.getElementById("tableId");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>

@endsection