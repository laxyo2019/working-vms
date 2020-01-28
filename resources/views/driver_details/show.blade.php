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
              <h3> DRIVER DETAILS </h3>
          </div>
          @if(!empty($driver))
          <div class="col-sm-6 col-md-6">
              <a style="margin-bottom: 5px;" href="{{route('driver.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          @endif
          @if(!empty($users_d))
          <div class="col-sm-6 col-md-6">
              <a style="margin-bottom: 5px;" href="{{route('accountuser.index')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>BACK</a>
          </div>
          @endif
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 60px;">SR. NO</th>
                  <th style="width: 120px;">DRIVER NAME</th>
                  <th style="width: 120px;">VEHICLE NUMBER</th>
                  <th style="width: 100px;">LICENCE NUMBER</th>
                  <th style="width: 100px;">PHONE NUMBER</th>
                  <th style="width: 100px;">SALARY</th>
                  @if(!empty($driver))
                   <th style="width: 61px;">IMAGE</th>
                   <th style="width: 61px;">ACTION</th>
                  @endif
                  @if(!empty($users_d))
                   <th style="width: 61px;">IMAGE</th>
                  @endif
                </tr>
              </thead>
              <tbody>
              <?php $count = 0; ?>
              @if(!empty($driver))
                @foreach($driver as $drivers) 
                          
                <tr>
                  <td style="width: 60px;">{{++$count}}</td>
                  <td style="width: 120px;">{{$drivers->name}}</td>
                  <td style="width: 120px;">{{$drivers->vehicles->vch_no}}</td>
                  <td style="width: 100px;">{{$drivers->license_no}}</td>
                  <td style="width: 100px;">{{$drivers->phone}}</td>
                  <td style="width: 100px;">{{$drivers->salary}}</td>
                  <td style="width:100px; text-align:center;">
                        <img src="{{asset("storage/$drivers->fleet_code/vehicle_driver/$drivers->image")}}" width="60" height="50" class="zoom img-circle">
                      </td>
                  <td style="width: 100px; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('driver.edit',$drivers->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 8px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('driverdelete',$drivers->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
                @endforeach
              @endif
              @if(!empty($users_d))
                @foreach($users_d as $user)
                  @foreach($user->driver as $drivers)
                    <tr>
                      <td style="width: 60px;">{{++$count}}</td>
                      <td style="width: 120px;">{{$drivers->name}}</td>
                      <td style="width: 120px;">{{$drivers->vehicles->vch_no}}</td>
                      <td style="width: 100px;">{{$drivers->license_no}}</td>
                      <td style="width: 100px;">{{$drivers->phone}}</td>
                      <td style="width: 100px;">{{$drivers->salary}}</td>
                      <td style="width:100px; text-align:center;">
                        <img src="{{asset("storage/$drivers->fleet_code/vehicle_driver/$drivers->image")}}" width="60" height="50" class="zoom img-circle">
                      </td>
                    </tr>
                  @endforeach
                @endforeach
              @endif
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