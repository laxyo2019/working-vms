@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>SPARE PURCHASE ORDER DETAILS </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('tyre_purchase.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" id="create_form1" action="">
              {{ csrf_field() }}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">               
                            
                            <div class="row">
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_comp_name">TYRE COMPANY NAME</label>
                                  <select id="tyre_comp_name" name="tyre_comp_name"  class="form-control">
                                     <option value="0">Select..</option>
                                  </select>
                                  @error('tyre_comp_name')
                                  <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ 'Please select Tyre Company Name' }}</strong>
                                  </span>
                                 @enderror                               
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_type_name">TYRE TYPE</label>
                                  <select id="tyre_type_name" name="tyre_type_name"  class="form-control">
                                     <option value="0">Select..</option>
                                  </select>
                                  @error('tyre_type_name')
                                  <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ 'Please select  Tyre Type' }}</strong>
                                  </span>
                                 @enderror                               
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_condition">TYRE CONDITION</label>
                                  <select id="tyre_condition" name="tyre_condition"  class="form-control">
                                     <option value="0">Select..</option>
                                     <option value="1">NEW TYRE </option>
                                     <option value="2">OLD TYRE</option>
                                     <option value="3">REMOLDED TYRE</option>
                                     <option value="4">REJECTED TYRE</option>
                                     <option value="5">CUT REPAIRED TYRE</option>
                                  </select>
                                  @error('tyre_type_name')
                                  <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ 'Please select  Tyre Type' }}</strong>
                                  </span>
                                 @enderror                               
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="vehicle_nmber">TYRE NUMBER</label>
                                  <select id="tyre_number" name="tyre_number"  class="form-control">
                                     <option value="0">Select..</option>
                                  </select>
                                  @error('tyre_number')
                                  <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ 'Please select  Tyre Type' }}</strong>
                                  </span>
                                 @enderror                               
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_rate">STATUS</label>
                                  <input id="status" name="status" class="form-control  " value="{{old('status')}}">
                                  @error('status')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_rate">NSD</label>
                                  <input id="stock_nsd" name="stock_nsd" class="form-control  " value="{{old('stock_nsd')}}">
                                  @error('stock_nsd')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_rate">RATE</label>
                                  <input id="tyre_rate" name="tyre_rate" class="form-control  " value="{{old('tyre_rate')}}">
                                  @error('tyre_rate')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                           	</div>
                  			<div class="row">       
                           	<div class="col-md-12 text-center"  style="margin-top: 24px;">
                           		<input  style="margin-right: -8px;" type="submit" id="submit1" value="Submit" class="btn btn-primary active ">
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

<div id="MyPopup" class="modal fade" style="padding-top: 164px;" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	
               	<button type="button" class="close" data-dismiss="modal">
                    &times;</button>
   		    </div>
            <div class="modal-body">
            	
            	
            </div>
            <div class="modal-footer">
            	 <button type="button" class="btn btn-danger" id="submit">
                    Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Close</button>               
            </div>
        </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

@endsection