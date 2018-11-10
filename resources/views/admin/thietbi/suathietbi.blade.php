<?php
use App\Models\ThietBi;
$images = ThietBi::image($thietbi->Image);
?>
@extends('layouts._share.admin')
@section('title',"Sửa thiết bị")
@section('content')
@if(isset($thietbi))
<?php
    $uploadDir = "./image/phong";
    $error = array();
    $allowedExts= array("jpg","png", "gif", "jpeg", "svg");
    if(isset($_POST["upload"]))
    {
        $file = $_FILES["Image"];
        $fileName = $file["name"];
        $tmpFile = $file["tmp_name"];
        $size = $file["size"];

        $arr = explode(".", $fileName);
        $ext = strtolower(end($arr));

        if(!in_array($ext, $allowedExts))
        {
            $error[]= "File extension .$ext is not allowed";
        }

        if($size > 4096000)
        {
            $error[] = "File size must smaller than 4MB";
        }
        if(empty($error))
        {
            move_uploaded_file($tmpFile, "$uploadDir/$fileName");
        }
        else
        {
            unlink($tmpFile);
        }
    }
?>
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
                <div class="col-md-12">
                    @if($errors->has('TenTB'))
                    <p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenTB')}}</p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="Image" class="col-sm-2 col-form-label">Thêm Ảnh</label>
                <div class="col-sm-10">
                        <input type='file' id="imgInp" name="Image" accept="image/*" onchange="loadFile(event)" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12  text-center ">
                    <button type="submit" name="upload" class="btn btn-sm btn-primary">Lưu</button>
                    <a href="{{route('admin.thietbi')}}" class="btn btn-sm btn-default">Thoát</a>
                </div>
            </div>
        </form>
        <div class="col-md-4">
            <div class="row">
                <p>Ảnh :</p>
                    @foreach($images as $image)
                       <img id="output" src="{{asset('image/phong')}}/{{$image}}" style='max-height: 128px; max-width:128px; padding: 10px;'>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

<script type="text/javascript">
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
