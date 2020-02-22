@extends('state.main') @section('content')
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
		        <div class="info">
		          <h4><b><i>vehicle details</i></b></h4>
		          {{-- <p><b>{{$fleet}}</b></p> --}}
		        </div>
		        <a class="icon fa  fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>{{$vch_count}}</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
		        <div class="info">
		          <h4><b><i>PUC Details</i></b></h4>
		          {{-- <p><b>{{$puccount}}</b></p> --}}
		        </div>
		        <a class="icon fa fa-3x  btn" href="{{route('account_users')}}"><lable style="font-size: 15px;" >TOTAL<p>{{$puccount}}</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
		        <div class="info">
		          <h4><b><i>rc details</i></b></h4>
		          <p><b>{{-- {{$rccount}} --}}</b></p>
		        </div>
		        <a class="icon fa  fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>{{$rccount}}</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-car fa-3x"></i>
		        <div class="info">
		          <h4><b><i>insurance details</i></b></h4>
		          {{-- <p><b>{{$i}}</b></p> --}}
		        </div>
		        <button type="button" class="btn btn-info btn-lg icon fa fa-3x btn" data-toggle="modal" data-target="#myModal"><lable style="font-size: 15px;" >TOTAL<p>{{$inscount}}</p></lable></button>
		      </div>
		    </div>
	        <div class="col-md-3 col-lg-3">
	          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
	            <div class="info">
	              <h4><b><i>fitness Details</i></b></h4>
	              {{-- <p><b>{{$user}}</b></p> --}}
	            </div>
	            <a class="icon fa  fa-3x  btn" href="{{route('account_users')}}"><lable style="font-size: 15px;" >TOTAL<p>{{$fitnesscount}}</p></lable></a>
	          </div>
	        </div>
	        <div class="col-md-3 col-lg-3">
	          <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
	            <div class="info">
	              <h4><b><i>roadtax details</i></b></h4>
	              <p><b>50000</b></p>
	            </div>
	              <a class="icon fa fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>{{$roadcount}}</p></lable></a>
	          </div>
	        </div>
	        <div class="col-md-3 col-lg-3">
	          <div class="widget-small warning coloured-icon"><i class="icon fa fa-car fa-3x"></i>
	            <div class="info">
	              <h4><b><i>permit details</i></b></h4>
	              {{-- <p><b>{{$i}}</b></p> --}}
	            </div>
	            <button type="button" class="btn btn-info btn-lg icon fa fa-3x btn" data-toggle="modal" data-target="#myModal"><lable style="font-size: 15px;" >TOTAL<p>{{$permitcount}}</p></lable></button>
	          </div>
	        </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small danger coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Drivers details</i></b></h4>
		          {{-- <p><b>{{$driver_count}}</b></p> --}}
		        </div>
		          <a class="icon fa fa-3x btn" href="{{url('/Alldriver')}}"><lable style="font-size: 15px;" >TOTAL<p>{{$driver_count}}</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Incomes</i></b></h4>
		          <p><b>50000</b></p>
		        </div>
		          <a class="icon fa fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>12</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small info coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>Expences</i></b></h4>
		          <p><b>20000</b></p>
		        </div>
		          <a class="icon fa fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>12</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
		      <div class="widget-small danger coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
		        <div class="info">
		          <h4><b><i>vehicle finance details</i></b></h4>
		          {{-- <p><b>{{$driver_count}}</b></p> --}}
		        </div>
		          <a class="icon fa fa-3x btn" href="{{url('/Alldriver')}}"><lable style="font-size: 15px;" >TOTAL<p>12</p></lable></a>
		      </div>
		    </div>
		    <div class="col-md-3 col-lg-3">
	          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
	            <div class="info">
	              <h4><b><i>vehicle trip Details</i></b></h4>
	              {{-- <p><b>{{$user}}</b></p> --}}
	            </div>
	            <a class="icon fa  fa-3x  btn" href="{{route('account_users')}}"><lable style="font-size: 15px;" >TOTAL<p>12</p></lable></a>
	          </div>
	        </div>
	        <div class="col-md-3 col-lg-3">
		      <div class="widget-small warning coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
		        <div class="info">
		          <h4><b><i>vehicles accident details</i></b></h4>
		          <p><b>50000</b></p>
		        </div>
		          <a class="icon fa fa-3x btn" href="{{route('fleet.index')}}"><lable style="font-size: 15px;" >TOTAL<p>12</p></lable></a>
		      </div>
		    </div>
		</div>
	</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 208px;">
            <div class="modal-header">
                <h3><b>Please Select Any One..</b></h3>
            </div>
            <div class="modal-body">
                <table id="account_table">
                    <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>fleets</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $count = 0;
                    foreach($data['fleet_id'] as $fleet){
                       $fleet_name = App\Fleet::find($fleet->fleet_id);  

                 ?>
                            <tr>
                                <td>{{ ++$count }}</td>
                                <td>{{ $fleet_name->fleet_code }}</td>
                                <td>
                                    <input type="radio" name="select_fleet" class="select_fleet" value="{{ $fleet_name->fleet_code }}">
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <input disabled="true" type="submit" class="btn btn-primary" value="Submit" id="submit">
            </div>
        </div>
    </div>
</div>
</body>

</html>
<input type="hidden" , id='fleet' name='fleet' value="{{ session('fleet_code') ?? $data['fleet'] }}">

<script type="text/javascript">
    $(document).ready(function() {
        $('#account_table').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": false
        });
    })
    $(document).ready(function() {

        var fleet = $('#fleet').val();
        if (fleet == 'yes') {
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    })

    $(document).on('click', '#submit', function(event) {
        event.preventDefault();
        var fleet_code = $("input:radio.select_fleet:checked").val();
        $.ajax({
            url: '/fleet_ckeck',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                fleet_code: fleet_code
            },
            success: function(data) {
                if (data == 'success') {
                    $('#myModal').modal('hide');
                    location.reload(); // for reload page
                }
            }
        })
    });

    $(document).on('click', 'input[name="select_fleet"]', function() {
        if ($(this).is(':checked')) {
            $('#submit').attr('disabled', false)
        } else {
            alert("not checked");
        }
    });
</script>
@endsection