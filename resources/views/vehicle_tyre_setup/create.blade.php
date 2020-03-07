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
                <h3>ADD VEHICLE</h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vehicledetails.index')}}">Back</a>
            </div>
              <div id="add-city-form">
                <form class="well well1 form-horizontal" method="post" action="{{route('vehicledetails.store')}}"  enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="col-md-4 col-xl-4 mt-2 vch">
                       <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Vehicle No.</label>   

                       <select id="vch_id" name="vch_no" class="selectpicker form-control">
                        <option value="0">Select Vehicles..</option>
                        @foreach($vehicles as $vehicle)
                          <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
                        @endforeach   
                          </select> 
                        @error('vch_no')
                          <span class="invalid-feedback d-block pull-right" role="alert">
                             <strong>{{ 'Please Select vehicle number' }}</strong>
                          </span>
                       @enderror  
                    </div>    
                    <div class="form-group">
                    </div>
                    <div class="row">
                      <div class="box-title" style="width: 100%;">
                         <h3> <i class="fa fa-bars"></i>VEHICLE TYRE INFORMATION </h3>
                            <div class="col-md-12 m-auto">
                                <div class="card">
                                    <div class="card-body " >
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                                                
                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label>Tyre-Number</label>
                                                    <input class="form-control" name="tyre_no[]" value="" > 
                                                </div>
                                                
                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label>Tyre Position</label>
                                                    <select name="tyre_positon[]" class="selectpicker form-control">
                                                      <option value="0">Select Tyre Position..</option>
                                                      <option value="1">Front-Left</option>
                                                      <option value="2">Front-Right</option>
                                                      <option value="3">Back-Left</option>
                                                      <option value="4">Back-Right</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3 col-xl-3 mt-2">
                                                    <label>Tyre Description</label>
                                                    <input type="text" name="tyre_des[]" class="form-control" value="{{ old('reg_seating_capacity') }}">
                                                </div>
                                                <div class="col-md-2 col-xl-2 mt-2">
                                                    <label>Tyre Expire KM</label>
                                                    <input type="number" name="tyre_exp_km[]" class="form-control" value="{{ old('reg_seating_capacity') }}">
                                                </div>
                                                <div class="col-md-1 mt-5">
                                                  <button type="button" class="btn btn-success fa fa-plus " id="add_exp"></button>
                                                </div>
                                            </div> 
                                        </div>
                                         <div id="field">
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
   var x =1;
  $('#add_exp').on('click',function(){
      // var id =$(".multi_rows").attr('id');
                      
    $('#field').append('<div class="multi_rows row mt-2" id="'+x+'"><div class="col-md-3 col-xl-3 mt-2"><label>Tyre Number</label><input class="form-control" name="tyre_no[]"></div><div class="col-md-3 col-xl-3 mt-2"><label>Tyre Position</label><select class="selectpicker form-control"><option value="0">Select Tyre Position</option><option value="1">Front-Left</option><option value="2">Front-Right</option><option value="3">Back-Left</option value="4"><option>Back-Right</option></select></div><div class="col-md-3 col-xl-3 mt-2"><label>Tyre Description</label><input class="form-control" name="tyre_des[]"></div><div class="col-md-2 col-xl-2 mt-2"><label>Tyre Expire KM</label><input class="form-control" name="tyre_exp_km[]" type="number"></div><div class="col-md-1 mt-5"><button type="button" class="btn btn-danger fa fa-minus remove_button" data-id="'+x+'"></button></div></div>');
      x++;
  });


  $(document).on('click','.remove_button',function(){
    var id = $(this).attr('data-id');
    // $(this).parent('div').remove();
      $('#'+id).remove();   
  });
});

</script>
@endsection
