<?php
use App\Models\Phong;
$images = Phong::image($phong->Image);
?>
@extends('layouts._share.admin')
@section('content')
@if(isset($phong))
<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Sửa {{$phong->TenPhong}}</h3>
	</div>
	<div class="row">
		<form class="col-md-8" method="POST">
			@csrf
			<div class="form-group row">
				<label for="TenPhong" class="col-sm-2 col-form-label">Tên Phòng</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="TenPhong" placeholder="Nhập Tên Phòng" value="{{$phong->TenPhong}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="DonGia" class="col-sm-2 col-form-label">Giá Phòng</label>
				<label for="MaLoai" class="col-sm-1 col-form-label">$</label>
				<div class="col-sm-9">
					<input type="number" value="{{$phong->DonGia}}" class="form-control" name="DonGia" placeholder="Nhập Giá Phòng">
				</div>

			</div>
			<div class="form-group row">
				<label for="MaTT" class="col-sm-2 col-form-label">Trạng Thái</label>
				<div class="col-sm-10">
					<select name="MaTT">
						<option >--Chọn Trạng Thái--</option>
						<?php foreach ($trangthais as $trangthai): ?>
							<option value="{{$trangthai->MaTT}}" <?php if ($trangthai->MaTT == $phong->MaTT) {
	echo "selected";
}
?>
							>{{$trangthai->TenTT}}</option>}
						<?php endforeach?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="MaLoai" class="col-sm-2 col-form-label">Loại Phòng</label>
				<div class="col-sm-10">
					<select name="MaLoai">
						<option >--Chọn Loại Phòng--</option>
						<?php foreach ($loaiphongs as $loaiphong): ?>
							<option value="{{$loaiphong->MaLoai}}" <?php if ($loaiphong->MaLoai == $phong->MaLoai) {
	echo "selected";
}
?>>{{$loaiphong->TenLoai}}</option>}
						<?php endforeach?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="Image" class="col-sm-2 col-form-label">Thêm Ảnh</label>
				<div class="col-sm-10">
					<input type="file" name="Image">
				</div>
			</div>
			<div class="form-group row">
				<label for="MoTa" class="col-sm-2 col-form-label">Mô Tả</label>
				<div class="col-sm-10">
					<textarea name="MoTa" class="form-control" id="editor">{{$phong->MoTa}}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12  text-center ">
					<button type="submit" class="btn btn-sm btn-primary">Lưu</button>
					<a href="{{route('admin.phong')}}" class="btn btn-sm">Thoát</a>
				</div>

			</div>
		</form>
		<div class="col-md-4">
			<div class="row">
				<p>Ảnh :</p>
				<div class="col-md-12 row testimonial_slider owl-carousel">
					@foreach($images as $image)
					<div class="media">
						<img src="{{asset('image/phong')}}/{{$image}}" width="100">
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>
@endif
@endsection