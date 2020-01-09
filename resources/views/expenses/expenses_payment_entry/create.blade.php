@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          	<div class="box-title">
	            <div class="col-sm-6 col-md-6">
	                <h3>GENERAL EXPENSE PAYMENT ENTRY DETAILS </h3>

	            </div>
	            <div class="col-sm-6 col-md-6">
	                <a class="btn btn-inverse pull-right" href="{{route('expanses_payment_entry.index')}}">Back</a>
	            </div>
	            <div id="add-city-form">
	            	<form class="well form-horizontal"  id="create_form1" action="{{route('expanses_payment_entry.store')}}" method="post">
	              		{{ csrf_field() }}
	                 	<div class="card-body " >
		                    <div class="row">
		                        <div class="col-sm-12 col-md-12 col-xl-12" >               
		                            <div class='row'>        
		                            	<div class="col-md-4 col-xl-4 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="entry_no">Entry No</label>
			                                <input id="entry_no" name="entry_no" class="form-control" readonly="true" value="{{$no}}">                              
			                            </div>
			                            <div class="col-md-4 col-xl-4 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="entry_date">Entry Date</label>
			                                <input id="entry_date" name="entry_date" class="form-control datepicker" readonly="true" value="{{$date}}">
			                                                                
			                            </div>
		                              <div class="col-md-4 col-xl-4 mt-2">
		                                <span style="color: #FF0000;font-size:15px;">*</span><label for="job_done_by">Job Done By</label>
		                                <select id="job_done_by" name="job_done_by" class=" form-control">
					                            <option  value="0">Select Name...</option>
					                        @foreach($data as $Data)
					                        	<option  value="{{$Data->job_by}}">{{$Data->job_by}}</option>
					                        @endforeach
					                    </select>
			                                @error('job_by')
					                            <span class="invalid-feedback d-block" role="alert">
					                               <strong>{{ $message }}</strong>
					                            </span>
					                         @enderror	                               
		                              </div>
		                            </div>
		                            <div class="row mt-5" >
		                            	<div class="col-md-12">
										  <div class="panel panel-default" style="height: 300px;">
										    <div class="panel-body">
										    	<table class="table-responsive table " id="myTable">
										    		<thead>
										    			<tr>
										    				<th>Bill NO</th>
										    				<th>Bill Date</th>
										    				<th>Vehicle NO</th>
										    				<th>Job Done By</th>
										    				<th>Expense Type</th>
										    				<th>Qty</th>
										    				<th>Rate</th>
										    				<th>Amt</th>
										    				<th>Service Tax</th>
										    				<th>Service Tax Amt</th>
										    				<th>Vat Tax</th>
										    				<th>Vat Tax Amt</th>
										    				<th>Net Amt</th>
										    				<th>Paid Amt</th>
										    				<th>remaining Amt</th>
										    			</tr>
										    		</thead>
										    		<tbody id="data">
										    			
										    		</tbody>
										    	</table>	
										    </div>
										  </div>
									  	</div>
									</div>
		                       		<div class="row" style="" id="tabel">
		                          	  
		                            	<div class="col-md-4 col-xl-4 mt-2">
		                              	 <label class="" for="total_balance_amount">Total Balance Amount</label>
		                              	<input readonly="true" id="total_balance_amount" name='total_balance_amount' class="form-control total" value="">                        
		                              </div>
		                              
		                          	  <div class="col-md-4 col-xl-4 mt-2">
		                            	 <label class="" for="total_paid_amount">Total Paid Amount</label>
		                            	 <input  id="total_paid_amount" readonly="true" name='total_paid_amount' class="form-control total" value="">
		                              </div>
		                          		<div class="col-md-4 col-xl-4 mt-2">
		                              	 	<label class="" for="total_remaining_amount">Total Remaining Amount</label>
		                              		<input readonly="true " id="total_remaining_amount" name='total_remaining_amount' class="form-control  total" value="">                          
		                              	</div>
		                              	<div class="col-md-4 col-xl-4 mt-2">
		                              	 	<label class="" for="paid_by">Paid By</label>
		                              		<input id="paid_by" name='paid_by' class="form-control  total" value=""> 
		                              		@error('remarks')
				                              <span class="invalid-feedback d-block" role="alert">
				                                  <strong>{{"Please Fill The Paid By Field" }}</strong>
				                              </span>
			                             	@enderror                         
		                              	</div>
		                              <div class="col-md-4 col-xl-4 mt-2">
			                              	<label class="">Payment mode</label>
						                      
					                       <select id="type" name="payment_mode" class=" form-control">
					                            <option selected="true" value="0">Mode</option>
					                            <option {{old('payment_mode') =='cash' ? 'selected':'' }} value="case">Cash</option>
												<option {{old('payment_mode') =='cheque' ? 'selected':'' }} value="cheque">Cheque</option>
												<option {{old('payment_mode') =='credit' ? 'selected':'' }} value="credit">Credit</option>
												<option {{old('payment_mode') =='dd' ? 'selected':'' }} value="dd">DD</option>
												<option {{old('payment_mode') =='rtgs' ? 'selected':'' }} value="rtgs">RTGS</option>
												<option {{old('payment_mode') =='neft' ? 'selected':'' }} value="neft">NEFT</option>  
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
			                               
		                               		 <input id="" class="form-control datepicker" readonly="true" name="cpay_dt" name="pay_dt" value="{{old('pay_dt')}}">
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
			                               
		                               		 <input id="" class="form-control datepicker" readonly="true" name="dpay_dt" value="{{old('pay_dt')}}">
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
		                               		 <input id="" class="form-control datepicker  readonly="true"  name="rpay_dt" value="{{old('pay_dt')}}">
		                               
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
			                                @error('nupdate_dt')
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
		                               		 <input id="" class="form-control datepicker" readonly="true" name="npay_dt" value="{{old('npay_dt')}}">
		                               
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
		                    
		                          	<div class="row"  >
			                            <div class="col-md-12 col-xl-12 mt-2" >
			                              <label for="Chasis No">Remarks</label>
			           
			                              <textarea id="email" name="remark" class="form-control  " value="">{{old('remarks') }}</textarea>                        
			                          	</div>      
			                           	<div class="col-md-12 text-center"  style="margin-top: 24px;" id="btn_sub">
			                           		<button  style="margin-right: -8px;"   value="Submit" class="btn btn-primary active ">Submit</button>
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">

