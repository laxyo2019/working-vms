@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('meta')
   
    <meta name="viewport" content="width=device-width, initial-scale=1">

@endsection
@section('content') 

<main class="app-content">
	  <div class="app-title">
	    <div>

	      <h1><i class="fa fa-dashboard"></i>Expenses Details</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">RC</a></li>

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
                    <th style="width: 100px;">SR. NO</th>
                    <th style="width: 320px;">VEHICLE NUMBER</th>
                    <th style="width: 320px;">EXPENSE AMOUNT</th>
                    <th style="width: 61px;">VIEW</th>
                  </tr>
                </thead>
                <tbody>
                <?php $count = 0; ?>
               
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