@extends('state.main') 
@section('content')
<div class="container">
<div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-color orange box-condensed box-bordered">
        <div class="box-title">
          <div class="col-sm-6 col-md-6">
              <h3>PUC DOCUMENT DETAILS</h3>
          </div>
          <div class="col-sm-2 col-md-2">
              <a style="margin-bottom: 5px;" href="{{route('pucdetails.create')}}" class="btn btn-inverse pull-right" ><i style="margin-right: 5px; " class="fas fa-plus"></i>ADD NEW</a>
          </div>
          <div class="col-sm-4 col-md-4">
           <form id="target" class="pull-right" action="{{ route('pucdetails.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="file btn btn-inverse"><i class="fa fa-file-download"></i>
                Import
                <input id="file" type="file" name="file"/>
              </div>
                <a class="btn btn-inverse" href="{{ route('pucdetails.export') }}"><i style="margin-right: 5px; " class="fa fa-file-import"></i>Export Bulk Data</a>
                <a class="btn btn-inverse" href="{{route('pucdetl.download') }}"><i style="margin-right: 5px; " class="fa fa-file-import"></i>Format</a>

            </form>  
                       
          </div>
       
            <table id="myTable">
              <thead>
                <tr >
                  <th style="width: 100px;">SR. NO</th>
                  <th style="width: 320px;">PUC NUMBER</th>
                  <th style="width: 320px;">VEHICLE NUMBER</th>
                  <th style="width: 320px;">PUC AMOUNT</th>
                  <th style="width: 320px;">VALID FROM</th>
                  <th style="width: 320px;">EXPIRY DATE</th>
                  <th style="width: 61px;">ACTION</th>
                </tr>
              </thead>
              
              <?php $count = 0; ?>
              @foreach($pucDetails as $pucdetails) 
              @php ($vch_no = \App\vehicle_master::find($pucdetails->vch_id)) 
                       
                <tr>
                  <td style="width: 10%;  padding-left: 20px;">{{++$count}}</td>
                  <td style="width: 17%;padding-left: 20px">{{$pucdetails->puc_no}}</td>
                  <td style="padding-left: 20px">{{$vch_no == null ? '' : $vch_no->vch_no}}</td>
                  <td style="padding-left: 20px">{{$pucdetails->puc_amt}}</td>
                  <td style="padding-left: 20px">{{$pucdetails->valid_from}}</td>
                     <?php
                      if(strtotime($pucdetails->valid_till) <= strtotime($carbondate) && strtotime($pucdetails->valid_till) >= strtotime($curr) ){
                        ?>
                        <td style="padding-left: 20px;color: red;">{{$pucdetails->valid_till}}<span class="blinking" style="color: red;"><br><b>RENEW DATE...</b> </span></td>
                        <?php
                      }elseif(strtotime($pucdetails->valid_till) < strtotime($curr)){
                        ?>
                        <td style="padding-left: 20px;">{{$pucdetails->valid_till}}<span class="blinking" style="color: red;"><b> EXPIRED...</b> </span></td>
                        <?php
                      }else{ 
                        ?>
                  <td style="padding-left: 20px;">{{$pucdetails->valid_till}}</td>
                  <?php
                      }
                  ?>
                  <td style="width:10%; text-align:center;">
                    <a style="padding: 2px 5px;" href="{{route('pucdetails.edit',$pucdetails->id)}}" runat="server" class="btn btn-success" rel="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a style="padding: 2px 7px;" onclick="javascript:return confirm('Do You Really Want To Delete This?');" href="{{route('pucdetails.delete',$pucdetails->id)}}" class="btn btn-inverse" rel="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>                    
                  </td>
                </tr>
                @endforeach
      
              </tbody>
            </table>
            
            </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
    $('#file').change(function() {
       $('#target').submit();
      });

} );

</script>
@endsection