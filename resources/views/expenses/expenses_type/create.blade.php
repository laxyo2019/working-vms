@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD EXPENSES INFORMATION</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('expense_type.index')}}">Back</a>
            </div>
		    <div id="add-city-form">
		      <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('expense_type.store')}}">
		      			{{csrf_field()}}
	            <div class="card-body " >
	                <div class="row">
	                    <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
			                <div class="row"> 
			                	<div class="col-md-4 col-xl-4 mt-2"></div>
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <label for="expense_type" style="margin-left: 120px;">Expense Type </label><span style="color: #FF0000;font-size:15px;">*</span>
	                                <input type="text" class="form-control" name="expense_type" >
	                                 
	                                @error('expense_type')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter Expense Type' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
		                    </div>
	                    </div>     
	                </div>
	                <div class="row">
                     <div class="col-md-7" style="margin-top: 24px;">
                     	<input type="submit" style="margin-right: 10px;" value="Submit" class="btn btn-primary active pull-right">
                   	</div>
	                </div>
	            </div>
		      </form>
		    </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
