@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD PARTY INFORMATION</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('party.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('party.store')}}">
              {{csrf_field()}}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	
			                <div class="row">    
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="party_name">Party Name </label>
	                                
	                                <input id="party_name" class="form-control" name="party_name" value="{{old('party_name')}}" > 
	                                @error('party_name')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{$message}}</strong>
			                            </span>
			                         @enderror
	                            </div>	

		                        <div class="col-md-4 col-xl-4 mt-2">
	                               <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Mobile No</label>	                                
	                                <input id="phone" class="form-control" name="phone" value="{{old('phone')}}" > 
	                                @error('phone')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter phone number(Max:10 , Min:10)' }}</strong>
			                            </span>
			                         @enderror  
		                        </div>    

		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="party_type">Expenses Type</label><span style="font-size:10px;"><button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#exampleModal" style="margin-left: 188px;"></button></span>
	                                <select id="party_type"  name="party_type" class="selectpicker form-control">
			                            <option value="">Select..</option>
			                            @foreach($exp_type as $data)
			                               <option value="{{$data->expense_type}}">{{$data->expense_type}}</option>
			                            @endforeach     
			                        </select> 
	                                @error('party_type')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
                                         
				            </div>
				             <div class="row">
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="landline_no">Land-Line No</label>
	                                
	                                <input id="landline_no" class="form-control" name="landline_no" value="{{old('landline_no')}}" > 
	                                @error('landline_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter landline No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>   
			                	
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="mobile_no">Alternative Mobile No</label>
	                                
	                                <input id="alt_mobile_no" class="form-control" name="alt_mobile_no" value="{{old('alt_mobile_no')}}" > 
	                                @error('alt_mobile_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Alternative mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                     
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <label for="party_website">Website</label>
	                                
	                                <input id="party_website" class="form-control" name="party_website" value="{{old('party_website')}}" > 
	                                @error('party_website')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Website name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
	                         </div>

 							<div class="row">     
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="party_email">Email ID</label>                            
	                                <input id="party_email" type="email" class="form-control" name="party_email" value="{{old('party_email')}}" > 
	                                @error('party_email')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter party email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                         <div class="col-md-4 col-xl-4 mt-2">
				                   <label class="">{{-- <span style="color: #FF0000;font-size:15px;">*</span> --}}Select State</label>		                    
			                       <select id="party_state"  name="party_state" class="selectpicker form-control">
			                            <option value="">Select..</option>
			                            @foreach($state as $State)
			                               <option value="{{$State->id}}">{{$State->state_name}}</option>
			                            @endforeach     
			                        </select>
			                        @error('party_state')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                                <strong>{{ 'Please Select state' }}</strong>
			                            </span>
			                        @enderror
					            </div>
				                <div class="col-md-4 col-xl-4 mt-2">
				                   <label class="">{{-- <span style="color: #FF0000;font-size:15px;">*</span> --}}Select City</label>		                    
			                       <select id='party_city' name="party_city" class="selectpicker form-control">
			                            <option value="" selected=" true " >Select..</option>     
			                        </select>
			                        @error('party_city')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select city' }}</strong>
			                              </span>
			                          @enderror
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
      	<form action="{{url('/add_expense_in_party')}}" method="post">
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
		$('#party_state').on('change',function(){
        var vch_comp = $('#party_state').val();
        $.ajax({
                url: "{{route('petrolpump.get_city')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':vch_comp},
                success: function (data) {
                    $('#party_city').html(data);
                }
            })
    })
	
})
</script>
@endsection