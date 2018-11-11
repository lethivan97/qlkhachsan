@extends('layouts._share.admin')
@section('title',"Sửa User")
@section('content')
@if(isset($user))

<div class="container">
	<div class="row">
		<h3 class="text-success" style="margin: 50px 0">Sửa mật khẩu {{$user->name}}</h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if(Session::has('thongbao'))
			<p class="text-danger">{{Session::get('thongbao')}}</p>
			@endif
		</div>
	</div>
	<div class="row">
		<form class="col-md-8" method="POST" id ="formChangePass">
			@csrf
			<div class="form-group row">
				<label for="password" class="col-sm-3 col-form-label">Nhập mật khẩu cũ</label>
				<div class="col-sm-9" id = "old_pass">
					<input type="password" class="form-control" name="password" placeholder="Nhập password">
				</div>
				<div class="col-md-12">
					@if($errors->has('password'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('password')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-sm-3 col-form-label">Nhập mật khẩu mới</label>
				<div class="col-sm-9" id = "new_pass">
					<input type="password" class="form-control" name="new_password" placeholder="Nhập password mới">
				</div>
				<div class="col-md-12">
					@if($errors->has('new_password'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('new_password')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-sm-3 col-form-label">Xác nhận mật khẩu mới</label>
				<div class="col-sm-9" id = "re_new_pass">
					<input type="password" class="form-control" name="re_new_password" placeholder="Xác nhận password">
				</div>
				<div class="col-md-12">
					@if($errors->has('re_new_password'))
					<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('re_new_password')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12  text-center ">
					<button type="submit" class="btn btn-sm btn-primary">Lưu</button>
					<a href="{{route('admin.user')}}" class="btn btn-sm btn-default">Thoát</a>
				</div>
			</form>
		</div>
	</div>
	@endif
	@endsection