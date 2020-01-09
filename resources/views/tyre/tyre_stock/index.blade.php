@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>TYRE SUPPLIER DETAILS </h3>
          </div>
           <div class="col-sm-2 col-md-2">
			  <a style="margin-bottom: 5px;" href="{{route('tyre_stock.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
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
                  <th style="width: 200px;">TYRE NO.</th>
                  <th style="width: 200px;">COMPANY NAME</th>
                  <th style="width: 200px;">TYRE TYPE</th>
                  <th style="width: 200px;">CONDITION</th>
                  <th style="width: 200px;">VEHICLE NO</th>
                  <th style="width: 200px;">STOCK</th>
                  <th style="width: 200px;">NSD</th>
                  <th style="width: 200px;">RATE</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
              <?php $count = 0; ?>
             {{-- 
                                
                <tr>
                  <td style=" width:15% ;padding-left: 20px;"></td>
                  <td style=" width:15%; padding-left: 20px"></td>
                  <td style=" width:15%; padding-left: 20px"></td>
                  <td style=" width:15%; padding-left: 20px"></td>
                  <td style=" width:15%; padding-left: 20px"></td>
                  <td style=" width:15%; padding-left: 20px"></td>
                  <td style="width:15%; text-align:center;">
                    <a style="padding: 2px 5px;" href="" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
                
       --}}
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