@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          	<div class="col-sm-6 col-md-6">
              <h3> VEHICLE DETAILS </h3>
          	</div>
          	<div class="col-sm-6 col-md-6 pull-right" style="padding-left:420px;">
                 <a style="margin-bottom: 5px;" href="{{route('vch_status.create')}}" class="btn btn-inverse" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
      		</div>
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 10px;">SR. NO</th>
                  <th style="width: 100px;">VEHICLE NUMBER</th>
                  <th style="width: 80px;">CURRENT STATUS</th>
                  <th style="width: 100px;text-align: center;">RUNNING STATUS</th>
                  <th style="width: 100px;text-align: center;">STAND BY STATUS</th>
                  <th style="width: 150px;text-align: center;">READY FOR LOAD</th>
                  <th style="width: 150px;text-align: center;">REPAIR STATUS</th>
                  <th style="text-align: center;margin-left: 100px;">SUBMIT</th>
                  {{-- <th style="text-align: center;margin-left: 100px;">ACTION</th> --}}
                </tr>
              </thead>
              <tbody>
              	@php $count = 1; @endphp
              	@foreach($data as $data)
                 @php 
                  $status_data = App\VehicleStatus::where('fleet_code',session('fleet_code'))->where('vch_id', $data->id)->first();
                 @endphp
              	<tr id="row{{$data->id}}">
              		<td style="width: 10px;">{{$count++}}</td>
              		<td style="width: 100px;">
                    {{$data->vch_no}}</td>
              		<td style="width: 80px;">{{!empty($status_data) ? ($status_data->vch_id == $data->id ? $status_data->status : 'NO RECORD'): 'NO RECORD'}}</td>
                  <td style="width: 100px;">
                     <input type="radio" data-id="running_{{$data->id}}" {{!empty($status_data->status) ? ($status_data->status == 'Running' ? 'checked' : '') : ''}} value="Running"  name="status{{$data->id}}"  class="status"><span><b>&nbsp&nbsp Running&nbsp</b></span>
                  </td>
                  <td style="width: 100px;">
                    <input type="radio" data-id="standby_{{$data->id}}" {{!empty($status_data->status) ? ($status_data->status == 'StandBy' ? 'checked' : '') : ''}}  value="StandBy" name="status{{$data->id}}" class="status"><span><b>&nbsp&nbsp StandBy&nbsp&nbsp</b></span>
                  </td>
                  <td style="width: 150px;">
                    <input type="radio" data-id="unload_{{$data->id}}" {{!empty($status_data->status) ? ($status_data->status == 'ReadyForLoad' ? 'checked' : '') : ''}}  value="ReadyForLoad" name="status{{$data->id}}" class="status"><span><b>&nbsp&nbsp Ready For Load&nbsp&nbsp</b></span>
                  </td>
                  <td style="width: 150px;">
                    <input type="radio" data-id="repair_{{$data->id}}" {{!empty($status_data->status) ? ($status_data->status == 'Repair/Maintenance' ? 'checked' : '') : ''}}  value="Repair/Maintenance"  name="status{{$data->id}}" class="status"><span><b>&nbsp&nbsp Repair/Maintenance&nbsp&nbsp</b></span>
                  </td>
                  <td>
                    @if(!empty($status_data))
                      <button class="btn btn-success submit" id="edit" data-id="{{$data->id}}" style="margin-left: 50px;">EDIT</button>

                    @else
                      <button class="btn btn-success submit" id="submit"  data-id="{{$data->id}}" style="margin-left: 50px;">ADD</button>
                    @endif

                  </td>
              	</tr>
              	@endforeach
              </tbody>
            </table>
            
            </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
    $('#file1').change(function() {
       $('#target1').submit();
      });
    $('#file2').change(function() {
       $('#target2').submit();
      });

    $('.submit').click(function(){
       var vch_id = $(this).attr('data-id');
       var btnID = $(this).attr('id');
       var parentID = $(this).parent().parent().attr('id');   
       var checked = $('#'+parentID).children().find(".status:checked").val();
        if(checked){
          $.ajax({
            url: "/status",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {'vch_id':vch_id,'btnID':btnID,'status':checked},
            success: function (data) {
               console.log(data)
               location.reload(); 
            }
        })
        }else{
            alert("Please Select Some Value Before Add");
        }
    });
} );

</script>
@endsection