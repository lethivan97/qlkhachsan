<?php
use App\Models\LoaiPhong;
$images = LoaiPhong::image($loaiphong->images);
?>
@extends('layouts._share.admin')
@section('title',"Sửa loại phòng")
@section('content')
@if(isset($loaiphong))
<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Sửa {{$loaiphong->TenLoai}}</h3>
	</div>
	<div class="row">
		<form class="col-md-8" method="POST" enctype="multipart/form-data">
			@csrf
			@if(session('errors'))
			<label class="text-danger">{!! session('errors') !!}</label>
			@endif
			<div class="form-group row">
				<label for="TenLoai" class="col-sm-2 col-form-label">Tên loại</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="TenLoai" placeholder="Nhập tên loại" value="{{$loaiphong->TenLoai}}" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="BiDanh" class="col-sm-2 col-form-label">Bí danh</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="BiDanh" placeholder="Nhập bí danh" value="{{$loaiphong->BiDanh}}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="Giuong" class="col-sm-2 col-form-label">Giường</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Giuong" placeholder="Nhập loại giường" value="{{$loaiphong->Giuong}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="NguoiLon" class="col-sm-2 col-form-label">Người lớn</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="NguoiLon" placeholder="Nhập số lượng"  value="{{$loaiphong->NguoiLon}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="TreCon" class="col-sm-2 col-form-label">Trẻ con</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="TreCon" placeholder="Nhập số lượng"  value="{{$loaiphong->TreCon}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="DienTich" class="col-sm-2 col-form-label">Diện tích</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="DienTich" placeholder="Nhập diện tích"  value="{{$loaiphong->DienTich}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="HuongNhin" class="col-sm-2 col-form-label">Hướng nhìn</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="HuongNhin" placeholder="Hướng nhìn" value="{{$loaiphong->HuongNhin}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="TreCon" class="col-sm-2 col-form-label">Giường phụ</label>
				<div class="col-sm-10">
<!-- 					<?php
$co = '<input type="radio" name="GiuongPhu" placeholder="Số lượng" value="1"> Có';
$khong = '<input type="radio" name="GiuongPhu" placeholder="Số lượng" value="0"> Không';
if ($loaiphong->GiuongPhu) {
	$co = substr_replace($co, ' checked ', 6, 0);
} else {
	$khong = substr_replace($khong, ' checked ', 6, 0);
}
echo $co;
echo $khong;
?> -->				<input type="number" name="GiuongPhu" placeholder="Nhập số giường phụ" class="form-control" value="{{$loaiphong->GiuongPhu}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="DonGia" class="col-sm-2 col-form-label">Giá phòng</label>
				<label for="MaLoai" class="col-sm-1 col-form-label">$</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="DonGia" placeholder="Nhập giá phòng" value="{{$loaiphong->DonGia}}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="Image" class="col-sm-2 col-form-label">Thêm Ảnh</label>
				<div class="col-sm-10">
					<input type="file" name="Image" id="imgInp" accept="image/*" onchange="loadFile(event)" >
				</div>
			</div>
			<div class="form-group row">
				<label for="MoTa" class="col-sm-2 col-form-label">Mô tả</label>
				<div class="col-sm-10">
					<textarea name="MoTa" class="form-control" id="editor">{!!$loaiphong->MoTa!!}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="MoTaChiTiet" class="col-sm-2 col-form-label">Mô tả chi tiết</label>
				<div class="col-sm-10">
					<textarea name="MoTaChiTiet" class="form-control" id="editor1">{!!$loaiphong->MoTaChiTiet!!}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12  text-center ">
					<button type="submit" class="btn btn-sm btn-primary">Lưu</button>
					<a href="{{route('admin.loaiphong')}}" class="btn btn-sm btn-default">Thoát</a>
				</div>

			</div>
		</form>
		<div class="col-md-4">
			<div class="row">
				<p>Ảnh :</p>
				@if($loaiphong->images != null)
				<div class="col-md-12 row testimonial_slider owl-carousel">
					@foreach($images as $image)
					<div class="media">
						<img src="{{asset('image/loaiphong')}}/{{$image}}" width="100">
					</div>
					@endforeach
				</div>
				@endif
			</div>
			<div class="row" style="margin-top: 50px">
				<img src="#" id="output" alt="" width="150px" height="150px">
			</div>
		</div>
	</div>
</div>
@endif
<script type="text/javascript">
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection