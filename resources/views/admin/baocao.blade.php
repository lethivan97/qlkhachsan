@extends('layouts._share.admin')
@section('title','Báo Cáo')
@section('content')
<div class="container">

	<div id="app">
		{!! $chart->container() !!}
	</div>
	<script src="https://unpkg.com/vue"></script>
	<script>
		var app = new Vue({
			el: '#app',
		});
	</script>
	<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
	{!! $chart->script() !!}
	<div class="row">
		<div class="col-md-12 text-center">
			<h5 class="text-success">Báo cáo doanh thu và lượt khách đặt</h5>
		</div>
	</div>
</div>
@endsection