$(document).ready( function () {

    $(function() {
        $( ".datepicker" ).datepicker({format: 'yyyy-mm-dd' });    
      });
 	$('#myTable').DataTable({
 		"searching": false,
 		"paging":   false,
 		"info":     false
 	});
	$('#job_done_by').change(function(){
		var job_by = $('#job_done_by').val();
	  	$.ajax({
	          url: '{{route('get_details')}}',
	          type: 'POST',
	          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	          data: {'job_by':job_by},
	          success: function(data) {
	           // console.log(data) ;
	           $('#data').empty();
	           var balance = 0;
	           $.each( data, function( key, cvalue ) {                    
                       		$('#data').append('<tr><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.bill.bill_no+'" name="bill_no[]" style="width:90px;"></td><td style="width:90px;"><input class="datepicker form-control" readonly="true" value="'+ cvalue.bill.bill_date+'" name="bill_date[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" value="'+cvalue.vehicle.vch_no+'" readonly="true" style="width:90px;"><input class="form-control" type="hidden" value="'+cvalue.vehicle.id+'" name="vch_id[]"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.job_by +'" name="job_by[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" value="'+(cvalue.expense_type_id == 1 ? 'GENERAL EXPENSE' : '')+'" readonly="true" style="width:90px;"><input class="form-control" type="hidden" value="'+ cvalue.expense_type_id +'" name="expense_type_id[]"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.qty+'" name="qty[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.rate+'" name="rate[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.amt+'" name="amt[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.service_tax+'" name="service_tax[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.service_tax_amt_t+'" name="service_tax_amt_t[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.vat_tax+'" name="vat_tax[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.vat_tax_amt_t+'" name="vat_tax_amt_t[]" style="width:90px;"></td><td style="width:90px;"><input class="form-control" readonly="true" value="'+cvalue.net_amt+'" name="net_amt[]" data-id = "'+cvalue.id+'" id="net_amt_'+cvalue.id+'" style="width:90px;"></td><td style="width:90px;"><input class="form-control paid" id="paid_'+cvalue.id+'" value="" name="paid_amt[]" data-id = "'+cvalue.id+'" style="width:90px;"></td><td style="width:90px;"><input class="form-control remaining" value="'+cvalue.net_amt+'" data-id = "'+cvalue.id+'" id="remaining_'+cvalue.id+'" readonly="true" name="remaining_amt[]" style="width:90px;"></td></tr>') 
                       		var number = parseFloat(cvalue.net_amt);
                       		balance = balance + number ;
				           $('#total_balance_amount').val(balance);
				           $('#total_remaining_amount').val(balance);
                       		   
                       		
                       	}); 

	          }
	      });
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
$(document).on("keyup",'.paid , .remaining', function() {
	var pre_id     = $(this).attr('data-id');
  var net_amt        = $('#net_amt_'+pre_id).val();
  var paid_amt        = $('#paid_'+pre_id).val();
  var result   =  net_amt - paid_amt ;
  $('#remaining_'+pre_id).val(result);
	var paid =0;
	var remaining =0;
    	$("input[class *= 'paid']").each(function(){
    		paid += +$(this).val();	
    	});
    	$("input[class *= 'remaining']").each(function(){
    		remaining += +$(this).val();
    	}); 
    		 $('#total_remaining_amount').val(remaining); 
    		 $('#total_paid_amount').val(paid); 
});
</script>
@endsection