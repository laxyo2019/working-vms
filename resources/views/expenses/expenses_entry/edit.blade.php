@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>GENERAL EXPENSE DETAILS </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('expanses_entry.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal"  id="create_form1" action="{{route('expanses_entry.update',$expense_entries->id)}}" method="post">
              {{ csrf_field() }}
              @method('patch')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">               
                            <div class='row'>        
                            	<div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="serial_no">Serial No</label>
	                                <input id="serial_no" name="serial_no" class="form-control" readonly="true" value="{{old('serial_no') ? old('serial_no') : $expense_entries->serial_no}}">
	                                @error('serial_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
	                            <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="serial_date">Date</label>
	                                <input id="serial_date" name="serial_date" class="form-control datepicker" readonly="true" value="{{old('serial_date') ? old('serial_date') : $expense_entries->serial_date }}">
	                                @error('serial_date')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select date' }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="job_by">Job Done By</label>
                                <input id="job_by" name="job_by" class="form-control"  value="{{old('job_by') ? old('job_by') : $expense_entries->job_by}}">
	                                @error('job_by')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror	                               
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="address">Address</label>
                                  <input id="address" name="address" class="form-control"  value="{{old('address') ? old('address') : $expense_entries->address}}">
	                                @error('address')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror                            
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="contact_no">Contact No</label>
                                  <input id="contact_no" name="contact_no" class="form-control" value="{{old('contact_no')  ? old('contact_no') : $expense_entries->contact_no}}">
	                                @error('contact_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror                                                          
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tin_no">Tin No</label>
                                  <input id="tin_no" name="tin_no" class="form-control"  value="{{old('tin_no') ? old('tin_no') : $expense_entries->tin_no }}">
	                                @error('tin_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror                                                          
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="bill_no">Bill No</label>
                                  <input id="bill_no" name="bill_no" class="form-control" r value="{{old('bill_no') ? old('bill_no') : $expense_entries->bill_no}}">
	                                @error('bill_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror                                                          
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="bill_date">Bill Date</label>
	                                <input id="bill_date" name="bill_date" class="form-control datepicker" value="{{old('bill_date') ? old('bill_date') : $expense_entries->bill_date }}">
	                                @error('bill_date')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select Bill Date' }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
                           	</div>
                           	<div class="row mt-2">
		                           			<div class="card" style="width: 100%;">
											  <div class="card-body">
		                           				<div class="col-md-4 text-center "  style="margin-top: 14px;">
			                           				<div class="row">
													  	<div class="col-md-12 col-xl-12 ">
							                                <span style="color: #FF0000;font-size:15px;">*</span><label for="expense_type">Expense Type</label>
							                                <select id="expense_type" required="true" name="expense_type" class="form-control">
													             <option value="0" >Select..</option>
													             <option value="1" >General Expense</option>
						                                   
													        </select>                                                         
							                            </div>
						                            </div>
						                            <div class="row">
							                            <div class="col-md-12 col-xl-12 ">
							                                <span style="color: #FF0000;font-size:15px;">*</span><label for="vehicle_no">Vehicle No</label>
							                                <select id="vehicle_no" required="true" name="vehicle_no" class="form-control">
													             <option value="0" >Select..</option>
												             	@foreach($vehicles as $vehicles)
								                               		<option value="{{$vehicles->id}}">{{$vehicles->vch_no}}</option>
									                            @endforeach
													        </select>                                                         
							                            </div>
						                            </div>
					                            </div>
					                            <div class="row " >
						                            <div class="col-md-12">
							                            <div class="col-md-12 col-xl-12 mt-4">
						                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="expense_details">Expense Details</label>
						                                  <textarea rows="3" cols="50" id="expense_details" name="expense_details" class="form-control" value="{{old('expense_details') }}"></textarea>
							                                @error('expense_details')
									                            <span class="invalid-feedback d-block" role="alert">
									                               <strong>{{ $message }}</strong>
									                            </span>
									                         @enderror                                                          
							                            </div>
			                           				</div>
		                           				</div>
											 </div>
											</div>
		                           	</div>
                            <div class="row">
	                            <div class="col-md-12 text-center add_btn"  style="margin-top: 24px;">
                                <a id="additem" style="margin-right: -8px;" class="btn btn-primary active">Add Item</a>
                             	</div>
                       	  	</div>                       		     	
                       		<div class="row" style="" id="tabel">
                          	  <div class="col-sm-12">
		                                <div class="text-center">
		                                  <span class="qty_error" style="color: #FF0000;font-size:15px;"></span>
		                              	</div>  
                                	<div class="box box-color orange box-condensed box-bordered">
	                                    <div class="box-title">
	                                        <h3>EXPENSES</h3>
	                                    </div>
                                    <div class="box-content nopadding" style="height: 305px;overflow: scroll;" align="center">                                   
                                    <div id="ContentPlaceHolder1_Panel5" style="background-color:Transparent;height:auto;width:90%;padding-top: 22px;">
                                        <div id="ContentPlaceHolder1_UpdatePanel86">                      
        					                <div id="sup_table" class="row sup_table" style="padding-top: 21px;">
        					                    <table id="myTable2" class="row sup_table">
													<thead>
														<tr>
													        <th style="width: 20px;">#</th>
													        <th style="width: 200px;">EXPENSE TYPE</th>
													        <th style="width: 200px;">EXPENSE DETAIL</th>
															<th style="width: 200px;">VEHICLE NO</th>
															<th style="width: 200px;">QUANTITY</th>
												            <th style="width: 200px;">RATE</th>
												            <th style="width: 200px;">AMOUNT</th>
												            <th style="width: 200px;">SERVICE TAX%</th>
												            <th style="width: 200px;">SERVICE TAX AMT</th>
												            <th style="width: 200px;">VAT TAX%</th>
												            <th style="width: 200px;">VAT TAX AMT</th>
												            <th style="width: 200px;">NET AMT</th>
														</tr>
													</thead>
													<tbody>
															<?php $count = 0;
																$cc = 0;
															?>
															<?php $ids   = session('ids') ? session('ids'):array(); ?>
															@foreach($ids as $id)
																<?php  $id = $id[$count]; ?>
																<?php $data1  = session('data') ? session('data')[$id] :array();?>

																@foreach($data1 as $data) 							
																	<tr data-id ="tr_{{$data['id']}}">
																		<td style=" width:20px; padding-left: 20px;">
																		<a  style="cursor: pointer;color: #ff0000" data="{{$id}}" id="trash1"><i style="margin-right: 5px; " class="fas fa-trash" aria-hidden="true"></i></a>
																		<input type='hidden' value="{{$data['item_id'] ? $data['item_id'] : ''}}" name = "item_id[]" >
																		<input type='hidden' value="{{$data['vehicle_id']}}" name = "vehicle_id[]" >
																		<input type='hidden' value="{{$data['expense_type_id']}}" name = "expense_type_id[]" >
																		<input type='hidden' value="{{$data['expense_details']}}" name = "expense_details[]" >
																		</td>
																		<td style="width: 200px;">{{$data['expense_type']}}</td>
																		<td style="width: 200px;">{{$data['expense_details']}}</td>
																		<td style="width: 200px;">{{$data['vehicle_no']}}</td>

																		<td style="width: 200px;"><input class="form-control qty" type="number" id="qty_{{$data['id']}}" data-id = '{{$data['id']}}' value="{{$data['qty'] !='' ? $data['qty'] :''}}" name="qty[]" >

																			@error('qty.'.$cc)
																			<span class="text-danger" role="alert">
																			<strong>{{ 'Please enter Quantity' }}</strong>
																			</span>
																			@enderror
																		</td>
																		<td style="width: 200px;"><input class="form-control rate" type="text" value="{{$data['rate'] !='' ? $data['rate'] :''}}" id="rate_{{$data['id']}}" data-id = '{{$data['id']}}' name="rate[]">

																			@error('rate.'.$cc)
																			<span class="text-danger" role="alert">
																			<strong>{{ 'Please enter rate' }}</strong>
																			</span>
																			@enderror
																			
																		</td>
																		<td style="width: 200px;"><input readonly="true" class="form-control ac_amt" type="text" id="amt_{{$data['id']}}" value="{{$data['amt'] !='' ? $data['amt'] :''}}" name="amt[]">

																		</td>
																		<td style="width: 200px;"><input class="form-control service_tax" type="text" value="{{$data['service_tax'] !='' ? $data['service_tax'] :''}}" data-id = '{{$data['id']}}' id="service_tax{{$data['id']}}" name="service_tax[]">

																		@error('service_tax.'.$cc)
																		<span class="text-danger" role="alert">
																		<strong>{{ 'Please enter discount' }}</strong>
																		</span>
																		@enderror

																		</td>
																		<td style="width: 200px;"><input class="form-control service_tax_amt_t" type="text" value="{{$data['service_tax_amt'] !='' ? $data['service_tax_amt'] :''}}" name="service_tax_amt_t[]" readonly="true" id="service_tax_amt_t{{$data['id']}}"></td>

																		<td style="width: 200px;"><input class="form-control vat_tax" type="text" value="{{$data['vat_tax'] !='' ? $data['vat_tax'] :''}}" id="vat_tax{{$data['id']}}" data-id = '{{$data['id']}}'  name="vat_tax[]">

																		@error('vat_tax.'.$cc)
																		<span class="text-danger" role="alert">
																		<strong>{{ 'Please enter vat_tax' }}</strong>
																		</span>
																		@enderror
																		</td>
																		<td style="width: 200px;"><input readonly="true" class="form-control vat_tax_amt_t" id="vat_tax_amt_t{{$data['id']}}" type="text" value="{{$data['vat_tax_amt'] !='' ? $data['vat_tax_amt'] :''}}" name="vat_tax_amt_t[]"></td>

																		<td style="width: 200px;"><input readonly="true" id="net_amt_{{$data['id']}}" class="form-control net_amt" type="text" value="{{$data['net_amt'] !='' ? $data['net_amt'] :''}}" name="net_amt[]"></td>

																	</tr>
																	<?php ++$cc ?>
																@endforeach
															@endforeach
													</tbody>
												</table>
        					                </div>
                    					</div>
                    				</div>
                    				</div>
                    			</div>
                    		  </div>
                            	<div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="Chasis No">Total Qty</label>
                              	<input readonly="true" id="total_qty" name='total_qty' class="form-control total" value="{{$expense_entries->total_qty}}">
                                   @error('total_qty')
      	                        <span class="invalid-feedback d-block" role="alert">
      	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
      	                        </span>
                             		@enderror                          
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="Chasis No">Total Amount</label>
                              	<input readonly="true"  name='total_amount' id="total_amount" class="form-control" value="{{$expense_entries->total_amount}}">
                                                          
                              </div> 
                              <div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="service_tax_amount">Service Tax Amount</label>
                              	<input readonly="true" id="service_tax_amount" name='service_tax_amount' class="form-control" value="{{$expense_entries->service_tax_amount}}">
                                                          
                              </div>
                          	  <div class="col-md-4 col-xl-4 mt-2">
                            	 <label class="" for="vat_tax_amount">Vat Tax Amount</label>
                            	<input readonly="true" id="vat_tax_amount" name='vat_tax_amount' class="form-control  total" value="{{$expense_entries->vat_tax_amount}}">                      
                              </div>
                          	<div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="net_amt_sum">Net Amount</label>
                              	<input readonly="true " id="net_amt_sum" name='net_amt_sum' class="form-control  total" value="{{$expense_entries->net_amt_sum}}">
                                                         
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
	                               
                               		 <input id="cpay_dt" class="form-control datepicker" readonly="true" name="cpay_dt" value="{{old('cpay_dt')}}">
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
	                               
	                           		 <input id="dpay_no" class="form-control  " name="dpay_no" value="{{old('pday_no')}}">
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
                             	@error('remarks')
                              <span class="invalid-feedback d-block" role="alert">
                                  <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
                              </span>
                              @enderror                          
                          	</div>      
                           	<div class="col-md-12 text-center"  style="margin-top: 24px;" id="btn_sub">
                           		<button  style="margin-right: -8px;"   value="Submit" class="btn btn-primary active ">Submit</button>
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">

$(document).ready( function () {

    $(function() {
        $( ".datepicker" ).datepicker({format: 'yyyy-mm-dd' });    
      });
 
    $('#newtable').DataTable();
    // $('#file').change(function() {
    //    $('#target').submit();
    //   });

    $('#myTable2').DataTable({
    	"searching": false,
    	"bPaginate": false,
    });
 
	$('#additem').click(function(){
	  var expense_type = $('#expense_type').val();
	  var expense_details = $('#expense_details').val();
	  var vehicle_no = $('#vehicle_no').val();
	    $.ajax({
	          url: '{{route('expense_entry_save')}}',
	          type: 'POST',
	          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	          data: {'expense_type':expense_type,'expense_details':expense_details,'vehicle_no':vehicle_no,},
	          success: function(data) {
	           console.log(data)           
	           $('#sup_table').html(data);
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

$(document).on("click", "#trash1", function() {
    var id = $(this).attr('data');
    $.ajax({
          url: '{{route('expense_entry_remove')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'id':id},
          success: function(data) {
           console.log(data);
           $('.sup_table').html(data);
          }
      });
});
function gteGst(price, percentage) {
    var calcPrice =  (price/100) * percentage ;
    return calcPrice
}

$(document).on('keyup','.qty , .rate ,.service_tax,.vat_tax',function(){
  var pre_id     = $(this).attr('data-id');
  var qty        = $('#qty_'+pre_id).val();
  var rate       = $('#rate_'+pre_id).val();
  var service = $('#service_tax'+pre_id).val();
  var vat   = $('#vat_tax'+pre_id).val();
  var multi      = qty*rate;
  var service_amt   = gteGst(multi,service);
  var vat_amt   = gteGst(multi,vat); 
  var total_amt  = service_amt+vat_amt+multi;

  if(multi !=''){
    $('#amt_'+ pre_id).val(multi);
    $('#service_tax_amt_t'+pre_id).val(service_amt);
    $('#vat_tax_amt_t'+pre_id).val(vat_amt);
    $('#net_amt_'+pre_id).val(total_amt);
    } 
})

$(document).on("change", ".qty", function() {
    var sum = 0;
    $("input[class *= 'qty']").each(function(){
        sum += +$(this).val();
    });
    $("#total_qty").val(sum);
});

$(document).on("keyup",'.qty , .rate ,.service_tax, .service_tax_amt,.vat_tax,.vat_tax_amt', function() {
    var sum = 0;
    var service_amount = 0;
    var vat_amount = 0;
    var net_amt   = 0;
    var amt   = 0;
    $("input[class *= 'ac_amt']").each(function(){
        amt += +$(this).val();        
    });
    $("input[class *= 'service_tax_amt_t']").each(function(){
        service_amount += +$(this).val();
    });
    $("input[class *= 'vat_tax_amt_t']").each(function(){
        vat_amount += +$(this).val();
    });
    $("input[class *='net_amt']").each(function(){
        net_amt += +$(this).val();

    });

    $("#total_amount").val(amt);
    $('#service_tax_amount').val(service_amount);
    $('#vat_tax_amount').val(vat_amount);
    $('#net_amt_sum').val(net_amt);
});
</script>
@endsection