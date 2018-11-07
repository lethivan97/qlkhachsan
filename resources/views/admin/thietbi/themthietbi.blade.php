@extends('layouts._share.admin')
@section('title',"Thêm thiết bị")
@section('content')
<div class="container">
    <div class="row">
        <h3 class="text-success" style="margin: 50px 0">Thêm mới thiết bị</h3>
    </div>
    <div class="row">
        <form class="col-md-8" method="POST" >
            @csrf
            <div class="form-group row">
                <label for="TenTB" class="col-sm-2 col-form-label">Tên Thiết bị</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="TenTB" placeholder="Nhập Tên Thiết Bị">
                </div>
            </div>
            <div class="form-group row">
                <label for="Image" class="col-sm-2 col-form-label">Ảnh</label>
                <div class="col-sm-10">
                    <input type="file" name="Image" >
                </div>
            </div>
            <div class="form-group row">
                <label for="SoLuong" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="SoLuong" placeholder="Nhập Số lượng Thiết Bị">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12  text-center ">
                    <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
                    <a href="{{route('admin.thietbi')}}" class="btn btn-sm btn-default">Thoát</a>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection