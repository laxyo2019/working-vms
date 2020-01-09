@extends('state.main') 
@section('content')

<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>TYRE MATERIAL REQUEST </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('tyre_remolding.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" id="create_form" method="post" action="{{route('tyre_remolding.store')}}"  enctype="multipart/form-data">
              {{csrf_field()}}             
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12">                                     
                            <div class='row'>                         
                              <div class="col-md-4 col-xl-4 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Serial No</label>
                                  <input id="serial_no" name="serial_no" readonly="true" class="form-control  " value="{{$no}}">
                                  @error('serial_no')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>

                              <div class="col-md-4 col-xl-4 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Date</label>
                                  <input id="remold_date" name="remold_date" class="form-control datepicker" readonly="true" value="{{$date}}">
                                  @error('remold_date')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ 'Please select date' }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="vendor_name">Supplier Name</label>
                                <select id="vendor_name" required="true" name="vendor_name" class="form-control">
                                       <option value="0" >Select..</option>
                                    @foreach ($vendors as $vendor)
                                      <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                    @endforeach 
                                </select>
                                @error('vendor_name')
                                <span class="invalid-feedback d-block" role="alert">
                                  <strong>{{ 'Please select supplier' }}</strong>
                                </span>
                               @enderror                                  
                              </div>
                          </div>
                          <div class='row'>                         
                              <div class="col-md-3 col-xl-3 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="vendor_name">Tyre No</label>
                                <select id="tyre_no" required="true" name="tyre_no" class="form-control">
                                       <option value="0" >Select..</option>
                                </select>
                                @error('tyre_no')
                                <span class="invalid-feedback d-block" role="alert">
                                  <strong>{{ 'Please select Tyre No.' }}</strong>
                                </span>
                               @enderror                                  
                              </div>

                              <div class="col-md-3 col-xl-3 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_company">Tyre Company</label>
                                  <input id="tyre_company" name="tyre_company" readonly="true" class="form-control  " value="">
                                  @error('tyre_company')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_type">Tyre Type</label>
                                  <input id="tyre_type" name="tyre_type" readonly="true" class="form-control  " value="">
                                  @error('tyre_type')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="tyre_condition">Tyre Condition</label>
                                  <input id="tyre_condition" name="tyre_condition" readonly="true" class="form-control  " value="">
                                  @error('tyre_condition')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="status">Status</label>
                                  <input id="status" name="status" readonly="true" class="form-control  " value="">
                                  @error('status')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="nsd">NSD</label>
                                  <input id="nsd" name="nsd" readonly="true" class="form-control  " value="">
                                  @error('nsd')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                              <div class="col-md-3 col-xl-3 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="rate">Rate</label>
                                  <input id="rate" name="rate" readonly="true" class="form-control  " value="">
                                  @error('rate')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                             <div class="col-md-3 col-xl-3 mt-5">
                                <input  id="btnShowPopup1" value="Add Item"  style="margin-right: -8px;"  value="button" class="btn btn-primary active ">
                            </div>
                          </div>        
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="text-center">
                                <span class="qty_error" style="color: #FF0000;font-size:15px;"></span>
                              </div>  
                                <div class="box box-color orange box-condensed box-bordered">
                                    <div class="box-title">
                                        <h3>INFORMATION FOR ABOVE TYRE</h3>
                                    </div>
                                    <div class="box-content nopadding" style="height: 305px;overflow: scroll;" align="center">
                                      <div id="ContentPlaceHolder1_Panel5" style="background-color:Transparent;height:auto;width:90%;padding-top: 22px;">
                                      <div id="ContentPlaceHolder1_UpdatePanel86">                      
                                <div class="row sup_table" style="padding-top: 21px;">
                                  <table id="myTable1" >
                                    <thead>
                                      <tr >
                                        <th style="width: 20px;">#</th>
                                        <th style="width: 200px;">TYRE NO</th>
                                        <th style="width: 200px;">COMPANY</th>
                                        <th style="width: 200px;">TYPE</th>
                                        <th style="width: 200px;">CONDITION</th>
                                        <th style="width: 200px;">STATUS</th>
                                        <th style="width: 200px;">NSD</th>
                                        <th style="width: 200px;">RATE</th>
                                        <th style="width: 200px;">ACTION</th>
                                      </tr>
                                    </thead>
                                    
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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

<script type="text/javascript">

   $(document).ready( function () {
    $(function() {
        $( ".datepicker" ).datepicker({format: 'yyyy-mm-dd' });
      });

    $('#company').on('change',function(){
            var com_id = $(this).val();
            var html   = [];             
          $.ajax({
                url:'{{route('material_request_details')}}',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':com_id},
                success:function(data){                  
                  $.each( data, function( key, cvalue ) {
                      a=1                     

                     $('#tbody > tr').remove() 
                      $.each(cvalue.detail,function( key, value ){                        
                       $('#tbody').append('<tr><td><input type="checkbox" class="check_val" value="'+ value.id +'"></td><td>'+a+'</td><td>'+cvalue.comp_name+'</td><td>'+ value.model_name+'</td></tr>')
                       a+=1
                    });
                });               
                  
              }
          })

    })
  
     $("#rate").bind("keypress", function (e) {
      var rate =$('#rate').val();
      alert(rate)
        var keyCode = e.which ? e.which : e.keyCode
        if (!(keyCode >= 48 && keyCode <= 57) ) {
            $(".error").css("display", "inline");
            $('#submitven').css('disabled','false');
            return false;
          }else{
            $(".error").css("display", "none");
          }
        
      });

    $('#myTable').DataTable({
      "searching": false,
      "bPaginate": false,
    });
    $('#file').change(function() {
       $('#target').submit();
      });

    $('#myTable1').DataTable();
    $('#submitven').on('click',function(){
    var vendor_id = $('#vendor_id').val();
    var comp_id   = $('#comp_id').val();
    var rate      = $('#rate').val();
    var eid       = $('#eid').val();
  
    $.ajax({
          url: '{{route('sparemaster.suppliers')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'vendor_id':vendor_id,comp_id:comp_id,rate:rate,spare_id:eid},
          success: function (data) {
            $('.sup_table').html(data);
          }
      });
  })

  $("#btnShowPopup1").on('click',function(){
     $("#MyPopup").modal("show");         
  });

$('#submit').click(function(){
      var id = [];   
     $('.check_val:checked').each(function(i){
        id[i] = $(this).val();
      });
     console.log(id)
    $.ajax({
          url: '{{route('material_request_com')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'id':id},
          success: function(data) {
            $("#MyPopup").modal("hide");
            location.reload();
           
          }
      });

  });
  
});

$(document).on("change", ".qty", function() {
    var sum = 0;
    $("input[class *= 'qty']").each(function(){
        sum += +$(this).val();
        
    });
    $(".total").val(sum);
});

$(document).on("click", "#trash", function() {
    var id = $(this).attr('data');
    $.ajax({
          url: '{{route('material.remove_session')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'id':id},
          success: function(data) {
           location.reload();
          }
      });
});

$(document).on('click','#submit1',function(event) {
  event.preventDefault();
   var hasNoValue;
    $('.qty').each(function(i) {
        if ($(this).val() == '') {
              hasNoValue = true;
        }
    });
    if (hasNoValue) {
        $('.qty_error').text('Please Enter Quantity For Every Spare ')
    }
    if(!hasNoValue){
     $('#create_form').submit();
    }
})

</script>
@endsection