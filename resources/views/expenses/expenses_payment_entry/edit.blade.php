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
	            	<form class="well form-horizontal" action="{{route('expanses_payment_entry.update',$data->id)}}" method="post">
	              		{{ csrf_field() }}
	              		@method('PATCH')
	                 	<div class="card-body " >
		                    <div class="row">
		                        <div class="col-sm-12 col-md-12 col-xl-12" >               
		                            <div class='row'>        
		                            	<div class="col-md-4 col-xl-4 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="entry_no">Entry No</label>
			                                <input id="entry_no" name="entry_no" class="form-control" readonly="true" value="{{$data->payment_detail->entry_no}}">                              
			                            </div>
			                            <div class="col-md-4 col-xl-4 mt-2">
			                                <span style="color: #FF0000;font-size:15px;">*</span><label for="entry_date">Entry Date</label>
			                                <input id="entry_date" name="entry_date" class="form-control datepicker" readonly="true" value="{{$data->payment_detail->entry_date}}">
			                                                                
			                            </div>
		                              <div class="col-md-4 col-xl-4 mt-2">
		                                <span style="color: #FF0000;font-size:15px;">*</span><label for="job_done_by">Job Done By</label>
		                                <select id="job_done_by" name="job_done_by" class=" form-control">
					                            <option  value="0">Select Name...</option>
					                        @foreach($jobs as $job)
					                        	<option  value="{{$job->job_by}}" {{$job->job_by == $data->job_by ? 'selected' : ''}}>{{$job->job_by}}</option>
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
										    		<tbody>
										    			<tr>
										    				<td style="width:90px;">
										    					<input class="form-control" readonly="true" name="bill_no[]" value="{{$data->bill_no}}" style="width:90px;">
										    					{{-- for data id --}}
										    					<input class="form-control" type="hidden" readonly="true" name="id[]" value="{{$data->id}}" style="width:90px;">
										    					{{-- for request id --}}
										    					<input class="form-control" type="hidden" readonly="true" name="request_id" value="{{$data->request_id}}" style="width:90px;">
										    				</td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="bill_date[]" value="{{$data->bill_date}}" style="width:90px;"></td>
										    				
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="vch_id[]" type="hidden" value="{{$data->vehicle->id}}" style="width:90px;">
										    				<input class="form-control" readonly="true"  value="{{$data->vehicle->vch_no}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="job_by[]" value="{{$data->job_by}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" value="{{$data->expense_type_id == 1 ? 'General Expense' : ''}}" style="width:90px;">
										    					<input class="form-control" type="hidden" readonly="true" name="expense_type_id[]" value="{{$data->expense_type_id}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="qty[]" value="{{$data->qty}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="rate[]" value="{{$data->rate}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="amt[]" value="{{$data->amt}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="service_tax[]" value="{{$data->service_tax}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="service_tax_amt_t[]" value="{{$data->service_tax_amt_t}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="vat_tax[]" value="{{$data->vat_tax}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="vat_tax_amt_t[]" value="{{$data->vat_tax_amt_t}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="net_amt[]" data-id="{{$data->id}}"  id="net_amt_{{$data->id}}" value="{{$data->net_amt}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control paid"  name="paid_amt[]" data-id="{{$data->id}}" id="paid_{{$data->id}}" value="{{$data->paid_amt}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control remaining" readonly="true" name="remaining_amt[]" data-id="{{$data->id}}" id="remaining_{{$data->id}}" value="{{$data->remaining_amt}}" style="width:90px;"></td>
										    			</tr>
										    			@php $count=0; @endphp
										    			@foreach($records as $record)
										    			@if($record->id != $data->id)
									    				<tr style="display: none;">
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="bill_no[]" value="{{$record->bill_no}}" style="width:90px;">
										    				{{-- for data id --}}
										    				<input class="form-control"  readonly="true" name="id[]" value="{{$record->id}}" style="width:90px;">
										    				{{-- for request id --}}
										    				<input class="form-control"  readonly="true" name="request_id" value="{{$record->request_id}}" style="width:90px;">
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="bill_date[]" value="{{$record->bill_date}}" style="width:90px;"></td>
										    				
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="vch_id[]" type="hidden" value="{{$record->vehicle->id}}" style="width:90px;">
										    				<input class="form-control" readonly="true"  value="{{$record->vehicle->vch_no}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="job_by[]" value="{{$record->job_by}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" value="{{$record->expense_type_id == 1 ? 'General Expense' : ''}}" style="width:90px;">
										    					<input class="form-control" type="hidden" readonly="true" name="expense_type_id[]" value="{{$record->expense_type_id}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="qty[]" value="{{$record->qty}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="rate[]" value="{{$record->rate}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="amt[]" value="{{$record->amt}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="service_tax[]" value="{{$record->service_tax}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="service_tax_amt_t[]" value="{{$record->service_tax_amt_t}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="vat_tax[]" value="{{$record->vat_tax}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="vat_tax_amt_t[]" value="{{$record->vat_tax_amt_t}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control" readonly="true" name="net_amt[]" data-id="{{$record->id}}"  id="net_amt_{{$record->id}}" value="{{$record->net_amt}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control paid"  name="paid_amt[]" data-id="{{$record->id}}" id="paid_{{$record->id}}" value="{{$record->paid_amt}}" style="width:90px;"></td>
										    				<td style="width:90px;"><input class="form-control remaining" readonly="true" name="remaining_amt[]" data-id="{{$record->id}}" id="remaining_{{$record->id}}" value="{{$record->remaining_amt}}" style="width:90px;"></td>
										    			</tr>
										    			@endif
										    			@endforeach
										    			
										    		</tbody>
										    	</table>	
										    </div>
										  </div>
									  	</div>
									</div>
		                       		<div class="row" style="" id="tabel">
		                          	  
		                              <div class="col-md-4 col-xl-4 mt-2">
		                              	 <label class="" for="balance_amount_d">Total Balance Amount</label>
		                              	 <input readonly="true" id="balance_amount_d" name='balance_amount_d' class="form-control total" value="{{$data->net_amt}}">                        
		                              	 <input readonly="true" type="hidden" id="total_balance_amount" name='total_balance_amount' class="form-control total" value="{{$data->payment_detail->total_balance_amount}}">                        
		                              </div>
		                              
		                          	  <div class="col-md-4 col-xl-4 mt-2">
		                            	 <label class="" for="paid_amount_d">Total Paid Amount</label>
		                            	 <input  id="paid_amount_d" readonly="true" name='paid_amount_d' class="form-control total" value="{{$data->paid_amt}}">
		                            	 <input  id="total_paid_amount" type="hidden" readonly="true" name='total_paid_amount' class="form-control total" value="{{$data->payment_detail->total_paid_amount}}">
		                              </div>
		                          		<div class="col-md-4 col-xl-4 mt-2">
		                              	 	<label class="" for="remaining_amount_d">Total Remaining Amount</label>
		                              		<input readonly="true " id="remaining_amount_d" name='remaining_amount_d' class="form-control  total" value="{{$data->remaining_amt}}">                          
		                              		<input readonly="true " type="hidden" id="total_remaining_amount" name='total_remaining_amount' class="form-control  total" value="{{$data->payment_detail->total_remaining_amount}}">                          
		                              	</div>
		                              	<div class="col-md-4 col-xl-4 mt-2">
		                              	 	<label class="" for="paid_by">Paid By</label>
		                              		<input id="paid_by" name='paid_by' class="form-control  total" value="{{$data->paid_by}}"> 
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
					                            <option {{$data->payment_detail->payment_mode =='cash' ? 'selected':'' }} value="case">Cash</option>
												<option {{$data->payment_detail->payment_mode =='cheque' ? 'selected':'' }} value="cheque">Cheque</option>
												<option {{$data->payment_detail->payment_mode =='credit' ? 'selected':'' }} value="credit">Credit</option>
												<option {{$data->payment_detail->payment_mode =='dd' ? 'selected':'' }} value="dd">DD</option>
												<option {{$data->payment_detail->payment_mode =='rtgs' ? 'selected':'' }} value="rtgs">RTGS</option>
												<option {{$data->payment_detail->payment_mode =='neft' ? 'selected':'' }} value="neft">NEFT</option>  
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
			           
			                              <textarea id="email" name="remark" class="form-control  " value="">{{old('remarks') ? old('remarks') : $data->payment_detail->remark  }}</textarea>                        
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
	// alert(paid_amt);
  $('#remaining_'+pre_id).val(result);
  $('#paid_amount_d').val(paid_amt);
  $('#remaining_amount_d').val(result);
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