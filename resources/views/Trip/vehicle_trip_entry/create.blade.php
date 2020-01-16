@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
	        <div class="box-title">
	            <div class="col-sm-6 col-md-6">
	                <h3>ACCIDENT DETAILS </h3>

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
					                            <option value="0" selected=" true " >Select..</option>
					                        </select>
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
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Ending Date</label>
			                                <input id="starting_date" class="form-control datepicker" readonly="true" name="starting_date" value="{{old('starting_date') ? old('starting_date') : ''}}" >
			                                @error('starting_date')
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
			                        <div class=row>
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
		                            </div>      
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
   $(document).on('keyup','#total_damage , #total_claim_amount',function(){
	  var total_damage    = $('#total_damage').val();
	  var total_claim_amount    = $('#total_claim_amount').val();
	  var total = total_damage - total_claim_amount;
	  if(total !==''){
	    $('#net_damage').val(total);
	    	
	    } ;
	 
	})
   $(document).on('keyup','#total_damage , #total_claim_amount',function(){
	  var total_damage    = $('#total_damage').val();
	  var total_claim_amount    = $('#total_claim_amount').val();
	  var total = total_damage - total_claim_amount;
	  if(total !==''){
	    $('#net_damage').val(total);
	    	
	    } ;
	 
	})

    $('#paid_date').on('change',function(){
    	var claim_date    = $('#claim_date').val();
    	var paid_date    = $('#paid_date').val();
    	if(claim_date === "")
    	{
    		alert('Please Select Claim Date First');
    	}
   	var date1 = new Date(claim_date);
	var date2 = new Date(paid_date);
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
    	 $(".image").change(function () {
        var img_id = $(this).attr('id');
        filePreview(this,img_id);
    	});

    	function filePreview(input,img_id) {

		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#'+img_id+' + img').remove();
		            $('.'+img_id).html('<img src="'+e.target.result+'" width="100" height="100"/>');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
    })	 

</script>
@endsection