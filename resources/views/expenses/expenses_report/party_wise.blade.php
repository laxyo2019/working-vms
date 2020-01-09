@extends('state.main') 
@section('content')
<div class="container-fluid">
	<div id="ContentPlaceHolder1_PnlShow"  >
                <a class="btn btn-inverse pull-right mt-1" href="{{route('expenses_report.index')}}">Back</a>
	  	<div class="row">
		    <div class="col-sm-12">
		      	<div class="box">
			        <div class="box-title">
			      	</div>
			            <table id="myTable1" class="table">
			              <thead>
			              	<tr colspan="6">
			              		<div class="card" >
								  <div class="card-body">
								    <h5 class="card-title">Laxyo Group</h5>
								    <p class="card-text">Indore,Indore,Madhya Pradesh</p>
								    <p class="card-text">PIN No : 452001   Phone No :</p> 
								  </div>
								</div>
							</tr>
							<tr>
			              		<th colspan="10">Party Wise Expense Details as On Date : {{$date}} </th>
			              	</tr>
			                <tr >
			                  <th style="width: 500px;">JOB DONE BY</th>
			                  <th style="width: 410px;">EXPENSE TYPE</th>
			                  <th style="width: 410px;">BILL DATE</th>
			                  <th style="width: 410px;">BILL NO</th>
			                  <th style="width: 410px;">QTY</th>
			                  <th style="width: 410px;">RATE</th>
			                  <th style="width: 410px;">COST</th>
			                  <th style="width: 410px;">SERVICE TAX</th>
			                  <th style="width: 410px;">VAT TAX</th>
			                  <th style="width: 410px;">NET AMT</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<tr>
			              		<td colspan="6"><h5><b><i>Job Done By&nbsp:<span>&nbsp&nbsp&nbsp{{$party_name}}</span></i></b></h5></td>
			              	</tr>
			              	@php $sum 		= 0; @endphp
			              	@php $cost 		= 0; @endphp
			              	@php $service 	= 0; @endphp
			              	@php $vat 		= 0; @endphp
			              	@php $net 		= 0; @endphp
			              	@foreach($datas as $data)
			              	<?php
			              		$sum 		= $sum + $data->qty;
			              		$cost 		= $cost + $data->amt;
			              		$service 	= $service + $data->service_tax_amt_t;
			              		$vat 		= $vat + $data->vat_tax_amt_t;
			              		$net 		= $net + $data->net_amt;
			              	?>
			              	<tr>
			              		<td>{{$data->vehicle->vch_no}}</td>
			              		<td>{{$data->expense_type_id == 1 ? 'General Expense' : ''}}</td>
			              		<td>{{$data->bill ? $data->bill->bill_date : ''}}</td>
			              		<td>{{$data->bill ? $data->bill->bill_no : ''}}</td>
			              		<td>{{$data->qty}}</td>
			              		<td>{{$data->rate}}</td>
			              		<td>{{$data->amt}}</td>
			              		<td>{{$data->service_tax_amt_t}}</td>
			              		<td>{{$data->vat_tax_amt_t}}</td>
			              		<td>{{$data->net_amt}}</td>
			              	</tr>
			              	@endforeach
			              	<tr>
			              		<td colspan="2"><h5><b><i>Grand Total &nbsp:</i></b></h5></td>
			              		<td><span> - </span></td>
			              		<td><span> - </span></td>
			              		<td><b>{{$sum}}</b></td>
			              		<td><span> - </span></td>
			              		<td><b>{{$cost}}</b></td>
			              		<td><b>{{$service}}</b></td>
			              		<td><b>{{$vat}}</b></td>
			              		<td><b>{{$net}}</b></td>
			              	</tr>
			              </tbody>
			            </table>
		        </div>
		    </div>
	  	</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<p><span style="font-family: emoji"><b><i>Company Name:</i></b></span> LAXYO GROUP</p><p><span style="font-family: emoji"><b><i>Address:</i></b></span> County Park Indore (M.P)</p><p><span style="font-family: emoji"><b><i>Phone No:</i></b></span></p>'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    } );
} );

</script>
@endsection