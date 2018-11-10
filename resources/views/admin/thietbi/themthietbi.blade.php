@extends('layouts._share.admin')
@section('title',"Thêm thiết bị")
@section('content')
<?php
    $uploadDir = "./image/phong";
    $error = array();
    $allowedExts= array("jpg","png", "gif", "jpeg", "svg");
    if(isset($_POST["add"]))
    {
        $file = $_FILES["imgImg"];
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
        <h3 class="text-success" style="margin: 50px 0">Thêm mới thiết bị</h3>
    </div>
    <div class="row">
        <form class="col-md-8" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="TenTB" class="col-sm-2 col-form-label">Tên Thiết bị</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="TenTB" placeholder="Nhập Tên Thiết Bị">
                </div>
                <div class="col-md-12">
                    @if($errors->has('TenTB'))
                    <p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('TenTB')}}</p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="Image" class="col-sm-2 col-form-label">Ảnh</label>
                <div class="col-sm-10">
                     <input type='file' id="imgAdd" name="imgImg"  onchange="loadFile(event)" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12  text-center ">
                    <button type="submit" name="add" class="btn btn-sm btn-primary">Thêm</button>
                    <a href="{{route('admin.thietbi')}}" class="btn btn-sm btn-default">Thoát</a>
                </div>

            </div>
            </form>
            <div class="col-md-4">
            <div class="row">
                <p>Ảnh :</p>
                       <img id="output" src="#" style='max-height: 128px; max-width:128px; padding: 10px;'>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

<script type="text/javascript">
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>