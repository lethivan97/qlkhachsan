<?php
use App\Models\Phong;
$images = Phong::image($phong->Image);
?>
@extends('layouts._share.admin')
@section('title',"Sửa phòng")
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
@if(isset($phong))
<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Sửa {{$phong->TenPhong}}</h3>
	</div>
	<div class="row">
		<form class="col-md-8" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="TenPhong" class="col-sm-2 col-form-label">Tên Phòng</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="TenPhong" placeholder="Nhập Tên Phòng" value="{{$phong->TenPhong}}">
				</div>
				<div class="col-md-12">
					@if($errors->has('TenPhong'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenPhong')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="DonGia" class="col-sm-2 col-form-label">Giá Phòng</label>
				<label for="MaLoai" class="col-sm-1 col-form-label">$</label>
				<div class="col-sm-9">
					<input type="number" value="{{$phong->DonGia}}" class="form-control" name="DonGia" placeholder="Nhập Giá Phòng">
				</div>
				<div class="col-md-12">
					@if($errors->has('DonGia'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('DonGia')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="MaTT" class="col-sm-2 col-form-label">Trạng Thái</label>
				<div class="col-sm-10">
					<select name="MaTT">
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
					<input type="file" name="Image" id="imgInp" accept="image/*" onchange="loadFile(event)" >
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
					<a href="{{route('admin.phong')}}" class="btn btn-sm btn-default">Thoát</a>
				</div>

			</div>
		</form>
		<div class="col-md-4">
			<div class="row">
				<p>Ảnh :</p>
				@if($phong->Image != null)
				<div class="col-md-12 row testimonial_slider owl-carousel">
					@foreach($images as $image)
					<div class="media">
						<img src="{{asset('image/phong')}}/{{$image}}" width="100">
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