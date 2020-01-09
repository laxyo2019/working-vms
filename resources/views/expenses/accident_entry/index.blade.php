@extends('state.main') 
@section('content')
<style type="text/css">

</style>
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>ACCIDENTS DETAILS </h3>
          </div>
          <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('accident_entry.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href=""><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href=""><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

            </form>  
                       
          </div>
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 100px;">IMAGE</th>
                  <th style="width: 100px;">VEHICLE NO</th>
                  <th style="width: 100px;">ACCIDENT DATE</th>
                  <th style="width: 100px;">ACCIDENT CITY</th>
                  <th style="width: 100px;">TOTAL DAMAGE</th>
                  <th style="width: 100px;">TOTAL CLAIM</th>
                  <th style="width: 100px;">NET DAMAGE</th>
                  <th style="width: 100px;">DRIVER NAME</th>
                   <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count = 0 ; @endphp
                @foreach($accidents as $accident)
                <tr>
                  <td>{{++$count}}</td>
                  <td style="width: 100px;" ><img  style=" height: 50px;width: 50px;transition: transform .4s;" src="{{asset("storage/$accident->fleet_code/Accident/$accident->doc_file")}}" class="zoom img-circle"></td>
                  <td>{{$accident->vehicle ? $accident->vehicle->vch_no : ''}}</td>
                  <td>{{$accident->accident_date ? $accident->accident_date : ''}}</td>
                  <td>{{$accident->city ? $accident->city->city_name : ''}}</td>
                  <td>{{$accident->total_damage ? $accident->total_damage : ''}}</td>
                  <td>{{$accident->total_claim_amount ? $accident->total_claim_amount : ''}}</td>
                  <td>{{$accident->net_damage ? $accident->net_damage : '' }}</td>
                  <td>{{$accident->driver_name ? $accident->driver_name : '' }}</td>
                  <td>
                    <a style="padding: 2px 5px;" href="{{route('accident_entry.edit',$accident->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('accident_entry_delete',$accident->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
    $('#file').change(function() {
       $('#target').submit();
      });
} );

</script>
<style type="text/css">
 
.zoom:hover {
  -ms-transform: scale(6.5); /* IE 9 */
  -webkit-transform: scale(6.5); /* Safari 3-8 */
  transform: scale(6.5); 
}
</style>
@endsection