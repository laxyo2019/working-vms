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
	                <a class="btn btn-inverse pull-right" href="{{route('Trip.index')}}">Back</a>
	            </div>
	            <div id="add-city-form">
		            <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('Trip.store')}}">
		              {{csrf_field()}}
		                <div class="card-body " >
		                    <div class="row">
		                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
		                        	<div class="row">
						                <div class="col-md-6 col-xl-6 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="">Vehicle NO</label>		                    
					                       <select id='vch_id' name="vch_id" class="selectpicker form-control">
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
					                        @error('vch_id')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ 'Please select vehicle number' }}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-6 col-xl-6 mt-2">
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
				                    </div>
			                        <div class="row after-add-more">
		                        		<div class="col-md-6 col-xl-6 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_from_state">Starting Trip From(State)</label>
					                       <select id='trip_from_state' name="trip_from_state" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                            @foreach($state as $state1)
					                            	<option value="{{$state1->id}}">{{$state1->state_name}}</option>
					                            @endforeach
					                         </select>  
					                        @error('trip_from_state')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-6 col-xl-6 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_from_city">Starting Trip From(City)</label><span style="font-size:10px;"><button type="button" class="btn btn-success fa fa-plus" id="add_destination" style="margin-left: 310px;"></button></span>		                    		                    
					                       <select id='trip_from_city' name="trip_from_city" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                         </select>  
					                        @error('trip_from_city')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message}}</strong>
					                              </span>
					                          @enderror
						                </div>
						            </div>
						            <div id="field">
						            	
						            </div>
						            <div class="row">
						                <div class="col-md-6 col-xl-6 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_to_state">Ending Trip To(State)</label>		                    
					                       <select id='trip_to_state' name="trip_to_state" class="selectpicker form-control">
					                            <option value="0">Select..</option>
					                          @foreach($state as $state2)
					                              <option value="{{$state2->id}}">{{$state2->state_name}}</option>
					                            @endforeach
					                         </select>  
					                        @error('trip_to_state')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                          @enderror
						                </div>
						                <div class="col-md-6 col-xl-6 mt-2">
						                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="trip_to_city">Ending Trip To(City)</label>		                    
					                       <select id='trip_to_city' name="trip_to_city" class="selectpicker form-control">
					                            <option value="0" selected=" true " >Select..</option>
					                         </select>  
					                        @error('trip_to_city')
					                              <span class="invalid-feedback d-block pull-right" role="alert">
					                                  <strong>{{ $message}}</strong>
					                              </span>
					                          @enderror
						                </div>
						            </div>
						            <div class="row">
						                <div class="col-md-6 col-xl-6 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No."> Starting Date </label>
			                                <input id="starting_date" class="form-control "  name="starting_date" value="{{old('starting_date') ? old('starting_date') : ''}}"  type="text">
			                                @error('starting_date')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message}}</strong>
				                              </span>
					                        @enderror
			                            </div>
			                            <div class="col-md-6 col-xl-6 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="ending_date">Ending Date</label>
			                                <input id="ending_date" class="form-control "  name="ending_date" value="{{old('ending_date') ? old('ending_date') : ''}}" type="text">
			                                @error('ending_date')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message}}</strong>
				                              </span>
					                        @enderror
			                            </div>
						                
			                            <div class="col-md-6 col-xl-6 mt-2">
			                               <label for="Vehicle No.">Trip Amount</label>
			                                <input id="trip_amt" class="form-control"  name="trip_amt" value="{{old('trip_amt') ? old('trip_amt') : ''}}" > 
			                                @error('trip_amt')
				                              <span class="invalid-feedback d-block pull-right" role="alert">
				                                  <strong>{{ $message }}</strong>
				                              </span>
					                         @enderror		                                 
				                        </div>
				                        <div class="col-md-3 col-xl-3 mt-2">
			                               <span style="color: #FF0000;font-size:15px;">*</span><label for="payment_status">Payment Status</label>	 

			                               <select id="vch_id" name="payment_status" class="selectpicker form-control">
		                                  <option value="0" readonly="true">Select Payment Status..</option>
		                                  <option value="paid">PAID</option>
		                                  <option value="pending">PENDING</option>
		                                    </select> 
			                                @error('payment_status')
					                            <span class="invalid-feedback d-block pull-right" role="alert">
					                               <strong>{{ 'Please Select Payment Status' }}</strong>
					                            </span>
					                         @enderror  
				                        </div>
				                        <div class="col-md-3 col-xl-3 mt-2">
						                    <label class="">Payment mode</label>
						                      
					                       <select id="type" name="payment_mode" class=" form-control">
					                            <option  value="0">Mode</option>
					                            <option {{ old('payment_mode') == 'cash' ? 'selected':''}} value="cash">Cash</option>
												<option {{ old('payment_mode') == 'cheque' ? 'selected':''}} value="cheque">Cheque</option>
												<option {{ old('payment_mode') == 'credit' ? 'selected':''}} value="credit">Credit</option>
												<option {{ old('payment_mode') == 'dd' ? 'selected':''}} value="dd">DD</option>
												<option {{ old('payment_mode') == 'rtgs' ? 'selected':''}} value="rtgs">RTGS</option>
												<option {{ old('payment_mode') == 'neft' ? 'selected':''}} value="neft">NEFT</option>  
					                        </select>
					                        @error('payment_mode')
					                              <span class="invalid-feedback d-block " role="alert">
					                                  <strong>{{ 'Please Select payment mode' }}</strong>
					                              </span>
					                          @enderror
						                </div>
						            </div>	
						            <div style="display: none" class="row cheque">
					                	<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cheque No.</label>
			                               
		                               		 <input id="cheque_no" class="form-control  " name="cpay_no" value="{{old('pay_no')}}">
		                               		  @error('cpay_no')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ "Please enter cheque number" }}</strong>
					                            </span>
					                         @enderror
		                                </div>
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cheque Date</label>
			                               
		                               		 <input id="email1" class="form-control datepicker"  readonly="true" name="cpay_dt" value="{{old('pay_dt')}}">
		                               		  @error('cpay_dt')
					                         <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ "Please enter cheque date" }}</strong>
					                            </span>
					                         @enderror
		                               
		                           		 </div>
		                           		
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
			                               
		                               		 <input id="email1" class="form-control  " name="cpay_bank" value="{{old('pay_bank')}}">
		                               		  @error('cpay_bank')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter bank name' }}</strong>
					                            </span>
					                         @enderror
		                               
		                           		 </div>
		                           		 <div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name </label>
			                               
		                               		 <input id="email1" class="form-control  " name="cpay_branch" value="{{old('pay_branch')}}">
		                               		  @error('cpay_branch')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter bank branch' }}</strong>
					                            </span>
					                         @enderror
		                               
		                           		 </div>
		                           	</div>

		                           	<div style="display: none" class="row dd">
					                	<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">DD No</label>
			                               
		                               		 <input id="email1" class="form-control  " name="dpay_no" value="{{old('pay_no')}}">
		                               		  @error('dpay_no')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter DD number' }}</strong>
					                            </span>
					                         @enderror
		                                </div>
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">DD Date</label>
			                               
		                               		 <input id="email1" class="form-control datepicker"  readonly="true"name="dpay_dt" value="{{old('pay_dt')}}">
		                               		  @error('dpay_dt')
					                         <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter DD date' }}</strong>
					                            </span>
					                         @enderror
		                               
		                           		 </div>
		                           		
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
			                                
		                               		 <input id="email1" class="form-control  " name="dpay_bank" value="{{old('pay_bank')}}">
		                               		 @error('dpay_bank')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter bank name' }}</strong>
					                            </span>
					                         @enderror
		                               
		                           		 </div>
		                           		 <div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
			                               
		                               		 <input id="email1" class="form-control  " name="dpay_branch" value="{{old('pay_branch')}}">
		                               		  @error('dpay_branch')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter bank branch' }}</strong>
					                            </span>
					                         @enderror
		                               
		                           		 </div>

		                           	</div>

		                           	<div style="display: none" class="row rtgs">
					                	<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">RTGS No.</label>
			                                @error('rpay_no')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter RTGS number' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control  " name="rpay_no" value="{{old('rpay_no')}}">
		                                </div>
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">RTGS Date</label>
			                                @error('rpay_dt')
					                         <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter RTGS date' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control datepicker"n readonly="true"ame="rpay_dt" value="{{old('pay_dt')}}">
		                               
		                           		 </div>
		                           		
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name </label>
			                                @error('rpay_bank')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter bank name' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control  " name="rpay_bank" value="{{old('rpay_bank')}}">
		                               
		                           		 </div>
		                           		 <div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
			                                @error('rpay_branch')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter branch name' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control  " name="rpay_branch" value="{{old('rpay_branch')}}">
		                               
		                           		 </div>
		                           	</div>

		                           	<div style="display: none" class="row neft">
					                	<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">NEFT No.</label>
			                                @error('npay_no')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter NEFT number' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control  " name="npay_no" value="{{old('npay_no')}}">
		                                </div>
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">NEFT Date</label>
			                                @error('npay_dt')
					                         <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter NEFT date' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control datepicker" readonly="true" name="npay_dt" value="{{old('npay_dt')}}">
		                               
		                           		 </div>
		                           		
		                           		<div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
			                                @error('npay_bank')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter bank name' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control  " name="npay_bank" value="{{old('npay_bank')}}">
		                               
		                           		 </div>
		                           		 <div class="col-md-3 col-xl-3 mt-2">
		                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
			                                @error('npay_branch')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ 'Please enter branch name' }}</strong>
					                            </span>
					                         @enderror
		                               		 <input id="email1" class="form-control  " name="npay_branch" value="{{old('npay_branch')}}">
		                               
		                           		 </div>
		                           	</div>
						            <div class="row">
				                        <div class="col-md-12 col-xl-12 mt-2">
				                          <div class="col-md-2 col-xl-2 mt-4">
			                               <label for="trip_period">Trip Period :</label>
			                              </div>
			                              <div class="col-md-2 col-xl-2 mt-2">
			                                <input id="years" class="form-control" readonly="true" name="years" value="{{old('years') ? old('years') : ''}}" ><span><b><i><center>YEARS</center></i></b></span>		
					                      </div>
					                      <div class="col-md-2 col-xl-2 mt-2">
			                                <input id="months" class="form-control" readonly="true" name="months" value="{{old('months') ? old('months') : ''}}" ><span><b><i><center>MONTHS</center></i></b></span>		
					                      </div>
					                      <div class="col-md-2 col-xl-2 mt-2">
			                                <input id="days" class="form-control" readonly="true" name="days" value="{{old('days') ? old('days') : ''}}" ><span><b><i><center>DAYS</center></i></b></span>		
					                      </div> 
					                      <div class="col-md-2 col-xl-2 mt-4">
			                               <label for="Vehicle No.">Current Status : </label>
			                              </div> 
					                      <div class="col-md-2 col-xl-2 mt-4">
			                                <label id="status"></label>
					                      </div>                               
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
    	 	$('#starting_date').datetimepicker({
			    format: "YYYY-MM-DD H:m:s",
			    icons: {
                    time: "fa fa-clock-o text-primary",
                    date: "fa fa-calendar text-primary",
                    up: "fa fa-arrow-up text-primary",
                    down: "fa fa-arrow-down text-primary"
                }
			});
        	$('#ending_date').datetimepicker({
			    format: "YYYY-MM-DD H:m:s",
			    icons: {
                    time: "fa fa-clock-o text-primary",
                    date: "fa fa-calendar text-primary",
                    up: "fa fa-arrow-up text-primary",
                    down: "fa fa-arrow-down text-primary"
                }
			}).on('dp.change', function (e) { 
				var starting_date  = $('#starting_date').val();
		    	var ending_date    = $('#ending_date').val();
		    	if(starting_date === "")
		    	{
		    		alert('Please Select Starting Date First');
		    	}
		   	var date1 = new Date(starting_date);
			var date2 = new Date(ending_date);
			var diff = new Date(date2.getTime() - date1.getTime());
			var year = diff.getUTCFullYear() - 1970 ;
			var month= diff.getUTCMonth();
			var days = diff.getUTCDate() -1;
			if(year !==''){
			    $('#years').val(year);	
			   } ;
			if(month !==''){
			    $('#months').val(month);	
			   } ;
			if(days !==''){
			    $('#days').val(days);	
			   } ; 
		});
	});
    	 var x =1;
	$('#add_destination').on('click',function(){
    	// var id =$(".multi_rows").attr('id');
			                
		$('#field').append('<div class="multi_rows row" id="'+x+'"><div class="col-md-6 col-xl-6 mt-2"><label>Trip To(State)</label><select name="trip_to_state_list[]" class="selectpicker form-control add_state"><option value="">Select State</option><?php foreach($state as $st){?><option value="{{$st->id}}">{{$st->state_name}}</option> <?php } ?></select></div><div class="col-md-6 col-xl-6 mt-2"><label>Trip To(City)</label><span style="font-size:10px;"><a class="remove_button btn btn-danger fa fa-minus" style="margin-left:382px;" data-id="'+x+'"></a></span><select name="trip_to_city_list[]" class="selectpicker form-control " id="add_city'+x+'"><option value="0">Select..</option></select></div></div>');
		// $('.multi_rows').attr('id',x)
	    // $('.remove_button').attr('data-id',x)
	    x++;
	});
