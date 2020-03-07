@extends('layouts.ACLadmin')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div> 
		  <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      {{-- <button id="get">Get</button> --}}
		</div>
	<ul class="app-breadcrumb breadcrumb">
	    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	</ul> 
	</div>
		@if(session('success'))
	    <div class="alert alert-danger">
	        {{session('success')}} 
	    </div>
		@endif 
	<div class="row" id="dashbord_account">
	    <div class="col-md-4 col-lg-4">
	      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
	        <div class="info">
	          <h4><b><i>Users</i></b></h4>
	          <p><b>{{$user}}</b></p>
	        </div>
	        <a class="icon fa fa-plus fa-3x  btn" href="{{route('account_users')}}"></a>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
	        <div class="info">
	          <h4><b><i>Fleets</i></b></h4>
	          <p><b>{{$fleet}}</b></p>
	        </div> 
	        <a class="icon fa fa-plus fa-3x btn" href="{{route('fleet.index')}}"></a>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="widget-small warning coloured-icon"><i class="icon fa fa-car fa-3x"></i>
	        <div class="info">
	          <h4><b><i>Vehicles</i></b></h4>
	          <p><b>{{$i}}</b></p>
	        </div>
	        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#myModal"></button>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="widget-small danger coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
	        <div class="info">
	          <h4><b><i>Drivers</i></b></h4>
	          <p><b>{{$driver_count}}</b></p>
	        </div>
	          <a class="icon fa fa-eye fa-3x btn" href="{{url('/Alldriver')}}"></a>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
	        <div class="info">
	          <h4><b><i>Incomes</i></b></h4>
	          <p><b>50000</b></p>
	        </div>
	          <a class="icon fa fa-eye fa-3x btn" href="{{route('fleet.index')}}"></a>
	      </div>
	    </div>
	    <div class="col-md-4 col-lg-4">
	      <div class="widget-small info coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
	        <div class="info">
	          <h4><b><i>Expences</i></b></h4>
	          <p><b>{{$expenses}}</b></p>
	        </div>
	          <a class="icon fa fa-eye fa-3x btn" href="{{route('fleet.index')}}"></a>
	      </div>
	    </div>
	</div>
  <div class="row">
    <form action="{{url('/get_chart')}}" method="POST">
      @csrf
      <div class="col-md-10">
        <input id="trip_year" class="form-control datepicker"  name="trip_year" value="" type="text" placeholder="Search For Trip.." style="width: 1000px;">
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-default fa fa-search pull-right" style="width: 62px;"></button>
      </div>
    </form>
  </div>  
  <div class="row">
    <div class="col-md-12">
      {!! $chart2->html() !!}
      {{-- {!! $chart->html() !!} --}}
    </div>
    <div class="col-md-12">
      {!! $chart1->html() !!}
    </div>
  </div>
  {!! Charts::scripts() !!}
  {!! $chart2->script() !!}
  {{-- {!! $chart->script() !!} --}}
  {!! $chart1->script() !!}
</main>


<!-- Modal For All Vehicle -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ALL VEHICLES DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="margin-left:100px;">
        <div class="row" style="width: 80px;">
        	<div class="col-md-12">
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small primary coloured-icon" ><i class="icon fa fa-car"></i>
			        <div class="info">
			          <h4><b>Running Vehicles</b></h4>
			          <p><b>{{$running}}</b></p>
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="running"></button>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck "></i>
			        <div class="info">
			          <h4><b>Stand By Vehicles</b></h4>
			          <p><b>{{$standby}}</b></p>
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="standby"></button>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small warning coloured-icon"><i class="icon fa fa-wrench "></i>
			        <div class="info">
			          <h4><b>Repair & maintenence Vehicles</b></h4>
			          <p><b>{{$repair}}</b></p>
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="repair"></button>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small primary coloured-icon"><i class="icon fa fa-truck"></i>
			        <div class="info">
			          <h4><b>Ready For Load Vehicles</b></h4>
			          <p><b>{{$unloaded}}</b></p>
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="ready"></button>
			      </div>
			    </div>
	    	</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Model For Running Vehicle List-->
<div class="modal fade" id="running_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-size: 25px;"><center><b><i>Running Vehicle List</i></b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="running_table">
        	<thead class="thead-light">
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>VEHICLE SATUS</th>
        			<th>VEHICLE SITE</th>
        		</tr>
        	</thead>
        	<tbody class="table-info">
        	 @php $count =1; @endphp
        	  @foreach($running_vch as $vch_running)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$vch_running->vehicle ? $vch_running->vehicle->vch_no : '' }}</td>
        			<td>{{$vch_running->status}}</td>
        			<td>{{$vch_running->fleet_code}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        	
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Model For StandBy Vehicle List -->
<div class="modal fade" id="standby_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="standby_model" style="font-size: 25px;"><center><b><i>StandBy Vehicle List</i></b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="standby_table">
        	<thead class="thead-light">
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>VEHICLE SATUS</th>
        			<th>VEHICLE SITE</th>
        		</tr>
        	</thead>
        	<tbody class="table-info">
        	 @php $count =1; @endphp
        	  @foreach($standby_vch as $vch_standby)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$vch_standby->vehicle ? $vch_standby->vehicle->vch_no : '' }}</td>
        			<td>{{$vch_standby->status}}</td>
        			<td>{{$vch_standby->fleet_code}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        	
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Model For Ready For Load Vehicle List -->
<div class="modal fade" id="ready_model" tabindex="-1" role="dialog" aria-labelledby="ready_model" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ready_model" style="font-size: 25px;"><center><b><i>Ready For Load Vehicle List</i></b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="ready_table">
        	<thead  class="thead-light">
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>VEHICLE SATUS</th>
        			<th>VEHICLE SITE</th>
        		</tr>
        	</thead>
        	<tbody class="table-info">
        	 @php $count =1; @endphp
        	  @foreach($unloaded_vch as $vch_ready)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$vch_ready->vehicle ? $vch_ready->vehicle->vch_no : '' }}</td>
        			<td>{{$vch_ready->status}}</td>
        			<td>{{$vch_ready->fleet_code}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        	
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Model For Repair/maintanence Vehicle List -->
<div class="modal fade" id="repair_model" tabindex="-1" role="dialog" aria-labelledby="repair_model" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="repair_model" style="font-size: 25px;"><center><b><i>Repair/Maintanence Vehicle List</i></b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="repair_table">
        	<thead class="thead-light">
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>VEHICLE SATUS</th>
        			<th>VEHICLE SITE</th>
        		</tr>
        	</thead>
        	<tbody class="table-info">
        	 @php $count =1; @endphp
        	  @foreach($repair_vch as $vch_repair)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$vch_repair->vehicle ? $vch_repair->vehicle->vch_no : '' }}</td>
        			<td>{{$vch_repair->status}}</td>
        			<td>{{$vch_repair->fleet_code}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        	
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
   
       $('.datepicker').datepicker({
            format: "yyyy",
            weekStart: 1,
            viewMode: "years",
            minViewMode: "years"
        });

  });
$(document).ready( function () {
  
    // header("Access-Control-Allow-Origin: *");

    $('#running_table').DataTable();
    $('#standby_table').DataTable();
    $('#ready_table').DataTable();
    $('#repair_table').DataTable();

    // $('#get').on('click',function(){
    //   $.ajax({
    //     type:'GET',
    //     url:'http://s0.apnagps.com/track/vms/api/565464',
    //     success:function(res){
    //       $.ajax({
    //         type:'POST',
    //         url:'{{route('api_data')}}',
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data:{data:res},
    //         success:function(res){

    //           console.log(res);
    //         }
    //       });
    //     },
    //     error: function(xhr, status, error){
    //         alert("Error!" + xhr.status);
    //     }
    //   });
    // });



});
 document.getElementById("running").onclick = function () {
      $('#myModal').modal('hide');
      $('#running_model').modal('show');
    }
 document.getElementById("standby").onclick = function () {
    	$('#myModal').modal('hide');
    	$('#standby_model').modal('show');
    }
document.getElementById("repair").onclick = function () {
	$('#myModal').modal('hide');
	$('#repair_model').modal('show');
}
document.getElementById("ready").onclick = function () {
	$('#myModal').modal('hide');
	$('#ready_model').modal('show');
}



</script>
@endsection