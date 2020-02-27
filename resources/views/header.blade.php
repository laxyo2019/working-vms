<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         @yield('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel = "icon" href ="{{asset('image/fleetio-logo-mark-only.svg')}}" type = "image/x-icon" style="line-height: 40px;">
        <title>Vehicle Management System</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main_css.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/TableTools.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/themes.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/main1.css')}}">

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- #region datatables files -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" />
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('js/main_admin.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
        <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dropdown/2.0.3/jquery.dropdown.min.js"></script>
        <!-- Fonts -->
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!-- Styles -->
    </head>
    <body class="app sidebar-mini rtl">
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr> 
                <td align="center" valign="top">
                    <div id="navigation">
                        <div class="container-fluid">
                            <ul class='main-nav'>
                                <li class='<?php if(Request::segment(1) == 'dashboard'){ echo 'active'; } ?>' id="L1"><a href="{{route('dashboard.index')}}"><span>Dashboard</span>
                                </a></li>
                                <li id="L2" class='<?php if( (Request::segment(1) == 'city') || (Request::segment(1) == 'state') || (Request::segment(1) == 'vehicle') || (Request::segment(1) == 'vehicleModel') || (Request::segment(1) == 'vehicledetails') || (Request::segment(1) == 'driver') || (Request::segment(1) == 'agent') || (Request::segment(1) == 'company')){ echo 'active'; } ?>'><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Setup</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li class='dropdown-submenu'><a href="#">Other Setup</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('state.index')}}">State Setup</a></li>
                                                <li><a href="{{route ('city.index')}}">City Setup</a></li>
                                                <li><a href="{{route ('agent.index')}}">Agent</a></li>
                                                <li><a href="{{route ('company.index')}}">Insurance Company</a></li>
                                                <li><a href="{{route ('insurance_type.index')}}">Insurance Type</a></li>
                                                <li><a href="#">Expense Type Setup</a></li>
                                            </ul>
                                        </li>
                                        <li class='dropdown-submenu'><a href="#">Vehicle Setup</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('vehicle.index')}}">Vehicle Company</a></li>
                                                <li><a href="{{route('vehicleModel.index')}}">Vehicle Model</a></li>
                                                <li><a href="{{route('vehicledetails.index')}}">Vehicle Details</a></li>
                                                <li><a href="{{route('kmupdate.index')}}">Vehicle KM Update</a></li>
                                                <li><a href="{{route('driver.index')}}">Driver Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('vch_status.index')}}">Vehicle Status</a></li>
                                    </ul>
                                </li>
                                <li  class='<?php if( (Request::segment(1) == 'fitness') || (Request::segment(1) == 'pucdetails') ||  (Request::segment(1) == 'roadtax') || (Request::segment(1) == 'greentax') || (Request::segment(1) == 'insurance') || (Request::segment(1) == 'statepermit') ){ echo 'active'; }?>' id="L3"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Documents</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('pucdetails.index')}}">PUC Details</a> </li>
                                        <li><a href="{{route('fitness.index')}}">Fitness Details</a> </li>
                                        <li><a href="{{route('roadtax.index')}}">Road Tax Details</a> </li>
                                        <li><a href="{{route('insurance.index')}}">Insurance Details</a> </li>
                                        <li><a href="{{route('statepermit.index')}}">Permit</a> </li>
                                        <li><a href="{{route('rcdetails.index')}}">RC Details</a> </li>
                                    </ul>
                                </li>
                                <li class="<?php if ((Request::segment(1) == 'sparetype') || (Request::segment(1) == 'spareunit') || (Request::segment(1) == 'sparecompany') || (Request::segment(1) == 'sparemaster')|| (Request::segment(1) == 'sparevendor') ){ echo 'active'; }?>" id="L4"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Spare-Inventory</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li class='dropdown-submenu'><a href="#">Setup</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('sparetype.index')}}">Spare Type</a></li>
                                                <li><a href="{{route('spareunit.index')}}">Spare Unit</a></li>
                                                <li><a href="{{route('sparecompany.index')}}">Spare Company</a></li>
                                                <li><a href="{{route('sparemaster.index')}}">Spare Master</a></li>
                                                <li><a href="{{route('sparevendor.index')}}">Supplier/Vendor</a></li>
                                            </ul>
                                        </li>
                                        <li class='dropdown-submenu'><a href="#">Transactions</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('material_request.index')}}">Material Request</a></li>
                                                <li><a href="{{route('purchase_order.index')}}">Purchase Order</a></li>
                                                <li><a href="fgrn.aspx">Goods Receipt Note(GRN)</a></li>
                                                <li><a href="fitemissue.aspx">Spare Issue</a></li>
                                                <li><a href="fitemstockupdate.aspx">Spare Stock Update</a></li>
                                                <li><a href="fSparepaymententry.aspx">Spare Vendor Payment</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="SpareInventoryReport.aspx"><span>Reports</span></a> </li>
                                    </ul>
                                </li>
                                <li id="L5" class="<?php if ((Request::segment(1) == 'tyrecompany')
                                                || (Request::segment(1) == 'tyremodel') || (Request::segment(1) == 'tyrevendor') || (Request::segment(1) == 'tyretype')) { echo 'active'; } ?>"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Tyre-Inventory</span>
                                    <span class=""></span></a>
                                    <ul  class="dropdown-menu">
                                        <li  class='dropdown-submenu'><a href="#">Setup</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('tyrecompany.index')}}">Tyre Company</a></li>
                                                <li><a href="{{route('tyremodel.index')}}">Tyre Type</a></li>
                                                {{-- <li><a href="{{route('tyretype.index')}}">Tyre Type</a></li> --}}
                                                <li><a href="{{route('tyrevendor.index')}}">Supplier/Vendor</a></li>
                                            </ul>
                                        </li>
                                        <li class='dropdown-submenu'><a href="#">Transactions</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('tyre_material_request.index')}}">Material Request</a></li>
                                                <li><a href="{{route('tyre_purchase.index')}}">Purchase Order</a></li>
                                                <li ><a href="{{route('tyre_grn.index')}}" >Goods Receipt Note(GRN)</a></li>
                                                <li><a href="{{route('tyre_remolding.index')}}">Tyre Remolding Issue</a></li>
                                                <li><a href="{{route('tyre_remolding_return.index')}}">Tyre Remold Return</a></li>
                                                <li><a href="{{route('tyre_stock.index')}}">Tyre Stock</a></li>
                                                <li><a href="ftyreissuetovehicle.aspx">Tyre Issue To Vehicle</a></li>
                                                <li><a href="ftyreexpenseentry.aspx">Tyre Expense</a></li>
                                                <li><a href="ftyrepaymententry.aspx">Tyre Vendor Payment</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="TyreReport.aspx"><span>Reports</span></a> </li>
                                    </ul>
                                </li>
                             <!--   <li class="<?php if( (Request::segment(1) == 'petrolpump') || (Request::segment(1) == 'fuelentry') || (Request::segment(1) == 'fuelbill')){ echo 'active' ;} ?> " id="L6"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Fuel</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('petrolpump.index')}}">Petrol Pump Details</a> </li>
                                        <li><a href="{{route('fuelentry.index')}}">Fuel Filled Entry</a> </li>
                                        <li><a href="{{route('fuelbill.index')}}">Fuel Bill Payment</a> </li>
                                    </ul>
                                </li> -->
                                <li id="L7"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Expenses</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('expense_type.index')}}">Add Expenses Type</a></li>
                                        <li><a href="{{route('party.index')}}">Add Party</a></li>
                                        <li><a href="{{route('expanses.index')}}">Add Expense</a></li>
                                       {{--  <li><a href="{{route('expanses_entry.index')}}">Expense Entry</a></li>
                                        <li><a href="{{route('expanses_payment_entry.index')}}">Expense Payment Entry</a></li> --}}
                                        <li><a href="{{route('accident_entry.index')}}">Accident Entry</a></li>
                                        <li><a href="{{route('expenses_report.index')}}"><span>Reports</span></a> </li>
                                    </ul>
                                </li>
                              {{--   <li id="L8" class="{{Request::segment(1) == 'filter' ? 'active' : ''}} {{Request::segment(1) == 'oilchange' ? 'active' : ''}} {{Request::segment(1) == 'fueltank' ? 'active' : ''}} {{Request::segment(1) == 'batterycharge' ? 'active' : ''}} {{Request::segment(1) == 'painting' ? 'active' : ''}} oilchange"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Repair/Maintenance</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu ">
                                        <li class=""><a href="{{route('filter.index')}}">Filter Replacement</a></li>
                                        <li><a href="{{route('oilchange.index')}}">Oil Change</a></li>
                                        <li><a href="{{route('batterycharge.index')}}">Battery Charging</a></li>
                                        <ul class="dropdown-menu ">
                                            
                                        </ul> 
                                        <li class="dropdown-submenu"><a href="#">Other</a>
                                            <ul class="dropdown-menu">
                                               <li><a href="{{route('painting.index')}}">Painting Job</a></li>
                                                <li><a href="{{route('fueltank.index')}}">Fuel Tank Cleaning</a></li>
                                            </ul>
                                        </li>                                 
                                    </ul>
                                </li> --}}
                                <li id="L9"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Finance</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('vehiclefinance.index')}}">Finance Entry</a></li>
                                        <li><a href="{{route('vehiclereport.index')}}"><span>Reports</span></a> </li>
                                    </ul>
                                </li>
                                <li id="L10"><a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Trip</span>
                                    <span class=""></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('Trip.index')}}">Trip Sheet</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                           
                            <div class="user">
                                  
                                <div class="dropdown">
                                    <a href="#" class='dropdown-toggle' data-toggle="dropdown">
                                        {{Auth::user()->name}}
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image" class="img-circle" width="22%">
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{route('dashboard.edit',Auth::user()->id)}}" style="color: Black;">Change Password</a> </li>
                                        <li>
                                           <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                           </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                             <ul class='main-nav pull-right'>
                                
                            @include('notification')
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
     </table>
    </body>
</html>
