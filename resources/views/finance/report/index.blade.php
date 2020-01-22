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
                <h3>FINANCE REPORT</h3>
            </div>
            <div class="col-sm-6 col-md-6">
                {{-- <a class="btn btn-inverse pull-right" href="{{route('vehiclefinance.index')}}">Back</a> --}}
            </div>
              <div id="add-city-form">
               
                    <div class="row" style="margin-right:3%; margin-left: 3%;">
                      <div class="box-title" style="width: 45%;">
                         <h3> <i class="fa fa-bars"></i>SELECT REPORT</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                  <div class="card-body " >
                                    <div class="row">
                                      <div class="col-sm-12 col-md-12 col-xl-12" id="optradio1">
                                          <label><input type="radio" name="optradio1" id="optradio1"><span style="margin-left: 5px;">All Vehicle Instalment Details</span></label> 
                                      </div>
                                      <div class="col-sm-12 col-md-12 col-xl-12" id="optradio2">
                                          <label><input type="radio" name="optradio1" id="optradio2"><span style="margin-left: 5px;">Vehicle Finance Instalment Status</span></label> 
                                      </div>
                                      <div class="col-sm-12 col-md-12 col-xl-12" id="optradio3">
                                          <label><input type="radio" name="optradio1" id="optradio3" disabled><span style="margin-left: 5px;">Overall Vehicle Finance Summary</span></label> 
                                      </div>
                                      <div class="col-sm-12 col-md-12 col-xl-12" id="optradio4">
                                          <label><input type="radio" name="optradio1" id="optradio4" disabled><span style="margin-left: 5px;">Monthwise Vehicle Instalment Due</span></label> 
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="box-title" style="width: 45%;">
                         <h3> <i class="fa fa-bars"></i>SELECT REPORT CRITERIA</h3>
                            <div class="col-md-12 m-auto">
                                <div class="card" id="report1" style="display:none;">
                                  <form action="{{route('vehicle_installment')}}" method="post">
                                    @csrf
                                    <div class="card-body " >
                                      <div class="row" >
                                          <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                                            
                                            {{-- <div class="col-md-12 col-xl-12 mt-2">
                                                <label for="product_model">Vehicle No</label>
                                                <input id="product_model" class="form-control" name="product_model" value="" > 
                                            </div> --}}
                                            
                                            <div class="col-md-6 col-xl-6 mt-2">
                                                <label for="vch_ins_date_from">Date From</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                                <input id="vch_ins_date_from"  name="vch_ins_date_from" class="form-control datepicker" value="{{ old('vch_ins_date_from') }}">
                                            </div>

                                            <div class="col-md-6 col-xl-6 mt-2">
                                                <label for="vch_ins_date_to">Date To</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                                <input id="vch_ins_date_to"  name="vch_ins_date_to" class="form-control datepicker" value="{{ old('vch_ins_date_to') }}">
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                      	<div class="col-md-12 mt-3">
                                      		<center>
                                            <button class="btn btn-success" id="btn_generate1" type="submit">GENERATE</button>
                                          </center>
                                      	</div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                            <div class="col-md-12 m-auto">
                                <div class="card" id="report2" style="display:none;">
                                  <form action="{{route('vehicle_finance_installment')}}" method="post">
                                    @csrf
                                    <div class="card-body " >
                                      <div class="row">
                                          <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">                        
                                            <div class="col-md-12 col-xl-12 mt-2">
                                                <label for="vehicle_no">Vehicle No</label><span><i class="fa fa-car fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                                <select id="vehicle_no" required="true" name="vehicle_no" class="form-control">
                                                       <option value="0" >Select..</option>
                                                    @foreach ($vehicles as $vehicle)
                                                      <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 mt-3">
                                          <center><button class="btn btn-success" id="btn_generate2" type="submit" >GENERATE</button></center>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                            <center><button class="btn btn-success mt-5" disabled id="generate_btn">GENERATE</button></center>
                      </div>
                    </div>
               
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
	$('#optradio1').on('click',function(){
		$('#report1').show();
		$('#generate_btn').hide();
    $('#report2').hide();

	})
	$('#optradio2').on('click',function(){
		$('#report2').show();
		$('#generate_btn').hide();
    $('#report1').hide();
	})
})
 


</script>
@endsection
