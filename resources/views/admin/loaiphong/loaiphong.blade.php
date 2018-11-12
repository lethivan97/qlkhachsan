@extends('layouts._share.admin')
@section('title',"Loại phòng")
@section('content')
<?php
use App\DAO\LoaiPhongDAO;
use App\Models\LoaiPhong;

?>
<div class="container">
	<h2>Danh sách loại phòng</h2>
	<div class="row">
		<div class="col-md-6">
			<form method="get" action="{{route('admin.loaiphong')}}">
				<input type="text" style="width: 300px;float: left;margin-right: 20px" id="search" name="key" placeholder="Nhập loại phòng" onkeyup="searchFunction();" class="form-control">
				<input type="submit" value="Lọc" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-6">
			<a href="{{route('admin.loaiphong.them-moi')}}" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-plus-circle"></i></a>

		</div>
	</div>
	@if(session('error'))
		<label class="text-danger">{!! session('error') !!}</label>
	@endif
	@if(count($loaiphongs) > 0)
	<table class="table table-striped" id="tableId" style="margin-top: 20px">
		<thead>
			<tr>
				<th>STT</th>
				<th>Ảnh</th>
				<th>Loại phòng</th>
				<th>Giường</th>
				<th>Diện tích</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($loaiphongs as $row)
			<?php
$phongs = LoaiPhongDAO::getPhongByLoai($row->MaLoai);
$slPhong = $phongs->count();
?>
			<tr>
				<td>{{$row->MaLoai}}</td>
				<td>
					<?php foreach (LoaiPhong::image($row->images) as $i): ?>
						<a href="#" >
							<img src="{{asset('image/loaiphong')}}/{{$i}}" width="100" height="100">
						</a>

						@break
					<?php endforeach?>
				</td>
				<td>{{$row->TenLoai}}</td>
				<td>{{$row->Giuong}}</td>
				<td>{{$row->DienTich}}<sup>2</sup></td>
				<td>
					<a href="{{route('admin.loaiphong.sua-loaiphong',['id'=>$row->MaLoai])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
					<button class="btn btn-sm" data-toggle="modal" data-target="#chitietloaiphong{{$row->MaLoai}}"><i class="fa fa-eye"></i></button>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="{{route('admin.loaiphong.xoa-loaiphong',['id'=>$row->MaLoai])}}"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<div class="modal fade bd-example-modal-lg" id="chitietloaiphong{{$row->MaLoai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center" id="exampleModalCenterTitle">Thông tin <span class="text-danger">{{$row->TenLoai}}</span></h5>
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
											@foreach(LoaiPhong::image($row->images) as $image)
											<div class="media">
												<img src="{{asset('image/loaiphong')}}/{{$image}}" width="50px">
											</div>
											@endforeach
										</div>

									</div>
									<div class="col-md-8 row">
										<div class="col-md-3">
											Loại Phòng :
										</div>
										<div class="col-md-9">
											{{$row->TenLoai}}
										</div>
										<div class="col-md-3">
											Giường :
										</div>
										<div class="col-md-9">
											{{$row->Giuong}}
										</div>
										<div class="col-md-3">
											Người lớn :
										</div>
										<div class="col-md-9">
											{{$row->NguoiLon}}
										</div>
										<div class="col-md-3">
											Trẻ con :
										</div>
										<div class="col-md-9">
											{{$row->TreCon}}
										</div>
										<div class="col-md-3">
											Diện tích :
										</div>
										<div class="col-md-9">
											{{$row->DienTich}}
										</div>
										<div class="col-md-3">
											SL phòng :
										</div>
										<div class="col-md-9">
											{{$slPhong}}
										</div>
										<div class="col-md-3">
											Hướng nhìn :
										</div>
										<div class="col-md-9">
											{{$row->HuongNhin}}
										</div>
										<div class="col-md-3">
											Giường phụ :
										</div>
										<div class="col-md-9">
											{{$row->GiuongPhu}}
										</div>
										<div class="col-md-3">
											Mô tả :
										</div>
										<div class="col-md-9">
											{!!$row->MoTa!!}
										</div>
										<div class="col-md-3">
											Mô tả chi tiết :
										</div>
										<div class="col-md-9">
											{!!$row->MoTaChiTiet!!}
										</div>
										<div class="col-md-3">
											Phòng :
										</div>
										<div class="col-md-9">
											<?php foreach ($phongs as $phong): ?>
												<p>{{$phong->TenPhong}}</p>
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
			{{$loaiphongs->links()}}
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
			td = tr[i].getElementsByTagName("td")[2];
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