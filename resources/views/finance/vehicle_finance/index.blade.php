@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE FINANCE DETAILS </h3>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="row">
                  <div class="col-sm-8 col-md-8">
                  </div>
                <div class="col-sm-2 col-md-2 pull-right" style="padding-left: 46px;">
                    <a style="margin-bottom: 5px;" href="{{route('vehiclefinance.create')}}" class="btn btn-inverse" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>           
                </div>
            </div>
          </div>
            <table id="myTable" class="table-responsive">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 410px;">VEHICLE NUMBER</th>
                  <th style="width: 410px;">TOTAL FINANCE AMOUNT</th>
                  <th style="width: 410px;">PAID AMOUNT</th>
                  <th style="width: 410px;">REMAINING AMOUNT</th>
                  <th style="width: 410px;">TOTAL INSTALMENT</th>
                  <th style="width: 410px;">PER INSTALMENT AMOUNT</th>
                  <th style="width: 61px;text-align: center;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count = 0; @endphp
                @foreach($vehicles as $vehicle)
                <tr>
                  <td style="width: 100px;">{{++$count}}</td>
                  <td style="width: 320px;">{{$vehicle->vch_no ? $vehicle->vch_no->vch_no : '' }}</td>
                  <td style="width: 320px;">{{$vehicle->total_amount ? $vehicle->total_amount : '' }}</td>
                  <td style="width: 320px;">{{$vehicle->paid ? $vehicle->paid : '' }}</td>
                  <td style="width: 320px;">{{$vehicle->balance ? $vehicle->balance : '' }}</td>
                  <td style="width: 320px;">{{$vehicle->installment_no ? $vehicle->installment_no : '' }}</td>
                  <td style="width: 320px;">{{$vehicle->per_installment_amount ? $vehicle->per_installment_amount : '' }}</td>
                  <td style="width: 61px;">
                    <a style="padding: 2px 5px;" href="{{route('vehiclefinance.edit',$vehicle->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('vehiclefinance_destroy',$vehicle->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
} );

</script>
@endsection