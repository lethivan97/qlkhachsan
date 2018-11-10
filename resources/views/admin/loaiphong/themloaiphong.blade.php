@extends('layouts._share.admin')
@section('title',"Thêm loại phòng")
@section('content')
<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Thêm mới loại phòng</h3>
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
					<input type="text" class="form-control" name="TenLoai" placeholder="Nhập tên loại" required value="{{old('TenLoai')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="BiDanh" class="col-sm-2 col-form-label">Bí danh</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="BiDanh" placeholder="Nhập bí danh" required value="{{old('BiDanh')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="Giuong" class="col-sm-2 col-form-label">Giường</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Giuong" placeholder="Nhập loại giường" value="{{old('Giuong')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="NguoiLon" class="col-sm-2 col-form-label">Người lớn</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="NguoiLon" placeholder="Nhập số lượng"  value="{{old('NguoiLon')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="TreCon" class="col-sm-2 col-form-label">Trẻ con</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="TreCon" placeholder="Nhập số lượng"  value="{{old('TreCon')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="DienTich" class="col-sm-2 col-form-label">Diện tích</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="DienTich" placeholder="Nhập diện tích" value="{{old('DienTich')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="HuongNhin" class="col-sm-2 col-form-label">Hướng nhìn</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="HuongNhin" placeholder="Hướng nhìn"  value="{{old('HuongNhin')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="TreCon" class="col-sm-2 col-form-label">Giường phụ</label>
				<div class="col-sm-10">
					<input type="radio" name="GiuongPhu" placeholder="Số lượng" value="1"> Có
					<input type="radio" name="GiuongPhu" placeholder="Số lượng" value="0" checked=""> Không
				</div>
			</div>
			<div class="form-group row">
				<label for="DonGia" class="col-sm-2 col-form-label">Giá phòng (Min)</label>
				<label for="MaLoai" class="col-sm-1 col-form-label">$</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="DonGia" placeholder="Nhập giá phòng" required value="{{old('DonGia')}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="Image" class="col-sm-2 col-form-label">Ảnh</label>
				<div class="col-sm-10">
					<input type="file" name="Image" id="imgInp" accept="image/*" onchange="loadFile(event)" >
				</div>
			</div>
			<div class="form-group row">
				<label for="MoTa" class="col-sm-2 col-form-label">Mô tả</label>
				<div class="col-sm-10">
					<textarea name="MoTa" class="form-control" id="editor">{{old('MoTa')}}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="MoTaChiTiet" class="col-sm-2 col-form-label">Mô tả chi tiết</label>
				<div class="col-sm-10">
					<textarea name="MoTaChiTiet" class="form-control" id="editor1">{{old('MoTaChiTiet')}}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12  text-center ">
					<button type="submit" class="btn btn-sm btn-primary">Thêm</button>
					<a href="{{route('admin.loaiphong')}}" class="btn btn-sm btn-default">Thoát</a>
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