@extends('layouts.ACLadmin')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
		  <h1><i class="fa fa-dashboard"></i> Expenses Detailes</h1>
		</div>
	<ul class="app-breadcrumb breadcrumb">
	    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	    <li class="breadcrumb-item"><a href="#">Expenses Detailes</a></li>
	</ul> 
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<label>YEAR/MONTHS WISE EXPENSES</label>
			<input  name="date" class="form-control" id="date">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<table>
				<thead>
					<tr>
						<th>Vehicle NO</th>
						<th>Total Expenses</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $data)
					
						@foreach($data->vechicles as $data1)
					<tr>
						<td>{{$data1->vch_no ? $data1->vch_no : ''}}</td>
						<td>{{$data->puc}}</td>
					</tr>
					@endforeach
					{{-- <td>{{$data}}</td> --}}
				@endforeach
				</tbody>
			</table>
		</div>
		
	</div>
</main>
<script type="text/javascript">
  $(document).ready(function(){
       $('#date').datepicker({
            format: "yyyy-MM",
            weekStart: 1,
            viewMode: "months",
            minViewMode: "months"
        });
  });
  $('#date').on('change',function(){
  	var date = $('#date').val();
  	$.ajax({
  		url : '/expenses_details.show',
  		type : 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  		data : {'date':date},
  		success:function(data){
  			console.log(data);
  		}
  	});
  });
  </script>
@endsection