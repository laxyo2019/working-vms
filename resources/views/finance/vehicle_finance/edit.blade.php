@extends('state.main') 
@section('content')
<style type="text/css">
  
  .active_vehicle{
    background:#539D9D !important;
  }
</style>
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD VEHICLE FINANCE DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vehiclefinance.index')}}">Back</a>
            </div>
              <div id="add-city-form">
                <form class="well well1 " method="post" action="{{route('vehiclefinance.update',$finances->id)}}"  enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('patch')
                  <div class="row">
                      <div class="col-md-4 col-xl-4 mt-2">
                            <label class="">Select Vehicle</label>
                             <select name="vch_id" class="selectpicker form-control" id="vehicle_no1">
                                  <option value="0" selected=" true " disabled="true">Select..</option>
                                  @foreach($vehicle as $vehicles)
                                     <option value="{{$vehicles->id}}" {{ $vehicles->id == $finances->vch_id ? 'selected' : ''}}>{{$vehicles->vch_no}}</option>
                                  @endforeach     
                              </select>
                               @error('vch_id')
                                    <span class="invalid-feedback d-block pull-right" role="alert">
                                        <strong>{{ 'Please Select Vehicle' }}</strong>
                                    </span>
                                @enderror
                          </div>
                  </div>
                    <div class="row">
                      <div class="box-title" style="width: 100%;">
                         <h3> <i class="fa fa-bars"></i>CUSTOMER/GUARANTER DETAILS</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                  <div class="card-body " >
                                    <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                                                                
                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="customer_name">Customer Name</label>
                                                    <input id="customer_name" class="form-control" name="customer_name" value="{{ old('customer_name') ?  old('customer_name') : $finances->customer_name }}" > 
                                                </div>
                                                
                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="guranter_name">Guranter Name</label>
                                                    <input id="guranter_name" type="text" name="guranter_name" class="form-control" value="{{ old('guranter_name') ?  old('guranter_name') : $finances->guranter_name }}">
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="customer_address">Customer Address</label>
                                                    <textarea id="customer_address" type="text" name="customer_address" class="form-control" value="">{{ old('customer_address') ?  old('customer_address') : $finances->customer_address }}</textarea> 
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="guranter_address">Guranter Address</label>
                                                    <textarea id="guranter_address" type="text" name="guranter_address" class="form-control" value="">{{ old('guranter_address') ?  old('guranter_address') : $finances->guranter_address }}</textarea> 
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="customer_state_id">Customer State</label>
                                                    <div class="input-group">
                                                      <select name="customer_state_id" id="customer_state_id" class="selectpicker form-control">
                                                         <option value="0" selected=" true " disabled="true">Select..</option>
                                                         @foreach($state as $states)
                                                            <option value="{{$states->id}}" {{ $states->id == $finances->customer_state_id ? 'selected' : ''}}>{{$states->state_name}}</option>
                                                         @endforeach     
                                                      </select>
                                                    </div>
                                                     @error('customer_state_id')
                                                          <span class="invalid-feedback d-block" role="alert">
                                                              <strong>{{ 'Please select state' }}</strong>
                                                          </span>
                                                      @enderror
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="guranter_state_id">Guranter State</label>
                                                    <div class="input-group">
                                                      <select name="guranter_state_id" id="guranter_state_id" class="selectpicker form-control">
                                                         <option value="0" selected=" true " disabled="true">Select..</option>
                                                         @foreach($state as $states)
                                                            <option value="{{$states->id}}" {{ $states->id == $finances->guranter_state_id ? 'selected' : ''}}>{{$states->state_name}}</option>
                                                         @endforeach     
                                                      </select>
                                                    </div>
                                                     @error('guranter_state_id')
                                                          <span class="invalid-feedback d-block" role="alert">
                                                              <strong>{{ 'Please select state' }}</strong>
                                                          </span>
                                                      @enderror
                                                </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="customer_city_id">Customer City</label>
                                                    <div class="input-group">
                                                      <select name="customer_city_id" id="customer_city_id" class="selectpicker form-control">
                                                          <option selected="true" disabled="true">Select..</option>
                                                     </select>
                                                      @error('customer_city_id')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                           <strong>{{ 'Please select city' }}</strong>
                                                        </span>
                                                     @enderror
                                                    </div>
                                              </div>

                                                <div class="col-md-6 col-xl-6 mt-2">
                                                    <label for="guranter_city_id">Guranter City</label>
                                                    <div class="input-group">
                                                      <select name="guranter_city_id" id="guranter_city_id" class="selectpicker form-control">
                                                          <option selected="true" disabled="true">Select..</option>
                                                     </select>
                                                      @error('guranter_city_id')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                           <strong>{{ 'Please select city' }}</strong>
                                                        </span>
                                                     @enderror
                                                    </div>
                                              </div>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                            </div>
                      </div>
                    </div>

                  <div class="row">
                      <div class="box-title" style="width: 50%;">
                         <h3> <i class="fa fa-bars"></i>CONTRACT DETAILS</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                  <div class="card-body " >
                                    <div class="row">
                                      <div class="col-sm-12 col-md-12 col-xl-12">
                                                                          
                                          <div class="col-md-4 col-xl-4 mt-2">
                                              <label for="contract_no">Contract No</label>
                                              <input id="contract_no" class="form-control" name="contract_no" value="{{ old('contract_no') ?  old('contract_no') : $finances->contract_no }}" > 
                                          </div>
                                          
                                          <div class="col-md-4 col-xl-4 mt-2">
                                              <label for="contract_date">Contract Date</label>
                                              <input id="contract_date" readonly="true"  name="contract_date" class="form-control datepicker" value="{{ old('contract_date') ?  old('contract_date') : $finances->contract_date }}">
                                          </div>

                                          <div class="col-md-4 col-xl-4 mt-2">
                                              <label for="contract_period">Contract Period</label>
                                              <input id="contract_period" type="text"  name="contract_period" class="form-control " value="{{ old('contract_period') ?  old('contract_period') : $finances->contract_period }}" placeholder="In Months">
                                          </div>

                                          <div class="col-md-4 col-xl-4 mt-2">
                                              <label for="expair_date">Expair Date
                                              </label>
                                              <input id="expair_date" readonly="true" name="expair_date" class="form-control datepicker" value="{{ old('expair_date') ?  old('expair_date') : $finances->expair_date }}">
                                          </div>

                                          <div class="col-md-4 col-xl-4 mt-2">
                                              <label for="finance_rate">Finance Rate(%)</label>
                                              <input id="finance_rate" type="number" name="finance_rate" class="form-control" value="{{ old('finance_rate') ?  old('finance_rate') : $finances->finance_rate }}">
                                          </div>

                                          <div class="col-md-4 col-xl-4 mt-2">
                                              <label for="moratorium">Moratorium</label>
                                              <input id="moratorium" type="text" name="moratorium" class="form-control" value="{{ old('moratorium') ?  old('moratorium') : $finances->moratorium }}">
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                      </div>
                      <div class="box-title" style="width: 50%;">
                         <h3> <i class="fa fa-bars"></i>PRODUCT DETAILS</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                  <div class="card-body " >
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                                                          
                                          <div class="col-md-6 col-xl-6 mt-2">
                                              <label for="product_model">Product-Model</label>
                                              <input id="product_model" class="form-control" name="product_model" value="{{ old('product_model') ?  old('product_model') : $finances->product_model }}" > 
                                          </div>
                                          
                                          <div class="col-md-6 col-xl-6 mt-2">
                                              <label for="engine_no">Engine No</label>
                                              <input id="engine_no" type="text" name="engine_no" class="form-control" value="{{ old('engine_no') ?  old('engine_no') : $finances->engine_no }}">
                                          </div>

                                          <div class="col-md-6 col-xl-6 mt-2">
                                              <label for="chassis_no">Chassis No</label>
                                              <input id="chassis_no" type="text" name="chassis_no" class="form-control" value="{{ old('chassis_no') ?  old('chassis_no') : $finances->chassis_no }}">
                                          </div>

                                          <div class="col-md-6 col-xl-6 mt-2">
                                              <label for="reg_no">Reg. No
                                              </label>
                                              <input id="reg_no" type="text" name="reg_no" class="form-control" value="{{ old('reg_no') ?  old('reg_no') : $finances->reg_no }}">
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                      </div>
                  </div>
                    <div class="row">
                      <div class="box-title" style="width: 100%;">
                         <h3> <i class="fa fa-bars"></i>LOAN/FINANCE DETAILS</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                  <div class="card-body " >
                                    <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                
                                                <div class="col-md-12 col-xl-12 mt-2">
                                                    <label for="finance_com_name">Finance Company Name </label>
                                                    <input id="finance_com_name" class="form-control" name="finance_com_name" value="{{ old('finance_com_name') ?  old('finance_com_name') : $finances->finance_com_name }}" > 
                                                </div>
                                                
                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="finance_amount">Finance Amount</label>
                                                    <input id="finance_amount" type="text" name="finance_amount" class="form-control" value="{{ old('finance_amount') ?  old('finance_amount') : $finances->finance_amount }}">
                                                </div>

                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="total_amount">Total Amount </label>
                                                    <input id="total_amount" type="text" name="total_amount" class="form-control" readonly="true" value="{{ old('total_amount') ?  old('total_amount') : $finances->total_amount }}">
                                                </div>

                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="interest_charges">Interest Charges 
                                                    </label>
                                                    <input id="interest_charges" type="text" name="interest_charges" class="form-control" value="{{ old('interest_charges') ?  old('interest_charges') : $finances->interest_charges }}">
                                                </div>

                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="paid">Paid </label>
                                                    <input id="paid" type="text" name="paid" class="form-control" value="{{ old('paid') ?  old('paid') : $finances->paid }}">
                                                </div>

                                                <div class="col-md-4 col-xl-4 mt-2">
                                                    <label for="documentation_charge">Documentation Charges </label>
                                                    <input id="documentation_charge" type="text" name="documentation_charge" class="form-control" value="{{ old('documentation_charge') ?  old('documentation_charge') : $finances->documentation_charge }}">
                                                </div>

                                                <div class="col-md-4 col-xl-4 mt-2">
                                                    <label for="balance">Balance</label>
                                                    <input id="balance" type="text" readonly="true" name="balance" class="form-control" value="{{ old('balance') ?  old('balance') : $finances->balance }}">
                                                </div>

                                                <div class="col-md-4 col-xl-4 mt-2">
                                                    <label for="first_year_insurance">First Year Insurance </label>
                                                    <input id="first_year_insurance" name="first_year_insurance" class="form-control" value="{{ old('first_year_insurance') ?  old('first_year_insurance') : $finances->first_year_insurance }}">
                                                </div>
                                                <div class="col-md-4 col-xl-4 mt-2">
                                                    <label for="expanse1">Expense 1 </label>
                                                    <input id="expanse1" type="text" name="expanse1" class="form-control" value="{{ old('expanse1') ?  old('expanse1') : $finances->expanse1 }}">
                                                </div>

                                                <div class="col-md-8 col-xl-8 mt-2">
                                                    <label for="remark1">Remark 1 </label>
                                                    <textarea id="remark1" name="remark1" class="form-control" value="{{ old('remark1') ?  old('remark1') : $finances->remark1 }}" rows="1" cols="1"></textarea>
                                                </div>
                                                <div class="col-md-4 col-xl-4 mt-2">
                                                    <label for="expanse2">Expense 2 </label>
                                                    <input id="expanse2" type="text" name="expanse2" class="form-control" value="{{ old('expanse2') ?  old('expanse2') : $finances->expanse2 }}">
                                                </div>

                                                <div class="col-md-8 col-xl-8 mt-2">
                                                    <label for="remark2">Remark 2 </label>
                                                    <textarea id="remark2" name="remark2" class="form-control" value="{{ old('remark2') ?  old('remark2') : $finances->remark2 }}" rows="1" cols="1"></textarea>
                                                </div>
                                                <div class="col-md-4 col-xl-4 mt-2">
                                                    <label for="expanse3">Expense 3 </label>
                                                    <input id="expanse3" type="text" name="expanse3" class="form-control" value="{{ old('expanse3') ?  old('expanse3') : $finances->expanse3 }}">
                                                </div>

                                                <div class="col-md-8 col-xl-8 mt-2">
                                                    <label for="remark3">Remark 3 </label>
                                                    <textarea id="remark3" name="remark3" class="form-control" value="{{ old('remark3') ?  old('remark3') : $finances->remark3 }}" rows="1" cols="1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                            </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="box-title" style="width: 100%;">
                         <h3> <i class="fa fa-bars"></i>INSTALMENT DETAILS</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                    <div class="card-body " >
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                                                                
                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="agreement_value">Agreement Value</label>
                                                    <input id="agreement_value" type="text" name="agreement_value" class="form-control" readonly="true" value="{{ old('agreement_value') ?  old('agreement_value') : $finances->agreement_value }}">
                                                </div>
                                                
                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="installment_no">Total No Of Instalment</label>
                                                    <input id="installment_no" type="text" name="installment_no" class="form-control" readonly="true" value="{{ old('installment_no') ?  old('installment_no') : $finances->installment_no }}">
                                                </div>

                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="per_installment_amount">Per Instalment Amount</label>
                                                    <input id="per_installment_amount" type="text" name="per_installment_amount" class="form-control" readonly="true" value="{{ old('per_installment_amount') ?  old('per_installment_amount') : $finances->per_installment_amount }}">
                                                </div>

                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label for="first_installment_date">First InstalmentD ate</label>
                                                    <input id="first_installment_date" type="text" name="first_installment_date" class="form-control" readonly="true" value="{{ old('first_installment_date') ?  old('first_installment_date') : $finances->first_installment_date }}">
                                                </div>
                                                <div class="col-md-12 col-xl-12 mt-4" >
                                                  <center><a class="btn btn-success" id="generate">GENERATE</a></center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card"  >
                                    <div class="card-body " >
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                              <table class="table" {{-- style="display: none;" id="data1" --}}>
                                                <thead >
                                                  <tr>
                                                    <th>Instalment No</th>
                                                    <th>Instalment Date</th>
                                                    <th>Instalment Amount</th>
                                                    <th>Instalment Remaning Amount</th>
                                                  </tr>
                                                </thead >
                                                <tbody id="result">
                                                  @php $count=1;  @endphp
                                                  @foreach($finances_ins as $finance_ins)
                                                  <tr>
                                                    <td>{{$count++}}</td>
                                                    <td><input class="form-control" readonly="true" name="fist_ins_date_lst[]" value="{{$finance_ins->fist_ins_date_lst}}"></td>
                                                    <td><input class="form-control" readonly="true" name="per_ins_amt_lst[]" value="{{$finance_ins->per_ins_amt_lst}}"></td>
                                                    <td><input class="form-control" readonly="true"  name="agreement_value_lst[]" value="{{$finance_ins->agreement_value_lst}}"></td>
                                                  </tr>
                                                  @endforeach
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-6" style="margin-top: 24px;">
                                    <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
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
  </div>

