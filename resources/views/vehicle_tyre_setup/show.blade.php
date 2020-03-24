@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3> VEHICLE TYRE/ACCESSORIES DETAILS </h3>
          </div>
          <div class="col-sm-6 col-md-6 pull-right">
              <a style="margin-bottom: 5px;" href="{{route('vch_tyre.index')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>BACK</a>
          </div>
        </div>
        <div class="box-body">
          <div class="container">
            <div class="row mt-5">
              <div class="col-md-12">
                <label style="font-size: 25px;">VEHICLE NO : <span style="margin-left: 20px;font-size: 20px"><i>{{$tyreinfo->vehicle->vch_no}}</i></span></label>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <h3 style="background-color: lightgray;"><b><i>TYRE INFORMATION</i></b></h3>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Tyre No</th>
                      <th>Tyre Position</th>
                      <th>Tyre Life(Expire:KM)</th>
                      <th>Tyre Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $count =1; @endphp
                    @foreach($TyreDetail as $tyre)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$tyre->tyre_no ? $tyre->tyre_no : 'No Record'}}</td>
                      <td>{{$tyre->tyre_position ? $tyre->tyre_position : 'No Record'}}</td>
                      <td>{{$tyre->tyre_exp_km ? $tyre->tyre_exp_km : 'No Record'}}</td>
                      <td>{{$tyre->tyre_des ? $tyre->tyre_des : 'No Record'}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <h3 style="background-color: lightgray;"><b><i>ACCESSORIES INFORMATION</i></b></h3>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Accessories Qty</th>
                      <th>Accessories Name</th>
                      <th>Accessories Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $count =1; @endphp
                    @foreach($AcceDetail as $acces)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$acces->material_qty ? $acces->material_qty : 'No Record'}}</td>
                      <td>{{$acces->material_name ? $acces->material_name : 'No Record'}}</td>
                      <td>{{$acces->material_des ? $acces->material_des : 'No Record'}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>
@endsection
