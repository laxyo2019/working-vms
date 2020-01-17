@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
	        <div class="box-title">
	            <div class="col-sm-6 col-md-6">
	                <h3>VEHICLE TRIP DETAILS </h3>

	            </div>
	            <div class="col-sm-6 col-md-6">
	                <a class="btn btn-inverse pull-right" href="{{route('accident_entry.index')}}">Back</a>
	            </div>
	            <div id="add-city-form">
		            <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('accident_entry.store')}}">
		              {{csrf_field()}}
		                <div class="card-body " >
		                    <div class="row">
		                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
		                        	<div class="row">
						                <div class="col-md-4 col-xl-4 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="">Vehicle NO</label>		                    
					                       <select id='vehicle_no' name="vehicle_no" class="selectpicker form-control">
					                            <option value="0">Select..</option>
					                            @foreach($vehicles as $vehicle)
					                            	<option value="{{$vehicle->vehicle->id}}" style="font-family: cursive;" > 
					                            		@if($vehicle->vehicle) 
					                            		{{ $vehicle->vehicle->vch_no }}	
					                            		@else
					                            			<span>No Vehicle Available</span>
					                            		@endif
					                            	</option>
					                            @endforeach
					                        </select>
					                        {{-- {{$vehicle->vehicle ? ($vehicle->vehicle->vch_no. $vehicle->status) : 'No Vehicle Available'}} --}}
					                        @error('vehicle_no')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ 'Please select vehicle number' }}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-4 col-xl-4 mt-2">
			                               <label for="driver_name">Driver Name</label>
			                                <select id='driver_name' name="driver_name" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                            @foreach($drivers as $driver)
					                            	<option value="{{$driver->name}}">{{$driver->name}}</option>
					                            @endforeach
					                        </select>
			                                @error('driver_name')
					                            <span class="invalid-feedback d-block pull-right" role="alert">
					                               <strong>{{ $message }}</strong>
					                            </span>
					                         @enderror
				                                 
				                        </div>
		                        		<div class="col-md-4 col-xl-4 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_from_state">Trip From(State)</label>		                    
					                       <select id='trip_from_state' name="trip_from_state" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                            @foreach($state as $state)
					                            	<option value="{{$state->id}}">{{$state->state_name}}</option>
					                            @endforeach
					                         </select>  
					                        @error('trip_from_state')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-4 col-xl-4 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_from_city">Trip From(City)</label>		                    
					                       <select id='trip_from_city' name="trip_from_city" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                         </select>  
					                        @error('trip_from_city')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message}}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-4 col-xl-4 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_from_state">Trip To(State)</label>		                    
					                       <select id='trip_to_state' name="trip_to_state" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                         </select>  
					                        @error('trip_to_state')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-4 col-xl-4 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_to_city">Trip To(City)</label>		                    
					                       <select id='trip_to_city' name="trip_to_city" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                         </select>  
					                        @error('trip_to_city')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message}}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-4 col-xl-4 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No."> Starting Date </label>
			                                <input id="starting_date" class="form-control datepicker" readonly="true" name="starting_date" value="{{old('starting_date') ? old('starting_date') : ''}}" >
			                                @error('starting_date')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message}}</strong>
				                              </span>
					                        @enderror
			                            </div>
			                            <div class="col-md-4 col-xl-4 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="ending_date">Ending Date</label>
			                                <input id="ending_date" class="form-control datepicker" readonly="true" name="ending_date" value="{{old('ending_date') ? old('ending_date') : ''}}" >
			                                @error('ending_date')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message}}</strong>
				                              </span>
					                        @enderror
			                            </div>
						                
			                            <div class="col-md-4 col-xl-4 mt-2">
			                               <label for="Vehicle No.">Trip Amount</label>
			                                <input id="trip_amt" class="form-control" readonly="true" name="trip_amt" value="{{old('trip_amt') ? old('trip_amt') : ''}}" > 
			                                @error('trip_amt')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message }}</strong>
				                              </span>
					                         @enderror		                                 
				                        </div>
				                        <div class="col-md-8 col-xl-8 mt-2">
				                          <div class="col-md-2 col-xl-2 mt-2">
			                               <label for="trip_period">Trip Period</label>
			                              </div>
			                              <div class="col-md-2 col-xl-2 mt-2">
			                                <input id="years" class="form-control" readonly="true" name="years" value="{{old('years') ? old('years') : ''}}" ><span><b><i>YEARS</i></b></span>		
					                      </div>
					                      <div class="col-md-2 col-xl-2 mt-2">
			                                <input id="months" class="form-control" readonly="true" name="months" value="{{old('months') ? old('months') : ''}}" ><span><b><i>MONTHS</i></b></span>		
					                      </div>
					                      <div class="col-md-2 col-xl-2 mt-2">
			                                <input id="days" class="form-control" readonly="true" name="days" value="{{old('days') ? old('days') : ''}}" ><span><b><i>DAYS</i></b></span>		
					                      </div>                                 
				                        </div>
				                        <div class="col-md-12 col-xl-12 mt-2">
				                          <div class="col-md-1 col-xl-1">
			                               <label for="Vehicle No.">Current Status : </label>
			                              </div>
			                               <div class="col-md-2 col-xl-2">
			                                <input type="radio"  value="Running"  name="status"><span><b>&nbsp&nbsp Running &nbsp</b></span>
			                               </div>
			                               <div class="col-md-3 col-xl-3">
			                                <input type="radio"  value="StandBy"  name="status"><span><b>&nbsp&nbsp StandBy &nbsp</b></span>
			                               </div>
			                               <div class="col-md-3 col-xl-3">
			                                <input type="radio"  value="ReadyForLoad"  name="status"><span><b>&nbsp&nbsp ReadyForLoad &nbsp</b></span>
			                               </div>
			                               <div class="col-md-3 col-xl-3">
			                                <input type="radio"  value="Repair/Maintenance"  name="status"><span><b>&nbsp&nbsp Repair/Maintenance &nbsp</b></span>
			                                </div>
			                                @error('status')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message }}</strong>
				                              </span>
					                         @enderror		                                 
				                        </div>
				                    </div>  
				                    <div class="row">    
				                        <div class="col-md-12 col-xl-12 mt-2">
			                                <label for="Vehicle No.">Remarks</label>
			                                
			                                <textarea id="remarks" class="form-control" name="remarks" value="{{old('remarks')}}" ></textarea> 
			                                @error('remarks')
					                            <span class="invalid-feedback d-block pull-right" role="alert">
					                               <strong>{{ 'Please enter address' }}</strong>
					                            </span>
					                         @enderror
				                                 
				                        </div>
			                        </div>
			                       {{--  <div class=row>
						                <div class="col-md-4 col-xl-4 mt-2">
			                                <label for="IMEI Number">Photo</label><br>
			                                <input type="file" id="image" name="doc_file" value="" class="image">
			                        	</div>
			                        
				                        <div class="col-md-2 col-xl-2 mt-5">
			                                <table class="table">
			                                  <tr>
			                                    <th><center>Accident Image</center></th>
			                                  </tr>
			                                  <tr>
			                                    <td>
			                                      <div  class="image">
			                                      </div>
			                                    </td>
			                                  </tr>
			                                </table>
			                            </div>    
		                            </div> --}}      
			                        <div class="col-md-6" style="margin-top: 24px;">
			                         	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
			                       	</div>
		                    	</div>
		                    </div>
		                </div>
		            </form>
	            </div>
	        </div>
    	</div>
 	  </div>
	</div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    	 $(function() {
        	$( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
     	});






});
    $('#trip_from_state').on('change',function(){
        var state_id = $('#trip_from_state').val();
        $.ajax({
                url: "/drivercity",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':state_id},
                success: function (data) {
                   $('#trip_from_city').html(data);
                }
            })
       })
    $('#trip_to_state').on('change',function(){
        var state_id = $('#trip_to_state').val();
        $.ajax({
                url: "/drivercity",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':state_id},
                success: function (data) {
                   $('#trip_to_city').html(data);
                }
            })
       })
    $('#vehicle_no').on('change',function(){
    	var vch_id =$(this).val();
    	$.ajax({
                url: "/vch_status_get",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':vch_id},
                success: function (data) {
                
                	$("input[name=status][value=" + data.status + "]").prop('checked', true);
                }
            })
    	// console.log(vch_id);
    })
 //   $(document).on('keyup','#total_damage , #total_claim_amount',function(){
	//   var total_damage    = $('#total_damage').val();
	//   var total_claim_amount    = $('#total_claim_amount').val();
	//   var total = total_damage - total_claim_amount;
	//   if(total !==''){
	//     $('#net_damage').val(total);
	    	
	//     } ;
	 
	// })
 //   $(document).on('keyup','#total_damage , #total_claim_amount',function(){
	//   var total_damage    = $('#total_damage').val();
	//   var total_claim_amount    = $('#total_claim_amount').val();
	//   var total = total_damage - total_claim_amount;
	//   if(total !==''){
	//     $('#net_damage').val(total);
	    	
	//     } ;
	 
	// })

    $('#ending_date').on('change',function(){
    	var starting_date    = $('#starting_date').val();
    	var ending_date    = $('#ending_date').val();
    	if(starting_date === "")
    	{
    		alert('Please Select Claim Date First');
    	}
   	var date1 = new Date(starting_date);
	var date2 = new Date(ending_date);
	var diff = new Date(date2.getTime() - date1.getTime());
	var year = diff.getUTCFullYear() - 1970 ;
	var month= diff.getUTCMonth();
	var days = diff.getUTCDate() - 1;
	if(year !==''){
	    $('#years').val(year);	
	   } ;
	if(month !==''){
	    $('#months').val(month);	
	   } ;
	if(days !==''){
	    $('#days').val(days);	
	   } ;
	 
	})
</script>
@endsection