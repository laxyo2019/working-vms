@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>TYRE STOCK DETAILS</h3>

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
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_number">TYRE NUMBER</label>
                                  <input id="tyre_number" name="tyre_number" class="form-control  " value="{{old('tyre_number')}}">
                                  @error('tyre_number')
                                  <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ 'Please select  Tyre Type' }}</strong>
                                  </span>
                                 @enderror                               
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="status">STATUS</label>
                                  <select id="status" name="status"  class="form-control">
                                     <option value="0">Select..</option>
                                     <option value="1">IN STOCK</option>
                                     <option value="2">ON VEHICLE</option>
                                     <option value="3">ISSUED</option>
                                     <option value="4">SCRAPPED</option>
                                  </select>
                                  @error('status')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2" id="number" style="display: none;">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="vehicle_number">VEHICLE NUMBER</label>
                                  <select id="vehicle_number" name="vehicle_number"  class="form-control">
                                     <option value="0">Select..</option>
                                  </select>
                                  @error('vehicle_number')
                                  <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ 'Please select  Vehicle Number' }}</strong>
                                  </span>
                                 @enderror                               
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_rate">NSD</label>
                                  <input id="stock_nsd" name="stock_nsd" class="form-control  " value="{{old('stock_nsd')}}">
                                  @error('stock_nsd')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                  <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_rate">RATE</label>
                                  <input id="tyre_rate" name="tyre_rate" class="form-control  " value="{{old('tyre_rate')}}">
                                  @error('tyre_rate')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                              <div class="col-md-4 col-xl-4 mt-5 ">
                                                                    
                              </div>
                           	</div>{{-- 
                            <div class="row mt-4">
                                <div class="col-md-12"> 
                                  <div class="card"  style="height: 400px;">
                                    <div class="card-body">
                                    
                                  </div>
                                </div>
                              </div>
                            </div> --}}
                  			     <div class="row">       
                           	  <div class="col-md-12 text-center"  style="margin-top: 24px;">
                                <button class="btn btn-success" type="submit" id="submit1">Add To Stock</button>
                           		{{--  <input  style="margin-right: -8px;" type="submit" id="submit1" value="Submit" class="btn btn-primary active "> --}}
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
    $('#status').change(function(){
     var value = $(this).val()
     if(value == 2){
      $('#number').show();
     }else{
      $('#number').hide();
     }
    });
  });
</script>

@endsection