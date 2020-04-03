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

	      <h1><i class="fa fa-dashboard"></i>TYRE Details</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">TYRE</a></li>

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
			
						<div class="col-sm-12 col-md-12 col-xl-12" >
              <table class="table table-stripped table-bordered" id="account_table" style="width: 100%">
							
              <thead>
                <tr >
                  <th >SR. NO</th>
                  <th >VEHICLE NO</th>
                  <th >VEHICLE IMEI NO</th>
                  <th >VEHICLE CURRENT KM.</th>
                  <th >DATA DATE</th>
                  <th >TYRE NO</th>
                  <th >TYRE POSITION</th>
                  <th >STATUS</th>
                </tr>
              </thead>
              <tbody>
                <?php $count = 0; ?>
              @foreach($gps_imei as $gps)
              @if($gps->vehicle->tyre != null)
                @foreach($gps->vehicle->tyre as $tyre)
                  <?php
                    $km = $tyre->vch_cur_km + $tyre->tyre_exp_km - 100 ;
                    $total_km = $tyre->vch_cur_km + $tyre->tyre_exp_km ;
                    $gps_km = $gps->reading;
                   
                  ?>
               <tr>
                  <td>{{++$count}}</td>
                  <td>{{$gps->vehicle ? $gps->vehicle->vch_no:'NO RECORD FOUND' }}</td>
                  <td>{{$gps->imei ? $gps->imei : 'NO RECORD FOUND' }}</td>
                  <td>{{$gps->reading ? $gps->reading : 'NO RECORD FOUND' }}</td>
                  <td>{{$gps->duty_date ? $gps->duty_date : 'NO RECORD' }}</td>
                  <td>{{$tyre->tyre_no ? $tyre->tyre_no : 'NO RECORD' }}</td>
                  <td>{{$tyre->tyre_position ? $tyre->tyre_position : 'NO RECORD' }}</td>
                  @if($km <= $gps_km && $gps_km <= $total_km)
                    <td style="color: red" class="blinking"><b>{{'NEED TO CHANGE TYRE' }}</b></td>
            
                  @elseif($gps_km >= $total_km)
                    <td style="color: red" class="blinking"><b>{{'TYRE Expired..' }}</b></td>
                
                  @else
                    <td>{{'NO NEED TO CHANGE..' }}</td>
                  @endif
                </tr>
                @endforeach
              @endif
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