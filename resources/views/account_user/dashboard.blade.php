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
	        <div class="col-md-6 col-lg-3">
	          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
	            <div class="info">
	              <h4>Users</h4>
	              <p><b>{{$user}}</b></p>
	            </div>
	            <a class="icon fa fa-plus fa-3x  btn" href="{{route('account_users')}}"></a>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-3">
	          <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
	            <div class="info">
	              <h4>Fleets</h4>
	              <p><b>{{$fleet}}</b></p>
	            </div>
	            <a class="icon fa fa-plus fa-3x btn" href="{{route('fleet.index')}}"></a>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-3">
	          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
	            <div class="info">
	              <h4>Vehicles</h4>
	              <p><b>{{$i}}</b></p>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-3">
	          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
	            <div class="info">
	              <h4>Stars</h4>
	              <p><b>500</b></p>
	            </div>
	          </div>
	        </div>
	    </div>
</main>
@endsection