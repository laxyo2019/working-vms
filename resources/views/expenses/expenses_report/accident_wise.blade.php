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
			      	<table id="myTable">
              <thead>
              	<tr colspan="7">
	          		<div class="card" >
					  <div class="card-body">
					    <h5 class="card-title">Laxyo Group</h5>
					    <p class="card-text">Indore,Indore,Madhya Pradesh</p>
					    <p class="card-text">PIN No : 452001</p> 
					    <p class="card-text">Phone No :</p> 
					  </div>
					</div>
				</tr>
				<tr>
	          		<th colspan="8">Accident Wise Expense Details as On Date : {{$date}} </th>
	          	</tr>
                <tr >
                  <th style="width: 100px;">IMAGE</th>
                  <th style="width: 100px;">VEHICLE NO</th>
                  <th style="width: 100px;">ACCIDENT DATE</th>
                  <th style="width: 100px;">ACCIDENT CITY</th>
                  <th style="width: 100px;">TOTAL DAMAGE</th>
                  <th style="width: 100px;">TOTAL CLAIM</th>
                  <th style="width: 100px;">NET DAMAGE</th>
                  <th style="width: 100px;">DRIVER NAME</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datas as $accident)
                <tr>
                  <td style="width: 100px;" ><img style=" height: 50px;width: 50px;transition: transform .4s;" src="{{asset("storage/$accident->fleet_code/Accident/$accident->doc_file")}}" class="zoom"></td>
                  <td>{{$accident->vehicle ? $accident->vehicle->vch_no : ''}}</td>
                  <td>{{$accident->accident_date ? $accident->accident_date : ''}}</td>
                  <td>{{$accident->city ? $accident->city->city_name : ''}}</td>
                  <td>{{$accident->total_damage ? $accident->total_damage : ''}}</td>
                  <td>{{$accident->total_claim_amount ? $accident->total_claim_amount : ''}}</td>
                  <td>{{$accident->net_damage ? $accident->net_damage : '' }}</td>
                  <td>{{$accident->driver_name ? $accident->driver_name : '' }}</td>
                </tr>
                @endforeach
                {{-- <tr>
              		<td colspan="2"><h5><b><i>Grand Total &nbsp:</i></b></h5></td>
              		<td><span> - </span></td>
              		<td><span> - </span></td>
              		<td><b>{{$sum}}</b></td>
              		<td><span> - </span></td>
              		<td><b>{{$cost}}</b></td>
              		<td><b>{{$service}}</b></td>
              		<td><b>{{$vat}}</b></td>
              		<td><b>{{$net}}</b></td>
              	</tr> --}}
              </tbody>
            </table>
			              	
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
<style type="text/css">
 
.zoom:hover {
  -ms-transform: scale(6.5); /* IE 9 */
  -webkit-transform: scale(6.5); /* Safari 3-8 */
  transform: scale(6.5); 
}
</style>
@endsection