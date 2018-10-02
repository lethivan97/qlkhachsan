@include('layouts._share.client.css')
<div class="container">
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-md-6" style="margin: 0 auto">
			<form action="" method="post" >
				<div class="text-center">
					<h3 class="text-info">Login page</h3>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" value="" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" value="" placeholder="Enter Password" class="form-control">
				</div>
				<div class="form-group">
					<input id="remember" type="checkbox" name="remember" value="1">
					<label for="remember">Remember me</label>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-info btn-sm">Login</button>
					<a href="index.php" class="btn btn-danger btn-sm">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>