@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('meta')
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
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
	      <h1><i class="fa fa-dashboard"></i>ACL</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">ACL</a></li>
	    </ul>
	  </div>
	  <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
						<form style="width:100%;" class="form-block" method="post" action="{{route('permissions.store')}}">
							{{csrf_field()}}
						<div class="row">
							<div class="form-group col-md-6">
								<label>Module Name</label>
								<select name="module_id" class="selectpicker form-control" id="vehicle_no1">
			                            <option value="0" selected=" true " disabled="true">Select Module..</option>
			                            @foreach($modules as $module)
			                               <option value="{{$module->id}}">{{$module->name}}</option>
			                            @endforeach     
			                        </select>
			                         @error('module_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Module Name' }}</strong>
			                              </span>
			                          @enderror
							</div>
							<div class="form-group col-md-6">
								<label>Permission Name</label>
								<input type="text" name="name" class="form-control">
			                         @error('name')
									<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-5"></div>
							<div class="form-group col-md-3" >	
								<input  style="margin-top: 10px;margin-left: 50px;" class="btn btn-primary" type="submit" name="submit" value="Submit">
							</div>
						</div>
					</form>		
				</div>
			</div>
		</div>
	</div>
</main>			

@endsection