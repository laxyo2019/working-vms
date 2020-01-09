@extends('state.main') 
@section('content')
<style type="text/css">
	.active_nab{
		background-color:grey;
	}
	
</style>
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          	<div class="row">
		        <div class="col-sm-4 col-md-4">
		            <button type="button" class="btn btn-secondary" id="vehicle_details">Vehicle Details</button>
		        </div>
	            <div class="col-sm-8 col-md-8">
	               <button type="button" class="btn btn-secondary" id="puc_details">PUC Details</button>
	               <button type="button" class="btn btn-secondary" id="rc_details">RC Details</button>
	               <button type="button" class="btn btn-secondary" id="fitness_details">Fitness Details</button>
	               <button type="button" class="btn btn-secondary" id="roadtax_details">Road Tax DEtails</button>
	               <button type="button" class="btn btn-secondary" id="insurance_details">Insurance Details</button>
	               <button type="button" class="btn btn-secondary" id="permit_details">Permit Details</button>
	               
	      	  	</div>
      	  </div>
        </div>
        <div id="registration">
            <div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>VEHICLE DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
	      	<div class="row " >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle Class:</th>
	      	  				<td>{{$vehicledetails->vch_class}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Vehicle Company:</th>
	      	  				<td>{{$vehicledetails->company->comp_name ? $vehicledetails->company->comp_name :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Vehicle Model:</th>
	      	  				<td>{{$vehicledetails->model->model_name ? $vehicledetails->model->model_name : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Vehicle Owner Name:</th>
	      	  				<td>{{$vehicledetails->owner_name ? $vehicledetails->owner_name :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Owner Address:</th>
	      	  				<td>{{$vehicledetails->owner_addr ? $vehicledetails->owner_addr :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Owner PAN Card No:</th>
	      	  				<td>{{$vehicledetails->owner_pan ? $vehicledetails->owner_pan : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Invoice No:</th>
	      	  				<td>{{$vehicledetails->reg_invoice_no ? $vehicledetails->reg_invoice_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Invoice date:</th>
	      	  				<td>{{$vehicledetails->reg_invoice_date ? $vehicledetails->reg_invoice_date : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Manufacturer Year:</th>
	      	  				<td>{{$vehicledetails->reg_manuf_year ? $vehicledetails->reg_manuf_year : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no ? $vehicledetails->vch_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Make-Model:</th>
	      	  				<td>{{$vehicledetails->reg_make ? $vehicledetails->reg_make : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>No Of Tyres :</th>
	      	  				<td>{{$vehicledetails->reg_no_tyres ? $vehicledetails->reg_no_tyres : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Seating Capacity(including Driver):</th>
	      	  				<td>{{$vehicledetails->reg_seating_capacity ? $vehicledetails->reg_seating_capacity : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Unladen Weight:</th>
	      	  				<td>{{$vehicledetails->reg_unladen_weight ? $vehicledetails->reg_unladen_weight : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Horse Power:</th>
	      	  				<td>{{$vehicledetails->eng_power ? $vehicledetails->eng_power :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Fuel Type:</th>
	      	  				<td>{{$vehicledetails->eng_fuel_type ? strtoupper($vehicledetails->eng_fuel_type) : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Chassis color:</th> 
	      	  				<td>{{$vehicledetails->chassis_color ? $vehicledetails->chassis_color : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Body color:</th>
	      	  				<td>{{$vehicledetails->body_color ? $vehicledetails->body_color : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Engine Serial No.:</th>
	      	  				<td>{{$vehicledetails->reg_engine_no ? $vehicledetails->reg_engine_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Chassis Serial No.:</th>
	      	  				<td>{{$vehicledetails->reg_chassis_no ? $vehicledetails->reg_chassis_no : 'NO RECORD'}}</td>
	      	  			</tr>

	      	  		</table>
	      	  	</div>
	      	</div>
        </div>

      	<div id="puc" style="display: none;">
      		<div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>PUC DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
      		<div class="row" >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Agent Name:</th>
	      	  				<td>{{$vehicledetails->puc->agent == null ? 'No Name' :$vehicledetails->puc->agent->agent_name}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>PUC No:</th>
	      	  				<td>{{$vehicledetails->puc->puc_no}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>PUC Amount:</th>
	      	  				<td>{{$vehicledetails->puc->puc_amt}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Valid From:</th>
	      	  				<td>{{$vehicledetails->puc->valid_from}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Expiry Date:</th>
	      	  				<td>{{$vehicledetails->puc->valid_till}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
      		</div>
      	</div>

      	<div id="rc" style="display: none;">
      		<div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>RC DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
      		<div class="row" >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no ? $vehicledetails->vch_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Vehicle type:</th>
	      	  				<td>{{$vehicledetails->rc != null ? ($vehicledetails->rc->vch_type_id == '1' ? 'HMV' :($vehicledetails->rc->vch_type_id == '2' ? 'Private' : 'COMMERCIAL')) : 'NO RECORD'  }}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Agent Name:</th>
	      	  				<td>{{$vehicledetails->rc == null ? 'NO RECORD' :$vehicledetails->rc->agent->agent_name}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>RC No:</th>
	      	  				<td>{{$vehicledetails->rc ? $vehicledetails->rc->rc_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Hypothecation Agreement:</th>
	      	  				<td>{{$vehicledetails->rc ? $vehicledetails->rc->hypothecation_agreement : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>RC Amount:</th>
	      	  				<td>{{$vehicledetails->rc ? $vehicledetails->rc->rc_amt : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Valid From:</th>
	      	  				<td>{{$vehicledetails->rc ? $vehicledetails->rc->valid_from :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Expiry Date:</th>
	      	  				<td>{{$vehicledetails->rc ? $vehicledetails->rc->valid_till : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
      		</div>
      	</div>

      	<div id="fitness" style="display: none;">
      		<div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>FITNESS DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
      		<div class="row" >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no ? $vehicledetails->vch_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Agent Name:</th>
	      	  				<td>{{$vehicledetails->fitness->agent == null ? 'NO RECORD' :$vehicledetails->fitness->agent->agent_name}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Fitness No:</th>
	      	  				<td>{{$vehicledetails->fitness->fitness_no ? $vehicledetails->fitness->fitness_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Fitness Amount:</th>
	      	  				<td>{{$vehicledetails->fitness->fitness_amt ? $vehicledetails->fitness->fitness_amt : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Valid From:</th>
	      	  				<td>{{$vehicledetails->fitness->valid_from ? $vehicledetails->fitness->valid_from : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Expiry Date:</th>
	      	  				<td>{{$vehicledetails->fitness->valid_till ? $vehicledetails->fitness->valid_till : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
      		</div>
      	</div>

      	<div id="roadtax" style="display: none;">
      		<div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>ROADTAX DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
      		<div class="row" >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no ? $vehicledetails->vch_no :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Agent Name:</th>
	      	  				<td>{{$vehicledetails->roadtax == null ? 'NO NAME' :$vehicledetails->roadtax->agent->agent_name}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Goods & Service Tax No:</th>
	      	  				<td>{{$vehicledetails->roadtax
	      	  					? $vehicledetails->roadtax->roadtax_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Receipt Date</th>
	      	  				<td>{{$vehicledetails->roadtax ? $vehicledetails->roadtax->receipt_date : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Road Tax Amount:</th>
	      	  				<td>{{$vehicledetails->roadtax ? $vehicledetails->roadtax->roadtax_amt : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Receipt Id:</th>
	      	  				<td>{{$vehicledetails->roadtax ? $vehicledetails->roadtax->receipt_id : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Valid From:</th>
	      	  				<td>{{$vehicledetails->roadtax ? $vehicledetails->roadtax->valid_from : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Expiry Date:</th>
	      	  				<td>{{$vehicledetails->roadtax !=null ? ($vehicledetails->roadtax->expire_time == "LIFE TIME" ? $vehicledetails->roadtax->expire_time : $vehicledetails->roadtax->valid_till):''}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
      		</div>
      	</div>

      	<div id="insurance" style="display: none;">
      		<div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>INSURANCE DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
      		<div class="row" >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Agent Name:</th>
	      	  				<td>{{$vehicledetails->insurance->agent == null ? 'No Name' :$vehicledetails->insurance->agent->agent_name}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Insurance Company:</th>
	      	  				<td>{{$vehicledetails->insurance->insurance_company->comp_name ? $vehicledetails->insurance->insurance_company->comp_name : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Insurance Type</th>
	      	  				<td>{{$ins_type->type_name ? $ins_type->type_name : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Insured's Name:</th>
	      	  				<td>{{$vehicledetails->insurance->insured_name ? $vehicledetails->insurance->insured_name :'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>NCB Discount</th>
	      	  				<td>{{$vehicledetails->insurance->ncb_discount ? $vehicledetails->insurance->ncb_discount : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Insurance Policy No:</th>
	      	  				<td>{{$vehicledetails->insurance->ins_policy_no ? $vehicledetails->insurance->ins_policy_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Insurance Prev Policy No:</th>
	      	  				<td>{{$vehicledetails->insurance->ins_pre_policy_no ? $vehicledetails->insurance->ins_pre_policy_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Insurance Total Amount:</th>
	      	  				<td>{{$vehicledetails->insurance->ins_total_amt ? $vehicledetails->insurance->ins_total_amt : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Hypothecation Agreement:</th>
	      	  				<td>{{$vehicledetails->insurance->hypothecation_agreement ? $vehicledetails->insurance->hypothecation_agreement : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Valid From:</th>
	      	  				<td>{{$vehicledetails->insurance->valid_from ? $vehicledetails->insurance->valid_from : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Expiry Date:</th>
	      	  				<td>{{$vehicledetails->insurance->valid_till ? $vehicledetails->insurance->valid_till : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
      		</div>
      	</div>

      	<div id="permit" style="display: none;">
      		<div class="container">
	        	<div class="row">
	        		<table class="table" style="max-width: 1110px;">
	        			<tr><th style="font-size: 25px;"><center><b><i>PERMIT DETAILS</i></b></center></th></tr>
	        		</table>
	        	</div>
            </div>
      		<div class="row" >
	      	  	<div class="col-md-1"></div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>Vehicle No:</th>
	      	  				<td>{{$vehicledetails->vch_no}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Agent Name:</th>
	      	  				<td>{{$vehicledetails->permit->agent == null ? 'No Name' :$vehicledetails->permit->agent->agent_name}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Permit No:</th>
	      	  				<td>{{$vehicledetails->permit->permit_no ? $vehicledetails->permit->permit_no : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Permit Amount:</th>
	      	  				<td>{{$vehicledetails->permit->permit_amt ? $vehicledetails->permit->permit_amt : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
	      	  	<div class="col-md-5">
	      	  		<table class="table">
	      	  			<tr>
	      	  				<th>State:</th>
	      	  				<td>{{$vehicledetails->permit->valid_from}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>All India Permit:</th>
	      	  				<td>{{$vehicledetails->permit->all_india_permit == '0' ? 'NO' : 'YES'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Valid From:</th>
	      	  				<td>{{$vehicledetails->permit->valid_from ? $vehicledetails->permit->valid_from : 'NO RECORD'}}</td>
	      	  			</tr>
	      	  			<tr>
	      	  				<th>Expiry Date:</th>
	      	  				<td>{{$vehicledetails->permit->valid_till ? $vehicledetails->permit->valid_till :'NO RECORD'}}</td>
	      	  			</tr>
	      	  		</table>
	      	  	</div>
      		</div>
      	</div>

      </div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
    $('#file1').change(function() {
       $('#target1').submit();
      });
    $('#file2').change(function() {
       $('#target2').submit();
      });
    $('#vehicle_details').on('click',function(){
    	$('#registration').show();
    	$('#fitness').hide();
    	$('#roadtax').hide();
    	$('#puc').hide();
    	$('#rc').hide();
    	$('#insurance').hide();
    	$('#permit').hide();
    	$('#vehicle_details').addClass('active_nab');
    	$('#puc_details').removeClass('active_nab');
    	$('#rc_details').removeClass('active_nab');
    	$('#fitness_details').removeClass('active_nab');
    	$('#roadtax_details').removeClass('active_nab');
    	$('#insurance_details').removeClass('active_nab');
    	$('#permit_details').removeClass('active_nab');
    })
    $('#puc_details').on('click',function(){
    	$('#registration').hide();
    	$('#fitness').hide();
    	$('#rc').hide();
    	$('#roadtax').hide();
    	$('#puc').show();
    	$('#insurance').hide();
    	$('#permit').hide();
    	$('#puc_details').addClass('active_nab');
    	$('#vehicle_details').removeClass('active_nab');
    	$('#rc_details').removeClass('active_nab');
    	$('#fitness_details').removeClass('active_nab');
    	$('#roadtax_details').removeClass('active_nab');
    	$('#insurance_details').removeClass('active_nab');
    	$('#permit_details').removeClass('active_nab');
    })
    $('#rc_details').on('click',function(){
    	$('#registration').hide();
    	$('#fitness').hide();
    	$('#roadtax').hide();
    	$('#puc').hide();
    	$('#rc').show();
    	$('#insurance').hide();
    	$('#permit').hide();
    	$('#puc_details').removeClass('active_nab');
    	$('#vehicle_details').removeClass('active_nab');
    	$('#rc_details').addClass('active_nab');
    	$('#fitness_details').removeClass('active_nab');
    	$('#roadtax_details').removeClass('active_nab');
    	$('#insurance_details').removeClass('active_nab');
    	$('#permit_details').removeClass('active_nab');
    })
    $('#fitness_details').on('click',function(){
    	$('#registration').hide();
    	$('#fitness').show();
    	$('#roadtax').hide();
    	$('#puc').hide();
    	$('#rc').hide();
    	$('#insurance').hide();
    	$('#permit').hide();
    	$('#puc_details').removeClass('active_nab');
    	$('#vehicle_details').removeClass('active_nab');
    	$('#rc_details').removeClass('active_nab');
    	$('#fitness_details').addClass('active_nab');
    	$('#roadtax_details').removeClass('active_nab');
    	$('#insurance_details').removeClass('active_nab');
    	$('#permit_details').removeClass('active_nab');
    })
    $('#roadtax_details').on('click',function(){
    	$('#registration').hide();
    	$('#fitness').hide();
    	$('#roadtax').show();
    	$('#puc').hide();
    	$('#rc').hide();
    	$('#insurance').hide();
    	$('#permit').hide();
    	$('#puc_details').removeClass('active_nab');
    	$('#vehicle_details').removeClass('active_nab');
    	$('#rc_details').removeClass('active_nab');
    	$('#fitness_details').removeClass('active_nab');
    	$('#roadtax_details').addClass('active_nab');
    	$('#insurance_details').removeClass('active_nab');
    	$('#permit_details').removeClass('active_nab');
    })
    $('#insurance_details').on('click',function(){
    	$('#registration').hide();
    	$('#fitness').hide();
    	$('#roadtax').hide();
    	$('#puc').hide();
    	$('#rc').hide();
    	$('#insurance').show();
    	$('#permit').hide();
    	$('#puc_details').removeClass('active_nab');
    	$('#vehicle_details').removeClass('active_nab');
    	$('#rc_details').removeClass('active_nab');
    	$('#fitness_details').removeClass('active_nab');
    	$('#roadtax_details').removeClass('active_nab');
    	$('#insurance_details').addClass('active_nab');
    	$('#permit_details').removeClass('active_nab');
    })
    $('#permit_details').on('click',function(){
    	$('#registration').hide();
    	$('#fitness').hide();
    	$('#roadtax').hide();
    	$('#puc').hide();
    	$('#rc').hide();
    	$('#insurance').hide();
    	$('#permit').show();
    	$('#puc_details').removeClass('active_nab');
    	$('#vehicle_details').removeClass('active_nab');
    	$('#rc_details').removeClass('active_nab');
    	$('#fitness_details').removeClass('active_nab');
    	$('#roadtax_details').removeClass('active_nab');
    	$('#insurance_details').removeClass('active_nab');
    	$('#permit_details').addClass('active_nab');
    })

});

</script>
@endsection