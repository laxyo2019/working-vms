 <table id="newtable" class="row sup_table">
	<thead>
		<tr>
	        <th style="width: 20px;">#</th>
	        <th style="width: 200px;">EXPENSE TYPE</th>
	        <th style="width: 200px;">EXPENSE DETAIL</th>
			<th style="width: 200px;">VEHICLE NO</th>
			<th style="width: 200px;">QUANTITY</th>
            <th style="width: 200px;">RATE</th>
            <th style="width: 200px;">AMOUNT</th>
            <th style="width: 200px;">SERVICE TAX%</th>
            <th style="width: 200px;">SERVICE TAX AMT</th>
            <th style="width: 200px;">VAT TAX%</th>
            <th style="width: 200px;">VAT TAX AMT</th>
            <th style="width: 200px;">NET AMT</th>
		</tr>
	</thead>
	<tbody>
			<?php $count = 0;
				$cc = 0;
			?>
			<?php $ids   = session('ids') ? session('ids'):array(); ?>
			@foreach($ids as $id)
				<?php  $id = $id[$count]; ?>
				<?php $data1  = session('data') ? session('data')[$id] :array();?>

				@foreach($data1 as $data) 

						<input type='hidden' value="{{$data['expense_details']}}" name = "expense_details[]" >
					<tr data-id ="tr_{{$data['id']}}">
						<td style=" width:20px; padding-left: 20px;">
						<a  style="cursor: pointer;color: #ff0000" data="{{$id}}" id="trash1"><i style="margin-right: 5px; " class="fas fa-trash" aria-hidden="true"></i></a>
						<input type='hidden' value="{{$data['item_id'] ? $data['item_id'] : ''}}" name = "item_id[]" >
						<input type='hidden' value="{{$data['vehicle_id']}}" name = "vehicle_id[]" >
						<input type='hidden' value="{{$data['expense_type_id']}}" name = "expense_type_id[]" >
						</td>
						<td style="width: 200px;">{{$data['expense_type']}}</td>
						<td style="width: 200px;">{{$data['expense_details']}}</td>
						<td style="width: 200px;">{{$data['vehicle_no']}}</td>

						<td style="width: 200px;"><input class="form-control qty" type="number" id="qty_{{$data['id']}}" data-id = '{{$data['id']}}' value="{{$data['qty'] !='' ? $data['qty'] :''}}" name="qty[]" >

							@error('qty.'.$cc)
							<span class="text-danger" role="alert">
							<strong>{{ 'Please enter Quantity' }}</strong>
							</span>
							@enderror
						</td>
						<td style="width: 200px;"><input class="form-control rate" type="text" value="{{$data['rate'] !='' ? $data['rate'] :''}}" id="rate_{{$data['id']}}" data-id = '{{$data['id']}}' name="rate[]">

							@error('rate.'.$cc)
							<span class="text-danger" role="alert">
							<strong>{{ 'Please enter rate' }}</strong>
							</span>
							@enderror
						</td>
						<td style="width: 200px;"><input readonly="true" class="form-control ac_amt" type="text" id="amt_{{$data['id']}}" value="{{$data['amt'] !='' ? $data['amt'] :''}}" name="amt[]">

						</td>
						<td style="width: 200px;"><input class="form-control service_tax" type="text" value="{{$data['service_tax'] !='' ? $data['service_tax'] :''}}" data-id = '{{$data['id']}}' id="service_tax{{$data['id']}}" name="service_tax[]">

						@error('service_tax.'.$cc)
						<span class="text-danger" role="alert">
						<strong>{{ 'Please enter discount' }}</strong>
						</span>
						@enderror

						</td>
						<td style="width: 200px;"><input class="form-control service_tax_amt_t" type="text" value="{{$data['service_tax_amt'] !='' ? $data['service_tax_amt'] :''}}" name="service_tax_amt_t[]" readonly="true" id="service_tax_amt_t{{$data['id']}}"></td>

						<td style="width: 200px;"><input class="form-control vat_tax" type="text" value="{{$data['vat_tax'] !='' ? $data['vat_tax'] :''}}" id="vat_tax{{$data['id']}}" data-id = '{{$data['id']}}'  name="vat_tax[]">

						@error('vat_tax.'.$cc)
						<span class="text-danger" role="alert">
						<strong>{{ 'Please enter vat_tax' }}</strong>
						</span>
						@enderror
						</td>
						<td style="width: 200px;"><input readonly="true" class="form-control vat_tax_amt_t" id="vat_tax_amt_t{{$data['id']}}" type="text" value="{{$data['vat_tax_amt'] !='' ? $data['vat_tax_amt'] :''}}" name="vat_tax_amt_t[]"></td>

						<td style="width: 200px;"><input readonly="true" id="net_amt_{{$data['id']}}" class="form-control net_amt" type="text" value="{{$data['net_amt'] !='' ? $data['net_amt'] :''}}" name="net_amt[]"></td>

					</tr>
					<?php ++$cc ?>
				@endforeach
			@endforeach
	</tbody>
</table>
<script>
	$(document).ready(function(){
		 $('#newtable').DataTable();
	})
</script>