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
            <div class="col-sm-12 col-md-12">
                <h3>ADD VEHICLE</h3><span class="pull-right"><a class="btn btn-inverse pull-right" href="{{route('vch_tyre.index')}}">Back</a></span>
            </div>
              <div id="add-city-form">
                <form class="well well1 form-horizontal" method="post" action="{{route('vch_tyre.store')}}"  enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="col-md-4 col-xl-4 mt-2 vch">
                       <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Vehicle No.</label>   

                       <select id="vch_id" name="vch_no" class="selectpicker form-control">
                        <option value="0">Select Vehicles..</option>
                        @foreach($vehicles as $vehicle)
                          <option value="{{$vehicle->id}}">{{$vehicle->vch_no ? $vehicle->vch_no : 'NO RECORD'}}</option>
                        @endforeach   
                          </select> 
                        @error('vch_no')
                          <div class="text-danger">
                              <span class="font-weight-bold"> {{$message}}</span>
                          </div>
                        @enderror
                    </div>  
                    <div id="vch_type_data">
                    </div>  
                    <div class="form-group">
                    </div>
                    <div class="row">
                      <div class="box-title" style="width: 100%;">
                        <div class="row">
                          <h3> <i class="fa fa-bars"></i>VEHICLE TYRE INFORMATION </h3>
                        </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body " >
                                        <div class="row">                            
                                          <div class="col-md-2 col-xl-2 mt-2">
                                              <label>Tyre-Number</label>
                                              <input class="form-control" name="tyre_no[]" value="" > 
                                          </div>
                                          
                                          <div class="col-md-2 col-xl-2 mt-2">
                                              <label>Tyre Position</label>
                                              <select name="tyre_position[]" class="selectpicker form-control" value="">
                                                <option value="">Select Position</option>
                                                <option value="Front-Left">Front-Left</option>
                                                <option value="Front-Right">Front-Right</option>
                                                <option value="Rear-Left">Rear-Left</option>
                                                <option value="Rear-Right">Rear-Right</option>
                                              </select>
                                          </div>

                                          <div class="col-md-3 col-xl-3 mt-2">
                                              <label>Tyre Description</label>
                                              <input type="text" name="tyre_des[]" class="form-control" value="">
                                          </div>
                                          <div class="col-md-3 col-xl-3 mt-2">
                                              <label>Vehicle Current Km.</label>
                                              <input type="number" name="vch_cur_km[]" class="form-control" value="">
                                          </div>
                                          <div class="col-md-2 col-xl-2 mt-2">
                                              <label>Tyre Expire KM</label><span class="pull-right"><button type="button" class="btn-success fa fa-plus " id="add_exp"></button></span>
                                              <input type="number" name="tyre_exp_km[]" class="form-control" value="">
                                          </div>
                                        </div>
                                         <div id="field">
                                         </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="box-title" style="width: 100%;">
                        <div class="row">
                          <h3> <i class="fa fa-bars"></i>VEHICLE OTHER ACCESSORIES INFORMATION </h3>
                        </div>
                        <div class="row">
                          <div class="col-md-12 m-auto">
                              <div class="card">
                                  <div class="card-body " >
                                      <div class="row">                               
                                              <div class="col-md-4 col-xl-4 mt-2">
                                                  <label>Material-Qty</label>
                                                  <input type="number" name="material_qty[]" class="form-control" value="">
                                                 
                                              </div>
                                              <div class="col-md-4 col-xl-4 mt-2">
                                                  <label>Material-Name</label>
                                                  <input class="form-control" name="material_name[]" value="" > 
                                              </div>
                                              <div class="col-md-4 col-xl-4 mt-2">
                                                  <label>Material-Description</label><span class="pull-right"><button type="button" class="btn-success fa fa-plus " id="add_material"></button></span>
                                                  <input type="text" name="material_des[]" class="form-control" value="">
                                              </div>
                                      </div>
                                       <div id="material">
                                       </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>    
                          <div class="form-group">
                            <div class="col-md-12" style="margin-top: 4px;">
                              <input style="margin-left: 500px;margin-bottom:-100px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
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

<script>
  @if($message = Session::get('warning'))
    alert('{{$message}}');
  @endif
</script>
<script type="text/javascript">
  $(document).ready( function () {
   var x =1;
  $('#add_exp').on('click',function(){
      // var id =$(".multi_rows").attr('id');
                      
    $('#field').append('<div class="multi_rows row mt-2" id="'+x+'"><div class="col-md-2 col-xl-2 mt-2"><label>Tyre Number</label><input class="form-control" name="tyre_no[]"></div><div class="col-md-2 col-xl-2 mt-2"><label>Tyre Position</label><select class="selectpicker form-control" name="tyre_position[]" value=""><option value="">Select Position</option><option value="Front-Left">Front-Left</option><option value="Front-Right">Front-Right</option><option value="Rear-Left">Rear-Left</option ><option value="Rear-Right">Rear-Right</option></select></div><div class="col-md-3 col-xl-3 mt-2"><label>Tyre Description</label><input class="form-control" name="tyre_des[]"></div><div class="col-md-3 col-xl-3 mt-2"><label>Vehicle Current Km.</label><input class="form-control" name="vch_cur_km[]" type=""></div><div class="col-md-2 col-xl-2 mt-2"><label>Tyre Expire KM</label><span class="pull-right"><button type="button" class="btn-danger fa fa-minus remove_button" data-id="'+x+'"></button></span><input class="form-control" name="tyre_exp_km[]" type="number"></div></div>');
      x++;
  });


  $(document).on('click','.remove_button',function(){
    var id = $(this).attr('data-id');
    // $(this).parent('div').remove();
      $('#'+id).remove();   
  });

   var y =1;
  $('#add_material').on('click',function(){
    $('#material').append('<div class="multi_rows row mt-2" id="'+y+'"><div class="col-md-4 col-xl-4 mt-2"><label>Material-Qty</label><input type="number" class="form-control" name="material_qty[]"></div><div class="col-md-4 col-xl-4 mt-2"><label>Material-Name</label><input class="form-control" name="material_name[]"></div><div class="col-md-4 col-xl-4 mt-2"><label>Material-Description</label><span class="pull-right"><button type="button" class="btn-danger fa fa-minus remove_material_button" data-id="'+y+'"></button></span><input class="form-control" name="material_des[]" ></div></div>');
      y++;
  });


  $(document).on('click','.remove_material_button',function(){
    var id = $(this).attr('data-id');
    // $(this).parent('div').remove();
      $('#'+id).remove();   
  });
});
$('#vch_id').on('change',function(){
    var id = $(this).val();
    if(id >0){
      $.ajax({
            url: '/vch_type_info',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(res) {
               $('#vch_type_data').html('<div class="col-md-4 mt-2"><label>Vehicle Type</label><input class="form-control" readonly value="'+res.type.vch_type+'"></div><div class="col-md-4 mt-2"><label>Total Wheels</label><input class="form-control" readonly value="'+res.reg_no_tyres+'"></div>');
            }
        })
    }
  });
</script>
@endsection
