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
                <h3>EXPENSES REPORTS</h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vehiclefinance.index')}}">Back</a>
            </div>
            <div id="add-city-form">
              <div class="row" style="margin-right:3%; margin-left: 3%;">
                <div class="box-title" style="width: 45%;">
                  <h3> <i class="fa fa-bars"></i>SELECT REPORT</h3>
                  <div class="col-md-12 m-auto">
                    <div class="card">
                      <div class="card-body " >
                        <div class="row">
                          <div class="col-sm-12 col-md-12 col-xl-12">
                              <label for="optradio1"><input type="radio" name="optradio1" id="optradio1"><span style="margin-left: 5px;">Vehicle Wise Expense Details</span></label> 
                          </div>
                          <div class="col-sm-12 col-md-12 col-xl-12">
                              <label for="optradio2"><input type="radio" name="optradio1" id="optradio2"><span style="margin-left: 5px;">Party Wise Expense Details</span></label> 
                          </div>
                          <div class="col-sm-12 col-md-12 col-xl-12">
                              <label for="optradio3"><input type="radio" name="optradio1" id="optradio3" disabled><span style="margin-left: 5px;">Vehicle Yearly Expense Done Summary</span></label> 
                          </div>
                          {{-- <div class="col-sm-12 col-md-12 col-xl-12">
                              <label><input type="radio" name="optradio1" id="optradio4"><span style="margin-left: 5px;">Expense Details By Type</span></label> 
                          </div> --}}
                          <div class="col-sm-12 col-md-12 col-xl-12">
                              <label for="optradio5"><input type="radio" name="optradio1" id="optradio5"><span style="margin-left: 5px;">Accident Register</span></label> 
                          </div>
                          <div class="col-sm-12 col-md-12 col-xl-12">
                              <label for="optradio6"><input type="radio" name="optradio1" id="optradio6" disabled><span style="margin-left: 5px;">Overall Expenses Done By Vehicle By Expense Type</span></label> 
                          </div>
                          <div class="col-sm-12 col-md-12 col-xl-12">
                              <label><input type="radio" name="optradio1" id="optradio7" disabled><span style="margin-left: 5px;">Vendor Expense Payment Datails</span></label> 
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
                    <div class="card">
                      <div class="card-body">
                        <div class="row" id="vehicle_report" style="display:none;">
                          <form class="well well1 " method="post" action="{{route('vehicle_report')}}"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">                          
                              <div class="col-md-12 col-xl-12 mt-2">
                                  <label for="report_vehicle_no">Vehicle No</label><span><i class="fa fa-car fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <select id="report_vehicle_no" required="true" name="report_vehicle_no" class="form-control">
                                         <option value="0" >Select..</option>
                                      @foreach ($vehicles as $vehicle)
                                        <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
                                      @endforeach 
                                  </select>
                              </div>
                              
                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="report_vehicle_date_from">Date From</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="report_vehicle_date_from"  name="report_vehicle_date_from" class="form-control datepicker" value="{{ old('report_vehicle_date_from') }}">
                              </div>

                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="report_vehicle_date_to">Date To</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="report_vehicle_date_to"  name="report_vehicle_date_to" class="form-control datepicker" value="{{ old('report_vehicle_date_to') }}">
                              </div>
                              <div class="col-md-6 col-xl-6 mt-2">
                                <center><button class="btn btn-success" type="submit" id="vch_report" >GENERATE</button> </center>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="row" id="party_report" style="display:none;">
                          <form class="well well1 " method="post" action="{{route('vehicle_party_report')}}"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                              
                              <div class="col-md-12 col-xl-12 mt-2">
                                  <label for="party_name">Party Name</label><span><i class="fa fa-users fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <select id="party_name" required="true" name="party_name" class="form-control">
                                           <option value="0" >Select..</option>
                                        @foreach ($parties as $party)
                                          <option value="{{$party->job_by}}">{{$party->job_by}}</option>
                                        @endforeach 
                                    </select>
                              </div>
                              
                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="party_date_from">Date From</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="party_date_from"  name="party_date_from" class="form-control datepicker" value="{{ old('party_date_from') }}">
                              </div>

                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="party_date_to">Date To</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="party_date_to"  name="party_date_to" class="form-control datepicker" value="{{ old('party_date_to') }}">
                              </div>
                              <div class="col-md-6 col-xl-6 mt-2">
                                <center><button class="btn btn-success" type="submit" >GENERATE</button></center>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="row" id="vehicle_yearly_report" style="display:none;">
                          <form class="well well1 " method="post" action="{{route('vehicle_yearly_report')}}"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                              
                              <div class="col-md-12 col-xl-12 mt-2">
                                  <label for="vehicle_yearly_no">Vehicle No.</label><span><i class="fa fa-car fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="vehicle_yearly_no" class="form-control" name="vehicle_yearly_no" value="" > 
                              </div>
                              <div class="col-md-6 col-xl-6 mt-2">
                                <center><button class="btn btn-success" type="submit">GENERATE</button></center>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="row" id="accident_report" style="display:none;">
                          <form class="well well1 " method="post" action="{{route('accident_report')}}"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                              
                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="accident_vehicle_no">Vehicle No.</label><span><i class="fa fa-car fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <select id="accident_vehicle_no" required="true" name="accident_vehicle_no" class="form-control">
                                         <option value="0" >Select..</option>
                                      @foreach ($vehicles as $vehicle)
                                        <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
                                      @endforeach 
                                  </select> 
                              </div>
                               <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="accident_city">Accident City</label><span><i class="fa fa-city fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <select id="accident_city" required="true" name="accident_city" class="form-control">
                                         <option value="0" >Select..</option>
                                      @foreach ($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                      @endforeach 
                                  </select> 
                              </div>
                              {{-- <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="accident_driver">Driver Name</label><span><i class="fa fa-users fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <select id="accident_driver" required="true" name="accident_driver" class="form-control">
                                         <option value="0" >Select..</option>
                                      @foreach ($drivers as $driver)
                                        <option value="{{$driver->driver_name}}">{{$driver->driver_name}}</option>
                                      @endforeach 
                                  </select>
                              </div>
                               --}}
                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="accident_date_from">Date From</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="accident_date_from"  name="accident_date_from" class="form-control datepicker" value="{{ old('accident_date_from') }}">
                              </div>

                              <div class="col-md-6 col-xl-6 mt-2">
                                  <label for="accident_date_to">Date To</label><span><i class="fa fa-calendar fa-lg" style="color:grey;margin-left: 6px"></i></span>
                                  <input id="accident_date_to"  name="accident_date_to" class="form-control datepicker" value="{{ old('accident_date_to') }}">
                              </div>
                              <div class="col-md-6 col-xl-6 mt-2">
                                <center><button class="btn btn-success" type="submit">GENERATE</button></center>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <center><button class="btn btn-success" disabled id="generate_btn">GENERATE</button></center>
                            <center>
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
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
    $(function() {
        $( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
     });
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
        var state_id = $('#customer_state_id').val();
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

  $('#optradio1').on('click',function(){
    
    $('#generate_btn').hide();
    $('#vehicle_report').show();
    $('#party_report').hide();
    $('#vehicle_yearly_report').hide();
    $('#accident_report').hide();

  })
  $('#optradio2').on('click',function(){
    $('#generate_btn').hide();
    $('#vehicle_report').hide();
    $('#party_report').show();
    $('#vehicle_yearly_report').hide();
    $('#accident_report').hide();
  })
  $('#optradio3').on('click',function(){
    $('#generate_btn').hide();
    $('#vehicle_report').hide();
    $('#party_report').hide();
    $('#vehicle_yearly_report').show();
    $('#accident_report').hide();
  })
  $('#optradio5').on('click',function(){
    $('#generate_btn').hide();
    $('#vehicle_report').hide();
    $('#party_report').hide();
    $('#vehicle_yearly_report').hide();
    $('#accident_report').show();
  })
})
 


</script>
@endsection
