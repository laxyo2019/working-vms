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
                <a class="btn btn-inverse pull-right" href="{{route('tyre_material_request.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" id="create_form" method="post" action="{{route('tyre_material_request.store')}}"  enctype="multipart/form-data">
              {{csrf_field()}}             
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12">                                     
                            <div class='row'>                         
                            	<div class="col-md-4 col-xl-4 mt-2">
	                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">MTR No</label>
	                                <input id="mtr_no" name="mtr_no" readonly="true" class="form-control  " value="{{$no}}">
	                                @error('mtr_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror
	                                
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">MTR Date</label>
	                                <input id="mtr_date" name="mtr_date" class="form-control datepicker" readonly="true" value="{{$date}}">
	                                @error('mtr_date')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select mtr date' }}</strong>
			                            </span>
			                         @enderror
	                                
	                            </div>
                              <div class="col-md-4 col-xl-4 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Prepared By</label>
                                  <input id="email" name="prep_by" class="form-control  " value="{{old('prep_by') }}">
                                  @error('prep_by')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>
                          </div>
                          <div class="row">
	                           <div class="col-md-12 text-center"  style="margin-top: 24px;">
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
                                        <h3>SUPPLIER INFORMATION FOR ABOVE TYRE</h3>
                                    </div>
                                    <div class="box-content nopadding" style="height: 305px;overflow: scroll;" align="center">
                                      <div id="ContentPlaceHolder1_Panel5" style="background-color:Transparent;height:auto;width:90%;padding-top: 22px;">
                                      <div id="ContentPlaceHolder1_UpdatePanel86">                      
        					              <div class="row sup_table" style="padding-top: 21px;">
        					                <table id="myTable1" >
  										              <thead>
  										                <tr >
      												          <th style="width: 20px;">#</th>
      												          <th style="width: 200px;">TYRE COMPANY</th>
      												          <th style="width: 200px;">TYRE TYPE</th>
      												          <th style="width: 200px;">CONDITION</th>
      												          <th style="width: 200px;">ORDERED QTY.</th>
      												          <th style="width: 200px;">REQUEST BY.</th>
      												          <th style="width: 200px;">REMARKS</th>
                                        <th style="width: 200px;">ACTION</th>
      												        </tr>
      										          </thead>
  										              <tbody>
                                     
                                    <?php $ids = !empty(session('ids'))?session('ids') :array();
                                          $ses_data = !empty(session('data'))?session('data') :array();
                                          $count =1;
                                        $data1 = array();
                                        foreach($ids as $id){
                                            foreach($ses_data[$id] as $data){ ?>
                                              <tr>
                                                <td>{{$count ++}}</td>
                                                <td>
                                                  <input id="tyre_comp_name" name="tyre_comp_name[]" class="form-control " type="hidden" value="{{$data['comp_id']}}">{{$data['comp_name']}}
                                                </td>
                                                <td>
                                                  <input id="tyre_type_name" name="tyre_type_name[]" class="form-control " type="hidden" value="{{$id}}">{{$data['model_name']}}
                                                </td>
                                                <td>
                                                  <select id="tyre_condition" name="tyre_condition[]"  class="form-control">
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
                                                </td>
                                                <td>
                                                  <input id="tyre_order_qty" name="tyre_order_qty[]" class="form-control qty" value="">
                                                </td>
                                                <td>
                                                  <input id="tyre_request" name="tyre_request[]" class="form-control  " value="">
                                                </td>
                                                <td>
                                                  <input id="tyre_remark" name="tyre_remark[]" class="form-control  " value="">
                                                </td>
                                                <td>
                                                  <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                                </td>
                                              </tr> 
                                               <?php }
                                            };  ?>
  										              </tbody>
        										      </table>
        					              </div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
                    <div class="row">
                      <div class="col-md-2 col-xl-2 mt-2">
                         <label class="" for="Chasis No">Total Qty</label>
                    
                          <input readonly="true" id="email" name='total_qty' class="form-control  total" value="{{old('total_qty') }}">
                          @error('total_qty')
                          <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
                          </span>
                       @enderror                          
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xl-12 mt-2">
                         <label for="Chasis No">Remarks</label>
     
                          <textarea id="email" name="remarks" class="form-control  " value="">{{old('remarks') }}</textarea>
                          @error('remarks')
                          <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
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
            	<h3 style="margin-left: 115px;">Select Item To Add</h3>
               	<button type="button" class="close" data-dismiss="modal">
                    &times;</button>
   		    </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                    <label for="Chasis No">Tyre Company</label>
                </div>
                <div class="col-md-6">
                    <select id="company" class="form-control">
                      <option>Select...</option>
                      <?php
                        foreach($comp as $company){ ?>
                          <option value="{{$company->id}}">{{$company->comp_name}} </option>
                        <?php } ?>
                    </select>
                </div>
              </div>
            	
            	<form  id="table_form">
                <table id="" class="table mt-3">
                  <thead>
                    <tr >
                      <th></th>
                      <th style=";">SR NO.</th>
                      <th style="">COMPANY NAME</th>
                      <th style="">TYRE TYPE</th>
                  </thead>
                  <tbody id="tbody">
                    
                    
                    
                  </tbody>
            </table>
              </form>
            </div>
            <div class="modal-footer">
            	 <button type="button" class="btn btn-danger" id="submit">
                    Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="abc">
                    Close</button>               
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