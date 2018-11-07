@extends('layouts._share.admin')
@section('title','User')
@section('content')
<div class="container">
	<h2>Danh sách User</h2>
	<div class="row">
		<div class="col-md-6">
			<form method="get" action="{{route('admin.user')}}">
				<input type="text" style="width: 300px;float: left;margin-right: 20px" id="search" name="key" placeholder="Nhập tên user" onkeyup="searchFunction();" class="form-control">
				<input type="submit" value="Lọc" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-6">
			<a href="{{route('admin.user.them-moi')}}" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-plus-circle"></i></a>

		</div>
	</div>
	@if(count($users) > 0)
	<table class="table table-striped" id="tableId" style="margin-top: 20px">
		<thead>
			<tr>
				<th>STT</th>

				<th>Tên User</th>
				<th>Email</th>
				<th>Role</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $row)
			<tr>
				<td>{{$row->id}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->email}}</td>
				<td>
					@if($row->role == 1)
					Admin
					@else
					Member
					@endif
				</td>
				<td>
					<a href="{{route('admin.user.sua-user',['id'=>$row->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
					<button class="btn btn-sm" data-toggle="modal" data-target="#chitietuser{{$row->id}}"><i class="fa fa-eye"></i></button>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="{{route('admin.user.xoa-user',['id'=>$row->id])}}"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<div class="modal fade bd-example-modal-lg" id="chitietuser{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center" id="exampleModalCenterTitle">Thông tin <span class="text-danger">{{$row->name}}</span></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<div class="row">
									<div class="row">
										<div class="col-md-3">
											HoTen:
										</div>
										<div class="col-md-9">
											{{$row->name}}
										</div>
										<div class="col-md-3">
											Email:
										</div>
										<div class="col-md-9">
											{{$row->email}}
										</div>
										<div class="col-md-3">
											Role :
										</div>
										<div class="col-md-9">
											@if($row->role == 1)
											Admin
											@else
											Member
											@endif
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
			{{$users->links()}}
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