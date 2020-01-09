
	<table id="myTable" >
	    <thead>
		    <tr >
	            <th style="width: 20px;">#</th>
	            <th style="width: 200px;">TYRE COMPANY</th>
	            <th style="width: 200px;">TYRE TYPE</th>
	            <th style="width: 200px;">CONDITION</th>
	            <th style="width: 200px;">ORDERED QTY.</th>
	            <th style="width: 200px;">REQUEST BY.</th>
	            <th style="width: 200px;">REMARKS</th>
				<th style="width: 200px;">ACTION</th>
			</tr>
		</thead>
		<tbody>

			<?php $ids = !empty(session('ids'))?session('ids') :array();
			$ses_data = !empty(session('data'))?session('data') :array();
			$count =1;
			$data1 = array();
			foreach($ids as $id){
			foreach($ses_data[$id] as $data){ ?>
		  	<tr>
			    <td>{{$count ++}}</td>
			    <td>
			      <input id="tyre_comp_name" name="tyre_comp_name[]" class="form-control " type="hidden" value="{{$data['comp_id']}}">{{$data['comp_name']}}
			    </td>
			    <td>
			      <input id="tyre_type_name" name="tyre_type_name[]" class="form-control " type="hidden" value="{{$id}}">{{$data['model_name']}}
			    </td>
			    <td>
			      <select id="tyre_condition" name="tyre_condition[]"  class="form-control">
			         <option value="0">Select..</option>
                     <option <?php if($data['condition_id'] == 1) {
                     echo "selected"; }?> value="1">NEW TYRE </option>
                     <option <?php if($data['condition_id'] == 2) {
                     echo "selected"; }?>  value="2">OLD TYRE</option>
                     <option <?php if($data['condition_id'] == 3) {
                     echo "selected"; }?>  value="3">REMOLDED TYRE</option>
                     <option <?php if($data['condition_id'] == 4) {
                     echo "selected"; }?> value="4">REJECTED TYRE</option>
                     <option <?php if($data['condition_id'] == 5) {
                     echo "selected"; }?> value="5">CUT REPAIRED TYRE</option>
			      </select>
			      @error('tyre_type_name')
			      <span class="invalid-feedback d-block" role="alert">
			        <strong>{{ 'Please select  Tyre Type' }}</strong>
			      </span>
			     @enderror 
			    </td>
			    <td>
			      <input id="tyre_order_qty" name="tyre_order_qty[]" class="form-control qty" value="{{$data['order_qty'] ? $data['order_qty']: ''}}">
			    </td>
			    <td>
			      <input id="tyre_request" name="tyre_request[]" class="form-control  " value="{{$data['request_by'] ? $data['request_by']: ''}}">
			    </td>
			    <td>
			      <input id="tyre_remark" name="tyre_remark[]" class="form-control  " value="{{$data['tyre_remark'] ? $data['tyre_remark']: ''}}">
			    </td>
			    <td>
			      <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
			    </td>
			    <input id="item_id" type="hidden" name="item_id[]" class="form-control  " value="{{$data['item_id']}}">
		  	</tr>
		   <?php }
			};  ?>
      	</tbody>
  </table>
<script type="text/javascript">

   $(document).ready( function () {
   		$('#myTable').DataTable({
      "searching": false,
      "bPaginate": false,
    });
   	})

</script>

