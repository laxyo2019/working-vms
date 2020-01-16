@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>PARTY DETAILS </h3>
          </div>
           <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('party.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
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
                  <th style="width: 320px;">PARTY TYPE</th>
                  <th style="width: 320px;">PHONE NO</th>
                  <th style="width: 320px;">LAND-LINE NO</th>
                  <th style="width: 320px;">ALT. PHONE NO.</th>
                  <th style="width: 320px;">CITY</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count= 0; @endphp
                @foreach($data as $data)
                  <tr>
                    <td>{{++$count}}</td>
                    <td>{{$data->party_name ? $data->party_name : 'No Data'}}</td>
                    <td>{{$data->party_type ? $data->party_type : 'No Data'}}</td>
                    <td>{{$data->phone ? $data->phone : 'No Data'}}</td>
                    <td>{{$data->landline_no ? $data->landline_no : 'No Data'}}</td>
                    <td>{{$data->alt_mobile_no ? $data->alt_mobile_no : 'No Data'}}</td>
                    <td>{{$data->city ? $data->city->city_name : 'No Data'}}</td>
                    <td>
                    <a style="padding: 2px 5px;" href="{{route('party.edit',$data->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{url('/party_delete',$data->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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