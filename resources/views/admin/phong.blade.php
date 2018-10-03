@extends('layouts._share.admin')
@section('content')

	<div class="container">
	  <h2>Danh sách phòng</h2>

	  <input type="text" id="search" placeholder="Nhập tên phòng" onkeyup="searchFunction();">

	  <table class="table table-striped" id="tableId">
	  	<thead>
	      <tr>
	        <th>Mã phòng</th>
	        <th>Trạng thái</th>
	        <th>Loại phòng</th>
	        <th>Tên phòng</th>
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

	<script type="text/javascript">
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