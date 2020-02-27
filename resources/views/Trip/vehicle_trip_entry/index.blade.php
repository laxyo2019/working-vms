@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> TRIP DETAILS </h3>
          </div>
          <div class="col-sm-6 col-md-6">
              <a style="margin-bottom: 5px;" href="{{route('Trip.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          {{-- <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="{{ route('state.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href="{{ route('state.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('state.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>
            </form>  
                       
          </div> --}}
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 62px;">SR. NO</th>
                  <th style="width: 200px;">VEHICLE NO.</th>
                  <th style="width: 320px;">STARTING DATE</th>
                  <th style="width: 320px;">ENDING DATE</th>
                  <th style="width: 200px;">TRIP AMOUNT</th>
                  <th style="width: 200px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count=1; @endphp
                @foreach($data as $data)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$data->vehicle ? $data->vehicle->vch_no : 'NO RECORD'}}</td>
                  <td>{{$data->starting_date}}</td>
                  <td>{{$data->ending_date}}</td>
                  <td>{{$data->trip_amt}}</td>
                  <td>
                    <a style="padding:2px 5px;" href="{{route('Trip.edit',$data->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding:2px 8px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{url('Trip.destroy',$data->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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