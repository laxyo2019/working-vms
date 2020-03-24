@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE MODEL </h3>
          </div>
          <div class="col-sm-6 col-md-6 pull-right">
              <a style="margin-bottom: 5px;" href="{{route('vch_tyre.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
            <table id="myTable">
              <thead>
                <tr >
                  <th >SR. NO</th>
                  <th >VEHICLE NO</th>
                  <th >NO OF TYRE</th>
                  <th >NO OF ACCESSORIES</th>
                  <th >ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count =1; @endphp
                @foreach($data as $data)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$data->vehicle ? $data->vehicle->vch_no : 'NO RECORD'}}</td>
                  <td>{{$data->total_tyre ? $data->total_tyre : 'NO RECORD'}}{{-- <span class="btn btn-success fa fa-eye" style="margin-left: 20px;"></span> --}}</td>
                  <td>{{$data->total_acce ? $data->total_acce : 'NO RECORD'}}{{-- <span class="btn btn-success fa fa-eye" style="margin-left: 20px;"></span> --}}</td>
                  <td>
                    {{-- <a style="padding: 2px 5px;" href="{{route('vch_tyre.edit',$data->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a> --}}
                    <a style="padding: 2px 5px;" href="{{route('vch_tyre.show',$data->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-eye"></i></a>
                    <a style="padding: 2px 8px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('vch_tyre_delete',$data->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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
