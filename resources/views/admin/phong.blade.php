@extends('layouts._share.admin')
@section('content')

	<div class="container">
	  <h2>Danh sách phòng</h2>

	  <form method="get" action="{{route('admin.phong')}}">
		  <input type="text" name="key" placeholder="Nhập tên phòng">
		  <input type="submit" value="Lọc">
	  </form>
	  <table class="table table-striped">
	  	<thead>
	      <tr>
	        <th>Mã phòng</th>
	        <th>Tên phòng</th>
	        <th>Trạng thái</th>
	        <th>Loại phòng</th>
	        <th>Mô tả</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($phongs as $row)
	    		<tr>
		        @foreach($row as $value)
		        	<td>{{$value}}</td>
		        @endforeach
		      </tr>
	    	@endforeach
	    </tbody>
	  </table>
	</div>

	{!!$phongs->links()!!}

@endsection