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
			  <a style="margin-bottom: 5px;" href="{{route('tyre_material_request.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
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
                  <th style="width: 200px;">MTR NO.</th>
                  <th style="width: 200px;">MTR DATE</th>
                  <th style="width: 200px;">TOTAL QUANTITY.</th>
                  <th style="width: 200px;">PREPARED BY</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
              <?php $count = 0; ?> 
              @foreach($lists as $list)                              
                <tr>
                  <td style=" width:15% ;padding-left: 20px;">{{++$count}}</td>
                  <td style=" width:15%; padding-left: 20px">{{$list->mtr_no}}</td>
                  <td style=" width:15%; padding-left: 20px">{{$list->mtr_date}}</td>
                  <td style=" width:15%; padding-left: 20px">{{$list->total_qty}}</td>
                  <td style=" width:15%; padding-left: 20px">{{$list->prep_by}}</td>
                  {{-- <td style=" width:15%; padding-left: 20px"></td> --}}
                  <td style="width:15%; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('tyre_material_request.edit',$list->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('tyre_material_delete',$list->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
@endsection