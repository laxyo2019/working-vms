@extends('state.main') 
@section('content')
<div class="container-fluid">
	<div id="ContentPlaceHolder1_PnlShow"  >
                <a class="btn btn-inverse pull-right mt-1" href="{{route('vehiclereport.index')}}">Back</a>
	  	<div class="row">
		    <div class="col-sm-12">
		      	<div class="box">
			        <div class="box-title">
			      	</div>
			            <table id="myTable">
			              <thead>
			              	<tr >
			                  <th style="width: 62px;">FINENCE COMPANY</th>
			                  <th style="width: 410px;">CUSTOMER NAME</th>
			                  <th style="width: 410px;">ADDRESS</th>
			                  <th style="width: 410px;">CITY</th>
			                  <th style="width: 410px;">VEHICLE NO</th>
			                  <th style="width: 410px;">TOTAL INSTALLMENT</th>
			                  <th style="width: 410px;">CONTRACT NO</th>
			                  <th style="width: 410px;">CONTRACT DATE</th>
			                  <th style="width: 410px;">CONTRACT EX. DATE</th>
			                </tr>
			                 <tr>
			                	<td>{{$results->finance_com_name}}</td>
			                	<td>{{$results->customer_name}}</td>
			                	<td>{{$results->customer_address}}</td>
			                	<td>{{$results->city->city_name}}</td>
			                	<td>{{$results->vch_no->vch_no}}</td>
			                	<td>{{$results->installment_no}}</td>
			                	<td>{{$results->contract_no}}</td>
			                	<td>{{$results->contract_date}}</td>
			                	<td>{{$results->expair_date}}</td>
			                </tr>
			                <tr >
			                  <th style="width: 410px;">INST. NO</th>
			                  <th style="width: 410px;">INST. DATE</th>
			                  <th style="width: 410px;">INST. AMT</th>
			                  <th style="width: 410px;">BALANCE</th>
			                  <th style="width: 410px;">PAY MODE</th>
			                  <th style="width: 410px;">CHEQUE DETAILS</th>
			                  <th style="width: 410px;">RECEIPT NO</th>
			                  <th style="width: 410px;">PAID AMT</th>
			                  <th style="width: 410px;">PAID DATE</th>
			                </tr>
			              </thead>
			              <tbody>
			                @php $count =1; @endphp
			                @foreach($datas as $data)
			                <tr>
			                	<td>{{$count++}}</td>
			                </tr>
			                @endforeach
			              </tbody>
			            </table>
		        </div>
		    </div>
	  	</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', {
                extend: 'print',
                // text: '<i class="fa fa-print" aria-hidden="true"></i>',
                
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