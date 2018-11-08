@extends('layouts._share.admin')
@section('title',"Sửa User")
@section('content')
@if(isset($user))

<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Sửa {{$user->name}}</h3>
	</div>
	<div class="row">
		<form class="col-md-8" method="POST">
			@csrf
			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Nhập mật khẩu cũ</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="password" placeholder="Nhập password">
				</div>
			 </div>
			 <div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Nhập mật khẩu mới</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="password" placeholder="Nhập password">
				</div>
			 </div>
			 <div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Xác nhận mật khẩu m</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="password" placeholder="Nhập password">
				</div>
			 </div>
		</form>
	</div>
</div>		
@endif
@endsection