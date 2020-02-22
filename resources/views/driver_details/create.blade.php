@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3> DRIVER DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('driver.index')}}">Back</a>
            </div>
              <div id="add-city-form">
                <form class="well form-horizontal" method="post" action="{{route('driver.store')}}"  enctype="multipart/form-data">
                    {{csrf_field()}}
                  <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">                             
                            <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Driver Name</label>
                                @error('name')
		                            <span class="invalid-feedback d-block pull-right" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                            @enderror
                                <input id="vehicle_no" class="form-control" name="name" value="{{old('name')}}" > 
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="vch_id">Vehicle No.</label>
                                <select id="vch_id" name="vch_id" class="selectpicker form-control">
                                  <option value="0">Select Vehicles..</option>
                                  @foreach($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
                                  @endforeach   
                                    </select>
                                @error('vch_id')
                                <span class="invalid-feedback d-block pull-right" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="No Of Tyres">Address</label>
                                <input type="text" id="address" type="text" name="address" class="form-control" value="{{old('address')}}">
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="salary">Salary</label>
                                 <input id="salary" name="salary" class="form-control  " value="{{old('salary')}}">
                                  @error('salary')
                                    <span class="invalid-feedback d-block" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                               <label for="vehicle_model ">State</label>
                                   <select id="state_id" name="state_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($state as $states)
                                        	<option {{ old('state_id') ==  $states->id ? 'selected' : ''}} value="{{$states->id}}">{{$states->state_name}}</option>
                                        @endforeach		
                                    </select>          
                                    @error('state_id')
                                      <span class="invalid-feedback d-block" role="alert">
                                         <strong>{{ 'Please select state' }}</strong>
                                      </span>
                                   @enderror                          
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="vehicle_model ">City</label>
                                   <select name="city_id" id="city_id" class="selectpicker form-control">
                                        <option selected="true" disabled="true">Select..</option>
                                   </select>
                                    @error('city_id')
                                      <span class="invalid-feedback d-block" role="alert">
                                         <strong>{{ 'Please select city' }}</strong>
                                      </span>
                                   @enderror    
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Mobile No</label>
                                <input id="email" name="phone" class="form-control  " value="{{old('phone')}}">
                                @error('phone')
  		                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
    		                        @enderror
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Licence No</label>
                                <input id="email1" class="form-control  " name="license_no" value="{{old('license_no')}}">
                                @error('license_no')
    		                            <span class="invalid-feedback d-block" role="alert">
    		                               <strong>{{ $message }}</strong>
    		                            </span>
    		                        @enderror
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="KM Reading">Licence Exp.Date </label>
                                <input id="email1" readonly="true" class="form-control datepicker" type="text" name="license_exp" value="{{old('license_exp')}}">
                                 @error('license_exp')
    		                            <span class="invalid-feedback d-block" role="alert">
    		                               <strong>{{ $message }}</strong>
    		                            </span>
    		                         @enderror
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="Regi. Date"> Join Date</label>
                                <input id="email1" type="text" readonly="true" class="form-control datepicker" name="joined_dt" value="{{old('joined_dt')}}">
                            </div> 
                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for=" D. Tank Capacity">Blood Group</label>
                                <input id="email" name="blood_group" type="text" class="form-control  " value="{{old('blood_group')}}">
                            </div>
                            <div class="col-md-6 col-xl-6 " style="margin-top: -53px;">
                                <label for="is_active">Is Working</label><br>
                               Yes <input type="radio" id="email1"  name="is_active" value="1">
                                No <input type="radio" id="email1" name="is_active" value="0">
                            </div>
                            <div class="col-md-6 col-xl-6 mt-2">
                                <label for="IMEI Number">Photo</label><br>
                                <input type="file" id="image" name="image" value="" class="image">
                                @error('image')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                            @enderror
                            </div>
                            <div class="col-md-2 col-xl-2 mt-4">
                                <table class="table">
                                  <tr>
                                    <th><center>Driver Image</center></th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div  class="image">
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                        </div>   
                        <div class="col-md-6" style="margin-top: 24px;">
                         	 <input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
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
<script type="text/javascript">
  $(document).ready( function () {$(function() {
    $( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
    });
    $('#myTable').DataTable();
    
    $('#state_id').on('change',function(){
        var state_id = $('#state_id').val();
        $.ajax({
                url: "/drivercity",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':state_id},
                success: function (data) {
                   $('#city_id').html(data);
                }
            })
       })
    $(".image").change(function () {
        var img_id = $(this).attr('id');
        filePreview(this,img_id);
    });
	});


  function filePreview(input,img_id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+img_id+' + img').remove();
            $('.'+img_id).html('<img src="'+e.target.result+'" width="100" height="100"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection