@include('layouts._share.client.css')
<div class="container">
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-md-6" style="margin: 0 auto">
			<form action="" method="post" >
				<div class="text-center">
					<h3 class="text-info">Đăng ký tài khoản</h3>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="Email" value="" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="Password" value="" placeholder="Enter Password" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Điện thoại</label>
					<input type="number" name="SDT" value="" placeholder="Enter Phone" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ</label>
					<textarea name="DiaChi" class="form-control"></textarea>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-info btn-sm">Đăng ký</button>
					<a href="{{route('home')}}" class="btn btn-danger btn-sm">Thoát</a>
				</div>
			</form>
		</div>
	</div>
</div>