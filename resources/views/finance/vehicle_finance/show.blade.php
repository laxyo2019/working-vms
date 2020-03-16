@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE FINANCE DETAILS </h3>
          </div> 
          <div class="col-sm-6 col-md-6">
            <div class="row">
                  <div class="col-sm-8 col-md-8">
                  </div>
                <div class="col-sm-2 col-md-2 pull-right" style="padding-left: 46px;">
                    <a style="margin-bottom: 5px;" href="{{route('vehiclefinance.index')}}" class="btn btn-inverse" ><i style="margin-right: 5px; " class="fas fa-arrow-left"></i>BACK</a>           
                </div>
            </div>
          </div>
        </div>
        <div class="box-body">
            <table class="table table-responsive" id="account_table">
                  <thead>
                    <tr>
                      <th colspan="2">VEHICLE NUMBER</th>
                      <td colspan="2">{{$vch_finance->vch_no ? $vch_finance->vch_no->vch_no : 'NO RECORD'}}</td>
                    </tr>
                    <tr >
                      <th style="width: 62px;">SR. NO</th>
                      <th style="width: 62px;">INSTALMENT DATE</th>
                      <th style="width: 410px;">INSTALMENT AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                  @php $count = 0; @endphp
                  @foreach($vch_finance_ins as $vehicle)
                  <?php 
                  $instalment_date = strtotime($vehicle->fist_ins_date_lst);
                  $new_ins_date = date('d-M-Y', $instalment_date);
                ?>
                  <tr>
                    <td style="width: 100px;">{{++$count}}</td>
                    <td style="width: 100px;">{{$new_ins_date}}</td>
                    <td style="width: 100px;">{{$vehicle->per_ins_amt_lst}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<script>
  $(document).ready(function(){   
    $('#account_table').DataTable();    
  })  
  
</script>
@endsection