@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
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
	  <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div style="padding-top: 30px;padding-bottom: 30px;">
					<div class="row">
						<div class="col-md-10 mb-4">
							<a href="{{url('accountuser')}}" style="color: #fff;" class="btn btn-primary pull-right">Back</a>
						</div>
					</div>	
					<form >
                        {{csrf_field()}}
                        
                           <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

	                                @error('name')
	                                    <span class="text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

	                                @error('email')
	                                    <span class="text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

                          <div class="form-group row">
                              <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                              <div class="col-md-6">
                                  <input id="mobile" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" required autocomplete="mobile_no" autofocus>

                                  @error('mobile_no')
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
	                    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password  Will Be Automatically Generate" class="form-control @error('password') is-invalid @enderror" disabled="" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submit"  type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                    
				</div>
			</div>
		</div>
	</div>
</main>			


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 208px;">
      <div class="modal-header">
        <h3><b>Your Username And Password ....</b></h3>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
      			<label><b>Username:</b></label>
       			<input readonly="true" class="form-control" id="email_mod">
       		</div>
          <div class="col-md-12">
            <label><b>Mobile NO:</b></label>
            <input readonly="true" class="form-control" id="mobile_mod">
          </div>
       		<div class="col-md-12">
      			<label><b>Password:</b></label>
       			<input readonly="true" class="form-control" id="pass_mod">
       		</div>
       	</div>
      </div>
      <div class="modal-footer">        
       <input  type="submit"  class="btn btn-warning" data-dismiss="modal" value="Close" id="btn_close" >
      </div>
    </div>
  </div>
</div>

<script >
	$(document).on('click','#submit',function(event){
        event.preventDefault();
        $.ajax({ 
            url: "{{ route('accountuser.store') }}",
            type: 'POST',
            data: $('form').serialize(),
            success: function (data) {
                $('#myModal').modal('show');
               $('#email_mod').val((data['email']));
               $('#mobile_mod').val((data['mobile_no']));
               $('#pass_mod').val((data['password']));
            }
        })
    });


    document.getElementById("btn_close").onclick = function () {
    	location.href = "{{'/account_users'}}";
    }
</script>
@endsection