$(document).on("click",".remove_button",function(){ 
	 	var id = $(this).attr('data-id');
	        $(this).parent('div').remove();
	        $('#'+id).remove();        
	        // x--;
    });

    $('#type').on('change',function(){
    	var type = $(this).val();
    	if(type == 'cheque'){
    		$('.cheque').show();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();
    		$('#cheque_no').on('keyup',function(){
    			var chk = $(this).val();
    			if($.isNumeric(chk)){

    			}
    		})

    	}
    	else if(type == 'dd'){
    		$('.cheque').hide();
    		$('.dd').show();
    		$('.rtgs').hide();
    		$('.neft').hide();
    	}

    	else if(type == 'rtgs'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').show();
    		$('.neft').hide();
    	}

    	else if(type == 'neft'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').show();
    	}
    	else if( (type == 'cash') || (type == 'credit') || (type="") ){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();	
    	}

    })

    	var type = "{{old('payment_mode')}}"
    	if(type == 'cheque'){
    		$('.cheque').show();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();
      	}

    	else if(type == 'dd'){
    		$('.cheque').hide();
    		$('.dd').show();
    		$('.rtgs').hide();
    		$('.neft').hide();
    	}

    	else if(type == 'rtgs'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').show();
    		$('.neft').hide();
    	}

    	else if(type == 'neft'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').show();
    	}
    	else if( (type == 'cash') || (type == 'credit') || (type="0") ){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();	
    	}
});



$(document).on('change','.add_state',function(){
	var state_id = $(this).val();
	var parent = $(this).parent().parent().attr('id');
	var city_id = "add_city"+parent;
	
	city_fetch(state_id,city_id)
});
	
    $('#trip_from_state').on('change',function(){
        var state_id = $(this).val();
	    var city_id = 'trip_from_city';
		city_fetch(state_id,city_id)

       })
    $('#trip_to_state').on('change',function(){
    	var state_id = $(this).val();
	    var city_id = 'trip_to_city';
		city_fetch(state_id,city_id)

       
       })
    $('#vch_id').on('change',function(){
    	var vch_id =$(this).val();
    	$.ajax({
                url: "/vch_status_get",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':vch_id},
                success: function (data) {
                console.log(data.status)
                	$("#status").html(data.status);
                }
            })
    })
    function city_fetch(state_id,city_id){
    	var city = "#"+city_id; 
    	console.log(city);
		$.ajax({
		    url: "/drivercity",
		    type: 'POST',
		    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		    data: {'id':state_id},
		    success: function (data) {
		       $(city).html(data);
		    }
		});
    }
</script>
@endsection
