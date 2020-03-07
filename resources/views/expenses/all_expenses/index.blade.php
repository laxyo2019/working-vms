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
          </div>
          <div class="col-sm-4 col-md-4">  
              <a style="margin-bottom: 5px;" href="{{route('expanses.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
                       
          </div>
                
            <table id="myTable" class="table-responsive">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 320px;">EXPENSE TYPE</th>
                  <th style="width: 320px;">PARTY NAME</th>
                  <th style="width: 320px;">VEHICLE NO</th>
                  <th style="width: 320px;">AMOUNT</th>
                  <th style="width: 320px;">DATE</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count = 0; @endphp
                @foreach($datas as $data)
                <?php 
                  $old_date_timestamp = strtotime($data->created_at);
                  $date = date('d-M-Y', $old_date_timestamp);
                ?>
                <tr>
                  <td>{{++$count}}</td>
                  <td>{{$data->party_type ? $data->party_type : 'NO RECORD'}}</td>
                  <td>{{$data->party_name  ? $data->party_name  : 'NO RECORD'}}</td>
                  <td>{{$data->vch_no  ? $data->vehicle->vch_no  : 'NO RECORD'}}</td>
                  <td>{{$data->expanses_amt  ? $data->expanses_amt  : 'NO RECORD'}}</td>
                  <td>{{$date ? $date  : 'NO RECORD'}}</td>
                  <td>{{$date ? $date  : 'NO RECORD'}}</td>
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

} );

</script>
@endsection