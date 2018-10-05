@extends('layouts._share.admin')
@section('content')

<div class="container">
	<h2>Danh sách phòng</h2>
	<div class="row">
		<div class="col-md-6">
			<form method="get" action="{{route('admin.phong')}}">
				<input type="text" style="width: 300px;float: left;margin-right: 20px" id="search" name="key" placeholder="Nhập tên phòng" onkeyup="searchFunction();" class="form-control">
				<input type="submit" value="Lọc" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-6">
			<button class="btn btn-info btn-sm" style="float: right;">Thêm mới</button>
		</div>
	</div>

	<table class="table table-striped" id="tableId" style="margin-top: 20px">
		<thead>
			<tr>
				<th>STT</th>
				<th>Trạng thái</th>
				<th>Loại phòng</th>
				<th>Tên phòng</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($phongs as $row)
			<tr>
				<td>{{$row->MaPhong}}</td>
				<td>{{$row->TenTT}}</td>
				<td>{{$row->TenLoai}}</td>
				<td>{{$row->TenPhong}}</td>
				<td>
					<button class="btn btn-sm btn-primary">Sửa</button>
					<button class="btn btn-sm btn-danger">Xóa</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-12 text-center">
			{{$phongs->links()}}
		</div>
	</div>
</div>

<script type="text/javascript">
	function searchFunction() {
		var input, filter, table, tr, td, i;
		input = document.getElementById("search");
		filter = input.value.toUpperCase();
		table = document.getElementById("tableId");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
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