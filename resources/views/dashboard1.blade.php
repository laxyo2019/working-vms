@extends('state.main') @section('content')
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
		        <div class="info">
		          <h4><b><i>vehicle details</i></b></h4>
		          <p><b>{{$vch_count}}</b></p>
		        </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#vehicle_modal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
		        <div class="info">
		          <h4><b><i>PUC Details</i></b></h4>
		          <p><b>{{$puccount}}</b></p>
		        </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#puc_modal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
		        <div class="info">
		          <h4><b><i>rc details</i></b></h4>
		          <p><b>{{$rccount}}</b></p>
		        </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#rc_modal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-car fa-3x"></i>
		        <div class="info">
		          <h4><b><i>insurance details</i></b></h4>
		          <p><b>{{$inscount}}</b></p>
		        </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#insurance_modal"></button>
		      </div>
		    </div>
	        <div class="col-md-3 col-lg-3">
	          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
	            <div class="info">
	              <h4><b><i>fitness Details</i></b></h4>
	              <p><b>{{$fitnesscount}}</b></p>
	            </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#fitness_modal"></button>
	          </div>
	        </div>
	        <div class="col-md-3 col-lg-3">
	          <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
	            <div class="info">
	              <h4><b><i>roadtax details</i></b></h4>
	              <p><b>{{$roadcount}}</b></p>
	            </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#roadtax_modal"></button>
	          </div>
	        </div>
	        <div class="col-md-3 col-lg-3">
	          <div class="widget-small warning coloured-icon"><i class="icon fa fa-car fa-3x"></i>
	            <div class="info">
	              <h4><b><i>permit details</i></b></h4>
	              <p><b>{{$permitcount}}</b></p>
	            </div>
	            <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#permit_modal"></button>
	          </div>
	        </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small danger coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Drivers details</i></b></h4>
		          <p><b>{{$driver_count}}</b></p>
		        </div>
              <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#driver_modal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Incomes</i></b></h4>
		          <p><b>50000</b></p>
		        </div>
		          <a class="icon fa fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>12</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Expences</i></b></h4>
		          <p><b>{{$expenses}}</b></p>
		        </div>
		          <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#permit_modal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small danger coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
		        <div class="info">
		          <h4><b><i>vehicle finance details</i></b></h4>
		          {{-- <p><b>{{$driver_count}}</b></p> --}}
		        </div>
              <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#permit_modal"></button>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
	          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
	            <div class="info">
	              <h4><b><i>vehicle trip Details</i></b></h4>
	              {{-- <p><b>{{$user}}</b></p> --}}
	            </div>
              <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#permit_modal"></button>
	          </div>
	        </div>
	        <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>vehicles accident details</i></b></h4>
		          <p><b>{{$acicount}}</b></p>
		        </div>
              <button type="button" class="btn btn-info btn-lg icon fa fa-eye fa-3x btn" data-toggle="modal" data-target="#accident_modal"></button>
		      </div>
		    </div>
		</div>
	</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 208px;">
            <div class="modal-header">
                <h3><b>Please Select Any One..</b></h3>
            </div>
            <div class="modal-body">
                <table id="account_table">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>fleets</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $count = 0;
                    foreach($data['fleet_id'] as $fleet){
                       $fleet_name = App\Fleet::find($fleet->fleet_id);  

                 ?>
                            <tr>
                                <td>{{ ++$count }}</td>
                                <td>{{ $fleet_name->fleet_code }}</td>
                                <td>
                                    <input type="radio" name="select_fleet" class="select_fleet" value="{{ $fleet_name->fleet_code }}">
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <input disabled="true" type="submit" class="btn btn-primary" value="Submit" id="submit">
            </div>
        </div>
    </div>
</div>

<!-- Modal For All Vehicle -->

<div class="modal fade" id="vehicle_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
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
			          {{-- <p><b>{{$running}}</b></p> --}}
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="running"></button>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck "></i>
			        <div class="info">
			          <h4><b>Stand By Vehicles</b></h4>
			          {{-- <p><b>{{$standby}}</b></p> --}}
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="standby"></button>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small warning coloured-icon"><i class="icon fa fa-wrench "></i>
			        <div class="info">
			          <h4><b>Repair & maintenence Vehicles</b></h4>
			          {{-- <p><b>{{$repair}}</b></p> --}}
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="repair"></button>
			      </div>
			    </div>
			    <div class="col-md-2 col-lg-3">
			      <div class="widget-small primary coloured-icon"><i class="icon fa fa-truck"></i>
			        <div class="info">
			          <h4><b>Ready For Load Vehicles</b></h4>
			          {{-- <p><b>{{$unloaded}}</b></p> --}}
			        </div>
			        <button type="button" class="btn btn-info btn-lg icon fa fa-eye " id="ready"></button>
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

<!-- Modal For PUC Details -->

<div class="modal fade" id="puc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">PUC DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="puc">
        	<thead>
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>PUC NO</th>
        			<th>PUC AMOUNT</th>
        			<th>VALID TILL</th>
        		</tr>
        	</thead>
        	<tbody>
        	 @php $count =1; @endphp
        	  @foreach($PUCDetails as $puc)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$puc->vehicle ? $puc->vehicle->vch_no : '' }}</td>
        			<td>{{$puc->puc_no ? $puc->puc_no : 'NO RECORD'}}</td>
        			<td>{{$puc->puc_amt ? $puc->puc_amt : 'NO RECORD'}}</td>
        			<td>{{$puc->valid_till ? $puc->valid_till : 'NO RECORD'}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For RC Details -->

<div class="modal fade" id="rc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">RC DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="rc">
        	<thead>
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>RC NO</th>
        			<th>RC AMOUNT</th>
        			<th>VALID TILL</th>
        		</tr>
        	</thead>
        	<tbody>
        	 @php $count =1; @endphp
        	  @foreach($rcdetails as $rc)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$rc->vehicle ? $rc->vehicle->vch_no : '' }}</td>
        			<td>{{$rc->rc_no ? $rc->rc_no : 'NO RECORD'}}</td>
        			<td>{{$rc->rc_amt ? $rc->rc_amt : 'NO RECORD'}}</td>
        			<td>{{$rc->valid_till ? $rc->valid_till : 'NO RECORD'}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For FITNESS Details -->

<div class="modal fade" id="fitness_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">FITNESS DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="fitness">
        	<thead>
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>FITNESS NO</th>
        			<th>FITNESS AMOUNT</th>
        			<th>VALID TILL</th>
        		</tr>
        	</thead>
        	<tbody>
        	 @php $count =1; @endphp
        	  @foreach($fitnessetails as $fitness)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$fitness->vehicle ? $fitness->vehicle->vch_no : '' }}</td>
        			<td>{{$fitness->fitness_no ? $fitness->fitness_no : 'NO RECORD'}}</td>
        			<td>{{$fitness->fitness_amt ? $fitness->fitness_amt : 'NO RECORD'}}</td>
        			<td>{{$fitness->valid_till ? $fitness->valid_till : 'NO RECORD'}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For INSURANCE Details -->

<div class="modal fade" id="insurance_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INSURANCE DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="insurance" class="table-responsive">
        	<thead>
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>INSURANCE NO</th>
        			<th>INSURANCE AMOUNT</th>
        			<th>VALID TILL</th>
        		</tr>
        	</thead>
        	<tbody>
        	 @php $count =1; @endphp
        	  @foreach($insurance as $ins)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$ins->vehicle ? $ins->vehicle->vch_no : '' }}</td>
        			<td>{{$ins->ins_policy_no ? $ins->ins_policy_no : 'NO RECORD'}}</td>
        			<td>{{$ins->ins_total_amt ? $ins->ins_total_amt : 'NO RECORD'}}</td>
        			<td>{{$ins->valid_till ? $ins->valid_till : 'NO RECORD'}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For ROADTAX Details -->

<div class="modal fade" id="roadtax_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ROADTAX DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="roadtax" class="table-responsive">
        	<thead>
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>ROADTAX NO</th>
        			<th>ROADTAX AMOUNT</th>
        			<th>VALID TILL</th>
        		</tr>
        	</thead>
        	<tbody>
        	 @php $count =1; @endphp
        	  @foreach($roadtax as $tax)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$tax->vehicle ? $tax->vehicle->vch_no : '' }}</td>
        			<td>{{$tax->roadtax_no ? $tax->roadtax_no : 'NO RECORD'}}</td>
        			<td>{{$tax->roadtax_amt ? $tax->roadtax_amt : 'NO RECORD'}}</td>
        			<td>{{$tax->valid_till ? $tax->valid_till : ($tax->expire_time ? $tax->expire_time : 'NO RECORD')}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For PERMIT Details -->

<div class="modal fade" id="permit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">PERMIT DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="permit" class="table-responsive">
        	<thead>
        		<tr>
        			<th>SR NO.</th>
        			<th>VEHICLE NO</th>
        			<th>PERMIT NO</th>
        			<th>PERMIT AMOUNT</th>
        			<th>VALID TILL</th>
        		</tr>
        	</thead>
        	<tbody>
        	 @php $count =1; @endphp
        	  @foreach($permit as $permit)
        		<tr>
        			<td>{{$count++}}</td>
        			<td>{{$permit->vehicle ? $permit->vehicle->vch_no : '' }}</td>
        			<td>{{$permit->permit_no ? $permit->permit_no : 'NO RECORD'}}</td>
        			<td>{{$permit->permit_amt ? $permit->permit_amt : 'NO RECORD'}}</td>
        			<td>{{$permit->valid_till ? $permit->valid_till : 'NO RECORD'}}</td>
        		</tr>
        	  @endforeach
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For Driver Details -->

<div class="modal fade" id="driver_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">DRIVER DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="driver" class="table-responsive">
          <thead>
            <tr >
              <th style="width: 60px;">SR. NO</th>
               <th style="width: 61px;">IMAGE</th>
              <th style="width: 120px;">DRIVER NAME</th>
              <th style="width: 120px;">VEHICLE NUMBER</th>
              <th style="width: 100px;">LICENCE NUMBER</th>
              <th style="width: 100px;">PHONE NUMBER</th>
              <th style="width: 100px;">SALARY</th>
               <th style="width: 61px;">ACTION</th>
            </tr>
          </thead>
          <tbody>
              <?php $count = 0; ?>
                @foreach($driver as $drivers)      
                <tr>
                  <td style="width: 60px;">{{++$count}}</td>
                  <td style="width:100px; text-align:center;">
                    <img src="{{asset("storage/$drivers->fleet_code/vehicle_driver/$drivers->image")}}" width="60" height="50" class="zoom img-circle">
                  </td>
                  <td style="width: 120px;">{{$drivers->name}}</td>
                  <td style="width: 120px;">{{$drivers->vehicles->vch_no}}</td>
                  <td style="width: 100px;">{{$drivers->license_no}}</td>
                  <td style="width: 100px;">{{$drivers->phone}}</td>
                  <td style="width: 100px;">{{$drivers->salary}}</td>
                  <td style="width: 100px; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('driver.edit',$drivers->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 8px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('driverdelete',$drivers->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For Accident Details -->

<div class="modal fade" id="accident_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal  content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ACCIDENT DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table  id="accident" class="table-responsive">
          <thead>
            <tr >
              <th style="width: 100px;">SR. NO</th>
              <th style="width: 100px;">IMAGE</th>
              <th style="width: 100px;">VEHICLE NO</th>
              <th style="width: 100px;">ACCIDENT DATE</th>
              <th style="width: 100px;">ACCIDENT CITY</th>
              <th style="width: 100px;">TOTAL DAMAGE</th>
              <th style="width: 100px;">TOTAL CLAIM</th>
              <th style="width: 100px;">NET DAMAGE</th>
              <th style="width: 100px;">DRIVER NAME</th>
               <th style="width: 61px;">ACTION</th>
            </tr>
          </thead>
          <tbody>
            @php $count = 0 ; @endphp
            @foreach($Accident as $accident)
            <tr>
              <td>{{++$count}}</td>
              <td style="width: 100px;" ><img  style=" height: 50px;width: 50px;transition: transform .4s;" src="{{asset("storage/$accident->fleet_code/Accident/$accident->doc_file")}}" class="zoom img-circle"></td>
              <td>{{$accident->vehicle ? $accident->vehicle->vch_no : ''}}</td>
              <td>{{$accident->accident_date ? $accident->accident_date : ''}}</td>
              <td>{{$accident->city ? $accident->city->city_name : ''}}</td>
              <td>{{$accident->total_damage ? $accident->total_damage : ''}}</td>
              <td>{{$accident->total_claim_amount ? $accident->total_claim_amount : ''}}</td>
              <td>{{$accident->net_damage ? $accident->net_damage : '' }}</td>
              <td>{{$accident->driver_name ? $accident->driver_name : '' }}</td>
              <td>
                <a style="padding: 2px 5px;" href="{{route('accident_entry.edit',$accident->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('accident_entry_delete',$accident->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>
<input type="hidden"  id='fleet' name='fleet' value="{{ session('fleet_code') ?? $data['fleet'] }}">

<script type="text/javascript">
    $(document).ready(function() {
        $('#account_table').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": false
        });
   
        $('#puc').DataTable();
        $('#rc').DataTable();
        $('#fitness').DataTable();
        $('#roadtax').DataTable();
        $('#permit').DataTable();
        $('#insurance').DataTable();
        $('#driver').DataTable();
        $('#accident').DataTable();
    })
    $(document).ready(function() {

        var fleet = $('#fleet').val();
        if (fleet == 'yes') {
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    })

    $(document).on('click', '#submit', function(event) {
        event.preventDefault();
        var fleet_code = $("input:radio.select_fleet:checked").val();
        $.ajax({
            url: '/fleet_ckeck',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                fleet_code: fleet_code
            },
            success: function(data) {
                if (data == 'success') {
                    $('#myModal').modal('hide');
                    location.reload(); // for reload page
                }
            }
        })
    });

    $(document).on('click', 'input[name="select_fleet"]', function() {
        if ($(this).is(':checked')) {
            $('#submit').attr('disabled', false)
        } else {
            alert("not checked");
        }
    });
</script>
<style type="text/css">
 
.zoom:hover {
  -ms-transform: scale(6.5); /* IE 9 */
  -webkit-transform: scale(6.5); /* Safari 3-8 */
  transform: scale(6.5); 
}
</style>
@endsection