<script type="text/javascript">
$(document).ready( function () {
    $(function() {
        $( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
     });
    if( $('#customer_state_id').val() != null){
    var customer_state = $('#customer_state_id').val();    
    var city_id        = {{$finances->customer_city_id }};
    $.ajax({
            url: "/customer_city_edit",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {'id':customer_state,'city_id':city_id},
            success: function (data) {
             $('#customer_city_id').html(data);
            }
        })
    }
    if( $('#guranter_state_id').val() != null){
    var guranter_state_id = $('#guranter_state_id').val();    
    var city_id        = {{$finances->guranter_city_id }};
    $.ajax({
            url: "/customer_city_edit",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {'id':guranter_state_id,'city_id':city_id},
            success: function (data) {
             $('#guranter_city_id').html(data);
            }
        })
    }
    $('#customer_state_id').on('change',function(){
            var state_id = $('#customer_state_id').val();
            $.ajax({
                    url: "/drivercity",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {'id':state_id},
                    success: function (data) {
                      console.log(data);
                       $('#customer_city_id').html(data);
                    }
                })
           })
    
    $('#guranter_state_id').on('change',function(){
           
            var state_id = $('#guranter_state_id').val();
            $.ajax({
                    url: "/drivercity",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {'id':state_id},
                    success: function (data) {
                      console.log(data);
                       $('#guranter_city_id').html(data);
                    }
                })
           })
    
    $('#contract_period').on('keyup',function(){
            var condate = $('#contract_date').val();
            var contract_period = Number($('#contract_period').val());
           $('#installment_no').val(contract_period);
            var x = contract_period; //or whatever offset
            var CurrentDate = new Date(condate);
            CurrentDate.setMonth(CurrentDate.getMonth() + x);
            month = '' + (CurrentDate.getMonth() + 1),
            day = '' + CurrentDate.getDate(),
            year = CurrentDate.getFullYear();
            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
             $('#expair_date').val(year  + "-" + month + "-" + day);

             if($('#balance').val() !='' && $('#contract_period').val() != ''){
                  var agreement_value = $('#balance').val();
                $('#agreement_value').val(agreement_value);
                 var installment_no = $('#contract_period').val();
                 var ins_amt  =  Number(agreement_value) / Number(installment_no); 
                $('#per_installment_amount').val(ins_amt);

             }
           })
      
    $('#finance_amount,#interest_charges,#documentation_charge,#first_year_insurance,#paid,#contract_period,#expanse1,#expanse2,#expanse3').on('keyup',function(){
      var finance_amount        = $('#finance_amount').val();
      var interest_charges      = $('#interest_charges').val();
      var documentation_charge  = $('#documentation_charge').val();
      var first_year_insurance  = $('#first_year_insurance').val();
      var expanse1              = $('#expanse1').val();
      var expanse2              = $('#expanse2').val();
      var expanse3              = $('#expanse3').val();
      var paid                  = $('#paid').val();

      $('#total_amount').val(Number(finance_amount) + Number(interest_charges) + Number(documentation_charge) + Number(first_year_insurance) + Number(expanse1) + Number(expanse2) + Number(expanse3));
     var balance = $('#balance').val(Number(finance_amount) + Number(interest_charges) + Number(documentation_charge) + Number(first_year_insurance) + Number(expanse1) + Number(expanse2) + Number(expanse3) - Number(paid));

     if($('#balance').val() !='' && $('#contract_period').val() != ''){
          var agreement_value = $('#balance').val();
        $('#agreement_value').val(agreement_value);
         var installment_no = $('#contract_period').val();
         var ins_amt  =  Number(agreement_value) / Number(installment_no); 
        $('#per_installment_amount').val(ins_amt);

     }
   
    });
    $('#contract_date').on('change',function(){
        var result = $('#contract_date').val();
        $('#first_installment_date').val(result);
    });
    $('#generate').on('click',function(){
        var agreement_value         = $('#agreement_value').val();
        var installment_no          = $('#installment_no').val();
        var per_installment_amount  = $('#per_installment_amount').val();
        var first_installment_date  = $('#first_installment_date').val();
        var contract_date  = $('#contract_date').val();
        var html = [];
        var count = 1;
        for (var i = 0; i < installment_no; i++) {
          agreement_value = Number(agreement_value) - Number(per_installment_amount);

            

            if(i == 0){

            html.push('<tr><td>'+count+'</td><td><input class="form-control" name="fist_ins_date_lst[]" value="'+first_installment_date+'" readonly="true"></td><td><input class="form-control" name="per_ins_amt_lst[]" value="'+per_installment_amount+'" readonly="true"></td><td><input class="form-control" name="agreement_value_lst[]" value="'+agreement_value+'" readonly="true"></td></tr>');
            count++;
            }else{
              var CurrentDate = new Date(first_installment_date);
            CurrentDate.setMonth(CurrentDate.getMonth() + i);
            month = '' + (CurrentDate.getMonth() + 1),
            day = '' + CurrentDate.getDate(),
            year = CurrentDate.getFullYear();
            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
            var date = year  + "-" + month + "-" + day;

            html.push('<tr><td>'+count+'</td><td><input class="form-control" name="fist_ins_date_lst[]" value="'+date+'" readonly="true"></td><td><input class="form-control" name="per_ins_amt_lst[]" value="'+per_installment_amount+'" readonly="true"></td><td><input class="form-control" name="agreement_value_lst[]" value="'+agreement_value+'" readonly="true"></td></tr>')

            html1 =  '';
            count++;
            }
            //document.getElementById("data1").style.display = "block";
         
            $('#result').html(html);
          }
            
    });
   
})
 


</script>
@endsection
