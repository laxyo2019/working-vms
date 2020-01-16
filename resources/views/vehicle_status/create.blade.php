@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD VEHICLE STATUS</h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vch_status.index')}}">Back</a>
            </div>
            <div id="add-state-form">
               <form class="form-horizontal" method="post" action="{{route('vch_status.store')}}">
                {{csrf_field()}}
                  	<div class="row">
                  		<div class="col-md-3 col-xl-3 mt-2"></div>
                   		<div class="col-md-6 col-xl-6 mt-2">
	                        <span style="color: #FF0000;font-size:15px;">*</span> <label for="vch_id">Vehicle No.</label>
	                         <div class="inputGroupContainer">
	                           <div class="input-group">
	                              <select id="vch_id" name="vch_id" class="selectpicker form-control">
	                                 <option value="0">Select..</option>
	                                @foreach($vehicles as $vehicle)
	                                    <option value="{{$vehicle->id}}">{{$vehicle->vch_no}}</option>
	                                @endforeach    
	                              </select>
	                            </div>
	                        </div> 
	                        @error('vch_id')
	                          <span class="text-danger pull-right" role="alert">
	                              <strong style="font-size: smaller;">{{ "Please enter vehicle company" }}</strong>
	                          </span>
	                        @enderror
                    	</div>
                  	</div>
                  	<div class="row mt-4">
                  		<div class="col-md-12">
                  			<div class="card" >
          							  <div class="card-body">
          							    <h5 class="card-title"><b><i>Vehicle Status</i></b></h5>
          							    <br>
          							    <div class="col-md-3 col-xl-3 ">
                             		<input type="radio" id="email1"  name="status" value="Running"><span><b>&nbsp&nbsp Running</b></span>
                          	</div>
                          	<div class="col-md-3 col-xl-3 ">
                             		<input type="radio" id="email1"  name="status" value="StandBy"><span><b>&nbsp&nbsp StandBy</b></span>
                          	</div>
                          	<div class="col-md-3 col-xl-3 ">
                             		<input type="radio" id="email1"  name="status" value="Unloaded"><span><b>&nbsp&nbsp Unloaded</b></span>
                          	</div>
                          	<div class="col-md-3 col-xl-3 ">
                             		<input type="radio" id="email1"  name="status" value="Repair"><span><b>&nbsp&nbsp Repair/Maintenance</b></span>
                          	</div>
          							  </div>
          							</div> 
                  		</div>
                  	</div>                         
                    <div class="row">         
                      <div class="col-sm-12 col-sm-10 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
  $(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
@endsection