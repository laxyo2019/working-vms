@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>EXPENSES DETAILS </h3>
          </div>
           <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('expanses.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="{{ route('petrolpump.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href="{{ route('petrolpump.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('petrolpump.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

            </form>  
                       
          </div>
                
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 320px;">PARTY NAME</th>
                  <th style="width: 320px;">EXPENSE TYPE</th>
                  <th style="width: 320px;">VEHICLE NO</th>
                  <th style="width: 320px;">CURRENT KM.</th>
                  <th style="width: 320px;">FUEL RATE</th>
                  <th style="width: 320px;">AMOUNT</th>
                  <th style="width: 320px;">AVG.</th>
                  <th style="width: 320px;">NEXT FILLING KM.</th>
                  <th style="width: 61px;">ACTION</th>
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