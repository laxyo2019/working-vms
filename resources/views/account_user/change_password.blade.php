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
	      <h1><i class="fa fa-user pr-2"></i>User</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="{{url('accountuser')}}">User</a></li>
	    </ul>
	 </div>
	  @if(session('success'))
         <div class="alert alert-danger">
            {{session('success')}}
        </div>
      @endif
	    <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('password_update',Auth::user()->id)}}">
              			{{csrf_field()}}
						<div class="row">
							<div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
	                            <div class="row">
	                                <div class="col-md-4 col-xl-4 mt-2">
	                                </div>
	                                <?php if(Session::get('error')){ ?>
	                                    <div class="col-md-4 col-xl-4 mt-2 alert alert-info" role="alert">
	                                       <?php echo Session::get('error'); ?>
	                                    </div>   
	                              <?php  } ?>
	                            </div>
	                        	<div class="row">                                
					                <div class="col-md-4 col-xl-4 mt-2 ">
		                                <label class="pull-right" for="Vehicle No."><span style="color: #FF0000;font-size:15px;">*</span>Old Password</label>
	                                </div>
	                            
	                                <div class="col-md-4 col-xl-4 mt-2">	                                
		                                <input id="ins_policy_no" class="form-control" name="old_password" value="{{old('old_password')}}" > 
		                                @error('old_password')
				                            <span class="invalid-feedback d-block pull-right" role="alert">
				                               <strong>{{ $message }}</strong>
				                            </span>
				                         @enderror
		                            </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-4 col-xl-4 mt-2">
		                                <label class="pull-right" for="Vehicle No."><span style="color: #FF0000;font-size:15px;">*</span>New Password</label>
	                                </div>
	                            
	                                <div class="col-md-4 col-xl-4 mt-2">	                                
		                                <input id="ins_policy_no" class="form-control" name="new_password" value="{{old('new_password')}}" > 
		                                @error('new_password')
				                            <span class="invalid-feedback d-block pull-right" role="alert">
				                               <strong>{{ $message }}</strong>
				                            </span>
				                         @enderror
		                            </div>
	                            </div>   
					        </div>
		                   
		                    <div class="col-md-12 text-center" style="margin-top: 24px;">
		                     	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active ">
		                   	</div>
	                    </div>
                	</form>
                </div>
			</div>
		</div>
	  </div>
</main>	
	
<script>
	$(document).ready(function(){		
			
	});

	
</script>

@endsection