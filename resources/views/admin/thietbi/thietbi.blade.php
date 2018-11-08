@extends('layouts._share.admin')
@section('title',"Thiết bị")
@section('content')
<?php
use App\Models\ThietBi;

?>
<div class="container">
    <h2>Danh sách thiết bị</h2>
    <div class="row">
        <div class="col-md-6">
            <form method="get" action="{{route('admin.thietbi')}}">
                <input type="text" style="width: 300px;float: left;margin-right: 20px" id="search" name="key" placeholder="Nhập tên thiết bị" onkeyup="searchFunction();" class="form-control">
                <input type="submit" value="Lọc" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-6">
            <a href="{{route('admin.thietbi.them-moi')}}" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-plus-circle"></i></a>
        </div>
    </div>
    @if(count($thietbis) > 0)
    <table class="table table-striped" id="tableId" style="margin-top: 20px">
        <thead>
            <tr>
                <th>Mã thiết bị</th>
                <th>Ảnh</th>
                <th>Tên thiết bị</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($thietbis as $thietbi)
            <tr>
                <td>{{$thietbi->MaTB}}</td>
                <td>
                    <?php foreach (ThietBi::image($thietbi->Image) as $i): ?>
                        <a href="#" >
                            <img src="{{asset('image/phong/')}}/{{$i}}" width="60" height="60">
                        </a>

                        @break
                    <?php endforeach?>
                </td>
                <td>{{$thietbi->TenTB}}</td>
                <td>
                    <a href="{{route('admin.thietbi.sua-thietbi',['id'=>$thietbi->MaTB])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    <button class="btn btn-sm" data-toggle="modal" data-target="#chitietthietbi{{$thietbi->MaTB}}"><i class="fa fa-eye"></i></button>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="{{route('admin.thietbi.xoa-thietbi',['id'=>$thietbi->MaTB])}}"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <div class="modal fade bd-example-modal-lg" id="chitietthietbi{{$thietbi->MaTB}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalCenterTitle">Thông tin <span class="text-danger">{{$thietbi->TenTB}}</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 row">
                                        <p>Ảnh :</p>
                                        <div class="col-md-12">
                                            <img src="{{asset('image/phong/')}}/{{$thietbi->Image}}" width="50px">
                                        </div>
                                    </div>
                                    <div class="col-md-8 row">
                                        <div class="col-md-3">
                                            Tên thiết bị :
                                        </div>
                                        <div class="col-md-9">
                                            {{$thietbi->TenTB}}
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
            {{$thietbis->links()}}
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