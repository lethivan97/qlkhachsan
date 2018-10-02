<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="image/favicon.png" type="image/png">
	<title>@yield('title','Hotel')</title>
	<!-- Bootstrap CSS -->
	@include('layouts._share.client.css')
</head>
<body>
	@include('layouts._share.client.header')
	@yield('content')
	@include('layouts._share.client.footer')
	@include('layouts._share.client.js')
</body>
</html>