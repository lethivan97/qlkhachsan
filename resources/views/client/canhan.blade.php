@extends('layouts._share.client')
@section('title','Thông tin cá nhân')
@section('content')
<div class="container">
	<div class="row" style="margin: 200px 0">
		<div class="col-md-12" style="margin-bottom: 50px">
			<h3 class="text-info">Thông tin chi tiết</h3>
		</div>
		<div class="col-md-4">
			<div class="col-md-12 text-center">
				<img src="{{asset('image/user-plus.png')}}" class="thumbnail" width="150">
			</div>
			<div class="col-md-12">
				<h4 class="text-danger text-center">{{Auth::user()->name}}</h4>
			</div>
		</div>
		<div class="col-md-8">
			<div class="col-md-12">
				@if(Session::has('thongbao'))
				<h5 class="text-danger">{{Session::get('thongbao')}}</h5>
				@endif
			</div>
			<form method="POST">
				@csrf

				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ Tên') }}</label>

					<div class="col-md-6">
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{Auth::user()->name}}" required disabled >
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

					<div class="col-md-6">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{Auth::user()->email}}" required disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="diachi" class="col-md-4 col-form-label text-md-right">{{ __('Địa Chỉ') }}</label>

					<div class="col-md-6">
						<input id="diachi" type="text" class="form-control{{ $errors->has('diachi') ? ' is-invalid' : '' }}" name="diachi" value="{{Auth::user()->diachi}}" required autofocus disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="dienthoai" class="col-md-4 col-form-label text-md-right">{{ __('Điện Thoại') }}</label>

					<div class="col-md-6">
						<input id="dienthoai" type="tel" class="form-control" name="dienthoai" value="{{Auth::user()->dienthoai}}" required  disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">Password cũ</label>

					<div class="col-md-6">
						<input  type="password" class="form-control" name="password" required>
					</div>
					<div class="col-md-12">
						@if ($errors->has('password'))
						<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('password')}}</p>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">Password mới</label>

					<div class="col-md-6">
						<input  type="password" class="form-control" name="new_password" required>
					</div>
					<div class="col-md-12">
						@if ($errors->has('new_password'))
						<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('new_password')}}</p>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Xác nhận Password</label>

					<div class="col-md-6">
						<input  type="password" class="form-control" name="password_confirmation" required>
					</div>
					<div class="col-md-12">
						@if ($errors->has('password_confirmation'))
						<p class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('password_confirmation')}}</p>
						@endif
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-success">
							{{ __('Lưu') }}
						</button>
						<a class="btn btn-primary" href="{{route('client')}}">
							{{ __('Thoát') }}
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection