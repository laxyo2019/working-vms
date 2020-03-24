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
              <a style="margin-bottom: 5px;" href="{{route('vch_type.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
            <table id="myTable">
              <thead>
                <tr >
                  <th >SR. NO</th>
                  <th >VEHICLE NO</th>
                  <th >VEHICLE CURRENT KM.</th>
                  <th >DATA DATE</th>
                  <th >TYRE NO</th>
                  <th >TYRE POSITION</th>
                  <th >STATUS</th>
                </tr>
              </thead>
              <tbody>
               
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
