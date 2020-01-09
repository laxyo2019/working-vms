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
			                  <th style="width: 62px;">SR. NO</th>
			                  <th style="width: 410px;">VEHICLE NUMBER</th>
			                  <th style="width: 410px;">FINANCE COMPANY</th>
			                  <th style="width: 410px;">FINANCE AMOUNT</th>
			                  <th style="width: 410px;">INTEREST AMOUNT</th>
			                  <th style="width: 410px;">OTHER AMOUNT</th>
			                  <th style="width: 410px;">TOTAL AMOUNT</th>
			                  <th style="width: 410px;">PAID AMOUNT</th>
			                  <th style="width: 410px;">TOTAL INSTALLMENT AMOUNT</th>
			                  <th style="width: 410px;">PAID INSTALLMENT</th>
			                  <th style="width: 410px;">DUE INSTALLMENT</th>
			                  <th style="width: 410px;">INSTALLMENT AMOUNT</th>
			                  <th style="width: 410px;">BALANCE AMOUNT</th>
			                </tr>
			              </thead>
			              <tbody>
			              	@php $count = 0; @endphp
			              	@php $count1 = 0; @endphp
			              
			                @foreach($datas as $data)
			                <?php $due_ins = $data->vehicle_info->installment_no - $count1;
			                $count1++ ;
			                $other = $data->vehicle_info->total_amount - ($data->vehicle_info->finance_amount + $data->vehicle_info->interest_charges);
			                ?>
			                	<tr>
			                		<td>{{++$count}}</td>
			                		<td>{{$data->vch->vch_no}}</td>
			                		<td>{{$data->vehicle_info->finance_com_name}}</td>
			                		<td>{{$data->vehicle_info->finance_amount}}</td>
			                		<td>{{$data->vehicle_info->interest_charges}}</td>
			                		<td>{{$other}}</td>
			                		<td>{{$data->vehicle_info->total_amount}}</td>
			                		<td>{{$data->vehicle_info->paid}}</td>
			                		<td>{{$data->vehicle_info->balance}}</td>
			                		<td>0</td>
			                		<td>{{$due_ins}}</td>
			                		<td>{{$data->vehicle_info->per_installment_amount}}</td>
			                		<td>{{$data->agreement_value_lst}}</td>
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