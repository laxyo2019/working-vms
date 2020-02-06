@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('meta')
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
{{--     <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya"> --}}
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@endsection
@section('content') 
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>PERMIT Details</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">PERMIT</a></li>
      </ul>
    </div>
    @if(session('success'))
         <div class="alert alert-danger">
            {{session('success')}}
        </div>
      @endif
  <div class="row" id="account_user">
    <div class="col-md-12 m-auto">
      <div class="card">
        <div class="card-body " >
          <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable3">
              <table class="table table-stripped table-bordered" id="account_table" style="width: 100%">
                  <thead>
                    <tr >
                      <th style="width: 100px;">SR. NO</th>
                      <th style="width: 320px;">VEHICLE NUMBER</th>
                      <th style="width: 320px;">PERMIT NUMBER</th>
                      <th style="width: 320px;">PERMIT AMOUNT</th>
                      <th style="width: 320px;">VALID FROM</th>
                      <th style="width: 320px;">EXPIRY DATE</th>
                      <th style="width: 61px;">OWNER</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 0; ?>
                    @foreach($state as $State) 
                    @php ($vch_no = \App\vehicle_master::find($State->vch_id))            
                    <tr>
                      <td style="width: 10%;  padding-left: 20px;">{{++$count}}</td>
                      <td style="padding-left: 20px">{{$vch_no->vch_no }}</td>
                      <td style="width: 17%;padding-left: 20px">{{$State->permit_no }}</td>
                      <td style="padding-left: 20px">{{$State->permit_amt ? $State->permit_amt :'NO RECORD'}}</td>
                      <td style="padding-left: 20px">{{$State->valid_from}}</td>
                      <td style="padding-left: 20px">{{$State->valid_till}}</td>
                      <td style="padding-left: 20px">{{$State->owner->name}}</td>
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
</main>
<script>
  $(document).ready(function(){   
    $('#account_table').DataTable();    
  })  
  
</script>

@endsection
