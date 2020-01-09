@extends('state.main') 
@section('content')
<style type="text/css">
</style>
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>EXPENSE PAYMENT ENTRY DETAILS </h3>
          </div>
          <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('expanses_payment_entry.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="{{ route('driver.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fas fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href="{{ route('driver.export') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('driver.download') }}"><i style="margin-right: 5px; " class="fas fa-file-import"></i></i>Format</a>

            </form>  
                       
          </div>
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 320px;">BILL NUMBER</th>
                  <th style="width: 320px;">BILL DATE</th>
                  <th style="width: 320px;">VEHICLE NO</th>
                  <th style="width: 320px;">JOB DONE BY</th>
                  <th style="width: 320px;">TOTAL AMOUNT</th>
                  <th style="width: 320px;">PAID AMOUNT</th>
                  <th style="width: 320px;">REMAINING AMOUNT</th>
                  <th style="width: 320px;">PAYMENT DATE</th>
                  <th style="width: 320px;">PAID BY</th>
                   <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $count =0; @endphp
                @foreach($Expense_payment as $expence)
                <tr>
                  <td>{{++$count}}</td>
                  <td style="width: 100px;">{{$expence->bill_no ? $expence->bill_no : ''}}</td>
                  <td style="width: 320px;">{{$expence->bill_date ? $expence->bill_date : ''}}</td>
                  <td style="width: 320px;">{{$expence->vehicle ? $expence->vehicle->vch_no : ''}}</td>
                  <td style="width: 320px;">{{$expence->job_by ? $expence->job_by : ''}}</td>
                  <td style="width: 320px;">{{$expence->net_amt ? $expence->net_amt : ''}}</td>
                  <td style="width: 320px;">{{$expence->paid_amt ? $expence->paid_amt : ''}}</td>
                  <td style="width: 320px;">{{$expence->remaining_amt ? $expence->remaining_amt : ''}}</td>
                  <td style="width: 320px;">{{$expence->payment_date}}</td>
                  <td style="width: 320px;">{{$expence->paid_by}}</td>
                  <td style="width: 61px;">
                    <a style="padding: 2px 5px;" href="{{route('expanses_payment_entry.edit',$expence->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('delete',$expence->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
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