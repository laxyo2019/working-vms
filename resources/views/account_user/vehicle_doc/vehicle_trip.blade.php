@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('meta')
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@endsection
@section('content') 

<main class="app-content">
	  <div class="app-title">
	    <div>

	      <h1><i class="fa fa-dashboard"></i>TRIP Details</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">TRIP</a></li>

	    </ul>
	  </div>
	  @if(session('success'))
         <div class="alert alert-danger">
            {{session('success')}}
        </div>
      @endif
	<div class="row" id="account_user">
		<div class="col-md-12 m-auto">
			<div class="card">
				
				<div class="card-body " >
					<div class="row">						
			
						<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable3">
							<table class="table table-stripped table-bordered" id="account_table" style="width: 100%">
								<thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 200px;">VEHICLE NO.</th>
                  <th style="width: 200px;">STARTING POINT</th>
                  <th style="width: 200px;">ENDING POINT</th>
                  <th style="width: 320px;">STARTING DATE</th>
                  <th style="width: 320px;">ENDING DATE</th>
                  <th style="width: 200px;">TRIP AMOUNT</th>
                  <th style="width: 200px;">DRIVER NAME</th>
                  <th style="width: 200px;">OWNER</th>
                </tr>
              </thead>
              <tbody>
                @php $count=1; @endphp
                @foreach($data as $data)
                <?php 
                  $old_date_timestamp = strtotime($data->starting_date);
                  $starting_date = date('d-M-Y H:i:s', $old_date_timestamp);
                  $old_date_timestamp = strtotime($data->ending_date);
                  $ending_date = date('d-M-Y H:i:s', $old_date_timestamp);
                ?>
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$data->vehicle->vch_no}}</td>
                  <td>{{$data->from_city ? $data->from_city->city_name : 'NO RECORD'}}</td>
                  <td>{{$data->to_city ? $data->to_city->city_name : 'NO RECORD'}}</td>
                  <td>{{$starting_date}}</td>
                  <td>{{$ending_date}}</td>
                  <td>{{$data->trip_amt}}</td>
                  <td>{{$data->driver_name}}</td>
                  <td>{{$data->owner->name}}</td>
                </tr>
                @endforeach
              </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
	$(document).ready(function(){		
		$('#account_table').DataTable();		
	})	
	
</script>

@endsection