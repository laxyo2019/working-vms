@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE TYRE INFORMATION </h3>
          </div>
          <div class="col-sm-6 col-md-6 pull-right">
              
          </div>
            <table id="myTable">
              <thead>
                <tr >
                  <th >SR. NO</th>
                  <th >VEHICLE NO</th>
                  <th >VEHICLE IMEI NO</th>
                  <th >VEHICLE CURRENT KM.</th>
                  <th >DATA DATE</th>
                  <th >TYRE NO</th>
                  <th >TYRE POSITION</th>
                  <th >STATUS</th>
                </tr>
              </thead>
              <tbody>
                <?php $count = 0; ?>
              @foreach($gps_imei as $gps)
              @if($gps->vehicle->tyre != null)
                @foreach($gps->vehicle->tyre as $tyre)
                  <?php
                    $km = $tyre->vch_cur_km + $tyre->tyre_exp_km - 100 ;
                    $total_km = $tyre->vch_cur_km + $tyre->tyre_exp_km ;
                    $gps_km = $gps->reading;
                   
                  ?>
               <tr>
                  <td>{{++$count}}</td>
                  <td>{{$gps->vehicle ? $gps->vehicle->vch_no:'NO RECORD FOUND' }}</td>
                  <td>{{$gps->imei ? $gps->imei : 'NO RECORD FOUND' }}</td>
                  <td>{{$gps->reading ? $gps->reading : 'NO RECORD FOUND' }}</td>
                  <td>{{$gps->duty_date ? $gps->duty_date : 'NO RECORD' }}</td>
                  <td>{{$tyre->tyre_no ? $tyre->tyre_no : 'NO RECORD' }}</td>
                  <td>{{$tyre->tyre_position ? $tyre->tyre_position : 'NO RECORD' }}</td>
                  @if($km <= $gps_km && $gps_km <= $total_km)
                    <td style="color: red" class="blinking"><b>{{'NEED TO CHANGE TYRE' }}</b></td>
            
                  @elseif($gps_km >= $total_km)
                    <td style="color: red" class="blinking"><b>{{'TYRE Expired..' }}</b></td>
                
                  @else
                    <td>{{'NO NEED TO CHANGE..' }}</td>
                  @endif
                </tr>
                @endforeach
              @endif
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
@endsection
