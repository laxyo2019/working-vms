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

	      <h1><i class="fa fa-dashboard"></i>INSTALMENT Details</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">INSTALMENT</a></li>

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
            <div class="col-md-12">
              <a href="{{url('/account_finance_details')}}" style="color: #fff;" class="btn btn-primary pull-right">Back</a>
            </div>
          </div>
					<div class="row mt-4">			
						<div class="col-sm-12 col-md-12 col-xl-12">
							<table class="table table-responsive" id="account_table" style="width: 100%">
  								<thead>
                    <tr>
                      <th>VEHICLE NUMBER</th>
                      <td>{{$vch_no}}</td>
                    </tr>
                    <tr >
                      <th style="width: 62px;">SR. NO</th>
                      <th style="width: 62px;">INSTALMENT DATE</th>
                      <th style="width: 410px;">INSTALMENT AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                  @php $count = 0; @endphp
                  @foreach($data as $vehicle)
                  <?php 
                  $instalment_date = strtotime($vehicle->fist_ins_date_lst);
                  $new_ins_date = date('d-M-Y', $instalment_date);
                ?>
                  <tr>
                    <td style="width: 100px;">{{++$count}}</td>
                    <td style="width: 100px;">{{$new_ins_date}}</td>
                    <td style="width: 100px;">{{$vehicle->per_ins_amt_lst}}</td>
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