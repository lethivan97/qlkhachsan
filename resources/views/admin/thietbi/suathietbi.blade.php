<?php
use App\Models\ThietBi;
$images = ThietBi::image($thietbi->Image);
?>
@extends('layouts._share.admin')
@section('title',"Sửa thiết bị")
@section('content')
@if(isset($thietbi))
<div class="container">
    <div class="row">
        <h3 class="text-success" style="margin: 50px 0">Sửa {{$thietbi->TenTB}}</h3>
    </div>
    <div class="row">
        <form class="col-md-8" method="POST">
            @csrf
            <div class="form-group row">
                <label for="TenTB" class="col-sm-2 col-form-label">Tên thiết bị</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="TenTB" placeholder="Nhập Tên Thiết bị" value="{{$thietbi->TenTB}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Image" class="col-sm-2 col-form-label">Thêm Ảnh</label>
                <div class="col-sm-10">
                    <input type="button" name="selectImg" value="Select Image"
                onclick="selectImage();">
                </div>
            </div>
            <div class="form-group row">
                <label for="SoLuong" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="SoLuong" placeholder="Nhập Số lượng Thiết bị" value="{{$thietbi->SoLuong}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12  text-center ">
                    <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                    <button type="button" class="btn btn-sm">Thoát</button>
                </div>

            </div>
        </form>
        <div class="col-md-4">
            <div class="row">
                <p>Ảnh :</p>
                <div class="col-md-12 row testimonial_slider owl-carousel">
                    @foreach($images as $image)
                    <div class="media">
                        <input type="hidden" id="image_url" name="image_url">
                        <img id="img" src="{{asset('image/phong')}}/{{$image}}" width="100">
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endif
@endsection

<script type="text/javascript">
    function selectImage()
    {
        open("imageThietBi.php", "", 'width=100');
    }
    function showImage(url)
    {
        document.getElementById("img").src=url;
        document.getElementById("image_url").value=url;
    }
</script>