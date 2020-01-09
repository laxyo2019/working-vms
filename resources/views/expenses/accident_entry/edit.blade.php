@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
           <div class="box-title">
               <div class="col-sm-6 col-md-6">
                   <h3>ACCIDENT DETAILS </h3>

               </div>
               <div class="col-sm-6 col-md-6">
                   <a class="btn btn-inverse pull-right" href="{{route('accident_entry.index')}}">Back</a>
               </div>
               <div id="add-city-form">
                  <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('accident_entry.update',$accidents->id)}}">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                      <div class="card-body " >
                          <div class="row">
                              <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                 <div class="row">

                                    <div class="col-md-4 col-xl-4 mt-2">
                                      <span style="color: #FF0000;font-size:15px;">*</span><label class="">Accident No.</label>                         
                                     <input id="accident_no" class="form-control datepicker" readonly="true" name="accident_no" value="{{$accidents->accident_no}}" > 
                                       
                                  </div>
                                  <div class="col-md-4 col-xl-4 mt-2">
                                         <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No."> Entry Date </label>
                                         <input id="entry_date" class="form-control datepicker" readonly="true" name="entry_date" value="{{$accidents->entry_date}}" >
                                         @error('entry_date')
                                          <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Select Entry Date' }}</strong>
                                          </span>
                                       @enderror
                                     </div>
                                     <div class="col-md-4 col-xl-4 mt-2">
                                        <label for="Vehicle No.">Case No</label>
                                         <input id="case_no" class="form-control" readonly="true" name="case_no" value="{{$accidents->case_no}}" > 
                                         @error('case_no')
                                          <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Insert Case No' }}</strong>
                                          </span>
                                        @enderror                                      
                                    </div>
                                  <div class="col-md-4 col-xl-4 mt-2">
                                    <span style="color: #FF0000;font-size:15px;">*</span>  <label class="">Vehicle NO</label>                        
                                      <select id='vehicle_no' name="vehicle_no" class="selectpicker form-control">
                                           <option value="0" selected=" true " >Select..</option>
                                           @foreach($vehicles as $vehicle)
                                           <option value="{{$vehicle->id}}" {{ $vehicle->id == $accidents->vehicle_no ? 'selected':''}}>{{$vehicle->vch_no}}</option>
                                           @endforeach  
                                       </select>
                                       @error('vehicle_no')
                                             <span class="invalid-feedback d-block pull-right" role="alert">
                                                 <strong>{{ 'Please select vehicle number' }}</strong>
                                             </span>
                                         @enderror
                                  </div>
                                  <div class="col-md-4 col-xl-4 mt-2">
                                         <span style="color: #FF0000;font-size:15px;">*</span><label for="accident_date">Accident Date</label>
                                         
                                         <input id="accident_date" class="form-control datepicker" name="accident_date" value="{{old('date') ? old('date') : $accidents->accident_date}}" > 
                                         @error('accident_date')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please enter date' }}</strong>
                                           </span>
                                        @enderror
                                     </div>
                              
                                 <div class="col-md-4 col-xl-4 mt-2">
                                    <span style="color: #FF0000;font-size:15px;">*</span>  <label for="accident_city">Accident city</label>                         
                                      <select id='accident_city' name="accident_city" class="selectpicker form-control">
                                             <option value="0" selected=" true " >Select..</option> 
                                              @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{ $city->id == $accidents->accident_city ? 'selected' :''}}>{{$city->city_name}}</option>
                                              @endforeach   
                                       </select>
                                       @error('accident_city')
                                             <span class="invalid-feedback d-block pull-right" role="alert">
                                                 <strong>{{ 'Please select city ' }}</strong>
                                             </span>
                                         @enderror
                                  </div>

                                 <div class="col-md-4 col-xl-4 mt-2">
                                         <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Address</label>
                                         
                                         <textarea id="address" class="form-control "  name="address" value="" > {{$accidents->address}}</textarea>
                                         @error('address')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please enter address' }}</strong>
                                           </span>
                                        @enderror
                                     </div>
                             
                                    <div class="col-md-4 col-xl-4 mt-2">
                                        <label for="Vehicle No.">Driver Name</label>
                                         
                                         <input id="driver_name" class="form-control" name="driver_name" value="{{old('driver_name') ? old('driver_name') : $accidents->driver_name}}" > 
                                         @error('driver_name')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Fill Driver Name' }}</strong>
                                           </span>
                                        @enderror
                                             
                                    </div>    

                                    <div class="col-md-4 col-xl-4 mt-2">
                                        <label for="Vehicle No.">Total Damage Amt</label>
                                         
                                         <input id="total_damage" class="form-control" name="total_damage" value="{{old('total_damage') ? old('total_damage') : $accidents->total_damage}}" > 
                                         @error('total_damage')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Fill Total Damage' }}</strong>
                                           </span>
                                        @enderror
                                     </div>  
                                           
                                   <div class="col-md-4 col-xl-4 mt-2">
                                         <label for="Vehicle No.">Paid By</label>
                                         
                                         <input id="paid_by" class="form-control" name="paid_by" value="{{old('paid_by') ? old('paid_by') : $accidents->paid_by}}" > 
                                         @error('paid_by')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Fill Name' }}</strong>
                                           </span>
                                        @enderror
                                             
                                    </div>   
                                 
                                   <div class="col-md-4 col-xl-4 mt-2">
                                         <label for="Vehicle No.">Total Claim Amount</label>
                                         
                                         <input id="total_claim_amount" class="form-control" name="total_claim_amount" value="{{old('total_claim_amount') ? old('total_claim_amount') : $accidents->total_claim_amount}}" > 
                                         @error('total_claim_amount')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Fill Total Claim Amount' }}</strong>
                                           </span>
                                        @enderror
                                             
                                    </div>
                                    <div class="col-md-4 col-xl-4 mt-2">
                                         <span style="color: #FF0000;font-size:15px;">*</span><label for="claim_date">Claim Date</label>
                                         
                                         <input id="claim_date" class="form-control datepicker" name="claim_date" value="{{old('claim_date') ? old('claim_date') : $accidents->claim_date}}" > 
                                         @error('claim_date')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Fill Claim Date' }}</strong>
                                           </span>
                                        @enderror
                                     </div>    
                                   <div class="col-md-4 col-xl-4 mt-2"> 
                                         <span style="color: #FF0000;font-size:15px;">*</span><label for="net_damage">Net Damage</label>
                                         
                                         <input id="net_damage" class="form-control" readonly="true" name="net_damage" value="{{old('net_damage') ? old('net_damage') : $accidents->net_damage}}" > 
                                         @error('net_damage')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Enter Net Damage' }}</strong>
                                           </span>
                                        @enderror
                                             
                                    </div>

                                    <div class="col-md-4 col-xl-4 mt-2">
                                         <span style="color: #FF0000;font-size:15px;">*</span><label for="paid_date">Paid Date</label>
                                         
                                         <input id="paid_date" class="form-control datepicker" name="paid_date" value="{{old('paid_date') ? old('paid_date') : $accidents->paid_date}}" > 
                                         @error('paid_date')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please Fill Paid Date' }}</strong>
                                           </span>
                                        @enderror
                                     </div>
                                
                                    <div class="col-md-4 col-xl-4 mt-2">
                                       <div class="col-md-3">
                                          <label  style="margin-top: 20px;">Total Days</label>
                                       </div>
                                         <div class="col-md-3">
                                          <label for="total_days"> </label>
                                            <input id="years" class="form-control" readonly="true" name="years" value="{{old('years')}}" > Years
                                            @error('years')
                                              <span class="invalid-feedback d-block pull-right" role="alert">
                                                 <strong>{{ 'Please Fill Date' }}</strong>
                                              </span>
                                           @enderror
                                       </div>
                                       <div class="col-md-3">
                                          <label for="total_days"></label>
                                            <input id="months" class="form-control" readonly="true" name="months" value="{{old('months')}}" >Months
                                            @error('months')
                                              <span class="invalid-feedback d-block pull-right" role="alert">
                                                 <strong>{{ 'Please Fill Date' }}</strong>
                                              </span>
                                           @enderror
                                       </div>
                                       <div class="col-md-3">
                                          <label for="total_days"></label>
                                            <input id="days" class="form-control" readonly="true" name="total_days" value="{{old('days')}}" >Days
                                            @error('days')
                                              <span class="invalid-feedback d-block pull-right" role="alert">
                                                 <strong>{{ 'Please Fill Date' }}</strong>
                                              </span>
                                           @enderror
                                       </div>    
                                    </div>
                              </div>
                                <div class="row">    
                                    <div class="col-md-12 col-xl-12 mt-2">
                                         <label for="Vehicle No.">Remarks</label>
                                         
                                         <textarea id="remarks" class="form-control" name="remarks" value="{{old('remarks')}}" ></textarea> 
                                         @error('remarks')
                                           <span class="invalid-feedback d-block pull-right" role="alert">
                                              <strong>{{ 'Please enter address' }}</strong>
                                           </span>
                                        @enderror
                                             
                                    </div>
                                 </div>
                                 <div class=row>
                                  <div class="col-md-4 col-xl-4 mt-2">
                                         <label for="IMEI Number">Photo</label><br>
                                         <input type="file" id="image" name="doc_file" value="" class="image">
                                    </div>
                                 
                                    <div class="col-md-2 col-xl-2 mt-5">
                                         <table class="table">
                                           <tr>
                                             <th><center>Accident Image</center></th>
                                           </tr>
                                           <tr>
                                             <td>
                                               <div  class="image">
                                               	@if(!empty($accidents->doc_file))
		                                 			<img class="edit_image" src="{{asset("storage/$accidents->fleet_code/Accident/$accidents->doc_file")}}" alt="" title="" >
		                                		@endif
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
   $(document).ready(function(){
       $(function() {
         $( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
      });
// for year,month and date on the time of ready
   	var claim_date    = $('#claim_date').val();
      var paid_date    = $('#paid_date').val();
      
      var date1 = new Date(claim_date);
   var date2 = new Date(paid_date);
   var diff = new Date(date2.getTime() - date1.getTime());
   var year = diff.getUTCFullYear() - 1970 ;
   var month= diff.getUTCMonth();
   var days = diff.getUTCDate() - 1;
   if(year !==''){
       $('#years').val(year); 
      } ;
   if(month !==''){
       $('#months').val(month);  
      } ;
   if(days !==''){
       $('#days').val(days);  
      } ;
// end
   $(document).on('keyup','#total_damage , #total_claim_amount',function(){
     var total_damage    = $('#total_damage').val();
     var total_claim_amount    = $('#total_claim_amount').val();
     var total = total_damage - total_claim_amount;
     if(total !==''){
       $('#net_damage').val(total);
         
       } ;
    
   })
   $(document).on('keyup','#total_damage , #total_claim_amount',function(){
     var total_damage    = $('#total_damage').val();
     var total_claim_amount    = $('#total_claim_amount').val();
     var total = total_damage - total_claim_amount;
     if(total !==''){
       $('#net_damage').val(total);
         
       } ;
    
   })

    $('#paid_date').on('change',function(){
      var claim_date    = $('#claim_date').val();
      var paid_date    = $('#paid_date').val();
      if(claim_date === "")
      {
         alert('Please Select Claim Date First');
      }
      var date1 = new Date(claim_date);
   var date2 = new Date(paid_date);
   var diff = new Date(date2.getTime() - date1.getTime());
   var year = diff.getUTCFullYear() - 1970 ;
   var month= diff.getUTCMonth();
   var days = diff.getUTCDate() - 1;
   if(year !==''){
       $('#years').val(year); 
      } ;
   if(month !==''){
       $('#months').val(month);  
      } ;
   if(days !==''){
       $('#days').val(days);  
      } ;
    
   })
       $(".image").change(function () {
        var img_id = $(this).attr('id');
        filePreview(this,img_id);
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
    })    

</script>
@endsection