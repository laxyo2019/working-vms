@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD EXPENSES INFORMATION</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('expanses.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('expanses.store')}}">
              {{csrf_field()}}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	
			                <div class="row">    
		                        <div class="col-md-4 col-xl-4 mt-2">
		                        	<label for="party_type">Expense Type</label><span style="float: right;"><button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#exampleModal" ></button></span>
	                                <select id="party_type"  name="party_type" class="selectpicker form-control">
			                            <option value="">Select..</option>
			                            @foreach($party_types as $party)
			                               <option value="{{$party->expense_type}}">{{$party->expense_type}}</option>
			                            @endforeach     
			                        </select>
	                                @error('party_type')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ $message}}</strong>
			                            </span>
			                         @enderror
	                            </div>	
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="party_name">Party Name </label>
	                                
	                                <select id='party_name' name="party_name" class="selectpicker form-control">
			                            <option value="" selected=" true " >Select..</option> 
			                            @foreach($Party as $party_name)
			                               <option value="{{$party_name->party_name}}">{{$party_name->party_name}}</option>
			                            @endforeach    
			                        </select> 
	                                @error('party_name')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Party name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	

		                        <div class="col-md-4 col-xl-4 mt-2">
	                               <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Vehicle No.</label>	 

	                               <select id="vch_id" name="vch_id" class="selectpicker form-control">
                                  <option value="0">Select Vehicles..</option>
                                  @foreach($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
                                  @endforeach   
                                    </select> 
	                                @error('vehicle_id')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter vehicle number' }}</strong>
			                            </span>
			                         @enderror  
		                        </div>    

                                         
				            </div>
				            <div class="row">
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="current_km">Current Km.</label>
	                                
	                                <input id="current_km" class="form-control" name="current_km" value="{{old('current_km')}}" > 
	                                @error('current_km')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Current Km.' }}</strong>
			                            </span>
			                         @enderror  
		                        </div>   
			                	
					            <div class="col-md-4 col-xl-4 mt-2">
	                                <label>Date</label>  
			                       <input id="expanses_date"  class="form-control datepicker" readonly="true" name="expanses_date" value="{{old('expanses_date')}}">
		                        </div>
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="fuel_rate">Fuel Rate</label>
	                                
	                                <input id="fuel_rate" class="form-control" name="fuel_rate" value="{{old('fuel_rate')}}" type="number"> 
	                                @error('fuel_rate')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Fuel Rate' }}</strong>
			                            </span>
			                         @enderror   
		                        </div>
		                     
	                        </div>

 							<div class="row">     
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <label for="fuel_amt">Fuel Amount</label>
	                                
	                                <input id="fuel_amt" class="form-control" name="fuel_amt" value="{{old('fuel_amt')}}" type="number"> 
	                                @error('fuel_amt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Fuel Amount' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="vch_avg">Vehicle Average</label>                            
	                                <input id="vch_avg" type="email" class="form-control" name="vch_avg" value="{{old('vch_avg')}}" readonly="true"> 
	                                @error('vch_avg')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter party email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="fuel_qty">Fuel Qty (In LTR.)</label>                            
	                                <input id="fuel_qty" type="email" class="form-control" name="fuel_qty" value="{{old('fuel_qty')}}" readonly="true"> 
	                                @error('fuel_qty')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter party email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-4 col-xl-4 mt-2">
				                   <label class="">Next Filling Km.</label>	      
			                       <input id="next_fill" type="email" class="form-control" name="next_fill" value="{{old('next_fill')}}" readonly="true">
			                        @error('next_fill')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                                <strong>{{ 'Please Select state' }}</strong>
			                            </span>
			                        @enderror
					            </div>
					            <div class="col-md-4 col-xl-4 mt-2">
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
		                        <div class="col-md-4 col-xl-4 mt-2">
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
					        <div class="row">
          						<div class="col-md-4 col-xl-4 mt-2">
	                                <label>Expenses Qty.</label>  
			                       <input id="expanses_qty" type="number" class="form-control" name="expanses_qty" value="{{old('expanses_qty')}}">
		                        </div>
		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <label>Expenses Amount</label>  
			                       <input id="expanses_amt" type="number" class="form-control" name="expanses_amt" value="{{old('expanses_amt')}}" >
		                        </div>
		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <label>Expenses Remark</label>  
			                       <input id="expanses_remark" class="form-control" name="expanses_remark" value="{{old('expanses_remark')}}">
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
	                               
                               		 <input id="email1" class="form-control datepicker"  readonly="true"name="cpay_dt" name="pay_dt" value="{{old('pay_dt')}}">
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
	                                <label for="Vehicle No.">Address</label>
	                                
	                                <textarea id="party_add" class="form-control" name="party_add" value="{{old('party_add')}}" ></textarea> 
	                                @error('party_add')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter address' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

	                        </div>
	                        
	                    </div>     
                         <div class="col-md-6" style="margin-top: 24px;">
                         	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
                       	</div>

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{url('/add_expense')}}" method="post">
      		@csrf
        <div class="row">
        	<div class="col-md-12">
        		<input name="expense_type" class="form-control">
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add </button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
        	$( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
     	});
		$('#vch_id').on('change',function(){
        var vch_id = $('#vch_id').val();
        $.ajax({
                url: "{{route('get_vch_avg')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'vch_id':vch_id},
                success: function (data) {
                	console.log(data)
                    $('#vch_avg').val(data);
                }
            })
    	})
		

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
})
$(document).on("keyup",'#fuel_rate , #fuel_amt', function() {
        var fuel_rate = $('#fuel_rate').val();
        var fuel_amt = $('#fuel_amt').val();
        var vch_avg = $('#vch_avg').val();
        var current_km = $('#current_km').val();

        if(fuel_amt != '' && fuel_rate != '')
        {
        	var res = fuel_amt / fuel_rate;
        	var next = res * vch_avg;
        	var next_km = Number(next) + Number(current_km);
        	$('#next_fill').val(next_km.toFixed(2));
        	$('#fuel_qty').val(res.toFixed(2));
        }
	});
</script>
@endsection