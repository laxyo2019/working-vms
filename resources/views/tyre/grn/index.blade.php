@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>TYRE GRN DETAILS</h3>
          </div>
           <div class="col-sm-2 col-md-2">
			  <a style="margin-bottom: 5px;" href="{{route('tyre_grn.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
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
                  <th style="width: 20px;">SR NO.</th>
                  <th style="width: 200px;">PO NO.</th>
                  <th style="width: 200px;">DATE</th>
                  <th style="width: 200px;">SUPPLIER NAME</th>
                  <th style="width: 200px;">INVOICE DATE</th>
                  <th style="width: 200px;">TOTAL QUANTITY</th>
                  <th style="width: 200px;">TOTAL AMOUNT</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              
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