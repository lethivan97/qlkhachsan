@extends('layouts._share.client')
@section('title','Đăng ký')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 150px;margin-bottom: 100px">
                <div class="card-header">{{ __('Đăng ký') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ Tên') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <input type="text" name="role" value="0" hidden>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Xác nhận Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diachi" class="col-md-4 col-form-label text-md-right">{{ __('Địa Chỉ') }}</label>

                            <div class="col-md-6">
                                <input id="diachi" type="text" class="form-control{{ $errors->has('diachi') ? ' is-invalid' : '' }}" name="diachi" value="{{ old('diachi') }}" required autofocus>

                                @if ($errors->has('diachi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('diachi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dienthoai" class="col-md-4 col-form-label text-md-right">{{ __('Điện Thoại') }}</label>

                            <div class="col-md-6">
                                <input id="dienthoai" type="tel" class="form-control{{ $errors->has('dienthoai') ? ' is-invalid' : '' }}" name="dienthoai" value="{{ old('dienthoai') }}" required autofocus>

                                @if ($errors->has('dienthoai'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dienthoai') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
