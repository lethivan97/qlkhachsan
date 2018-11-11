@extends('layouts._share.admin')
@section('title',"Thêm phòng")
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Thêm mới phòng</h3>
	</div>
	<div class="row">
		<form class="col-md-8" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="TenPhong" class="col-sm-2 col-form-label">Tên Phòng</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="TenPhong" placeholder="Nhập Tên Phòng">
				</div>
				<div class="col-md-12">
					@if($errors->has('TenPhong'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenPhong')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="DonGia" class="col-sm-2 col-form-label">Giá Phòng</label>
				<label  class="col-sm-1 col-form-label">$</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="DonGia" placeholder="Nhập Giá Phòng">
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
							<option value="{{$trangthai->MaTT}}">{{$trangthai->TenTT}}</option>}
						<?php endforeach?>
					</select>
				</div>
				<div class="col-md-12">
					@if($errors->has('MaTT'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('MaTT')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="MaLoai" class="col-sm-2 col-form-label">Loại Phòng</label>
				<div class="col-sm-10">
					<select name="MaLoai">
						<?php foreach ($loaiphongs as $loaiphong): ?>
							<option value="{{$loaiphong->MaLoai}}">{{$loaiphong->TenLoai}}</option>}
						<?php endforeach?>
					</select>
				</div>
				<div class="col-md-12">
					@if($errors->has('MaLoai'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('MaLoai')}}</p>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="Image" class="col-sm-2 col-form-label">Ảnh</label>
				<div class="col-sm-10">
					<input type="file" name="Image" id="imgInp" accept="image/*" onchange="loadFile(event)" >
				</div>
				<div class="col-md-12">
					@if($errors->has('Image'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('Image')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="MoTa" class="col-sm-2 col-form-label">Mô Tả</label>
				<div class="col-sm-10">
					<textarea name="MoTa" class="form-control" id="editor"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12  text-center ">
					<button type="submit" class="btn btn-sm btn-primary">Thêm</button>
					<a href="{{route('admin.phong')}}" class="btn btn-sm btn-default">Thoát</a>
				</div>

			</div>
		</form>
		<div class="col-md-4">
			<img src="#" id="output" alt="" width="150px" height="150px">
		</div>
	</div>
</div>
<script type="text/javascript">
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection