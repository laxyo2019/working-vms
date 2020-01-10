@extends('layouts.ACLadmin')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
		  <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
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
		<div class="col-md-12">
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Users</i></b></h4>
		          <p><b>{{$user}}</b></p>
		        </div>
		        <a class="icon fa fa-plus fa-3x  btn" href="{{route('account_users')}}"></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Fleets</i></b></h4>
		          <p><b>{{$fleet}}</b></p>
		        </div>
		        <a class="icon fa fa-plus fa-3x btn" href="{{route('fleet.index')}}"></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-car fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Vehicles</i></b></h4>
		          <p><b>{{$i}}</b></p>
		        </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#myModal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small danger coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Drivers</i></b></h4>
		          <p><b>{{$driver_count}}</b></p>
		        </div>
		          <a class="icon fa fa-eye fa-3x btn" href="{{url('/Alldriver')}}"></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Incomes</i></b></h4>
		          <p><b>50000</b></p>
		        </div>
		          <a class="icon fa fa-eye fa-3x btn" href="{{route('fleet.index')}}"></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Expences</i></b></h4>
		          <p><b>20000</b></p>
		        </div>
		          <a class="icon fa fa-eye fa-3x btn" href="{{route('fleet.index')}}"></a>
		      </div>
		    </div>

	    </div>
	</div>
</main>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
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
			          <p><b>10</b></p>
			        </div>
			        <a class="icon fa fa-eye" href="{{route('account_users')}}"></a>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck "></i>
			        <div class="info">
			          <h4><b>Stand By Vehicles</b></h4>
			          <p><b>4</b></p>
			        </div>
			        <a class="icon fa fa-eye fa-3x btn" href="{{route('fleet.index')}}"></a>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small warning coloured-icon"><i class="icon fa fa-wrench "></i>
			        <div class="info">
			          <h4><b>Repair Vehicles</b></h4>
			          <p><b>2</b></p>
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " data-toggle="modal" data-target="#myModal"></button>
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
@endsection