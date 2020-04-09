
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
     @yield('head')
     
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'VMS') }}</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="{{url('//fonts.gstatic.com')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main1.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  </head>
  <body class="app sidebar-mini rtl">
      <!-- Navbar-->
    <header class="app-header">
      <a class="app-header__logo" href="{{url('/home')}}">{{ Auth::user()->name }}</a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar" id="sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        {{-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li> --}}
        <!--Notification Menu-->
        
         @include('notification')
    
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{route('change_password',Auth::user()->id)}}"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li> 
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-sign-out fa-lg"></span>Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
          <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          </div>
        </div>
        <ul class="app-menu">
        <?php if(session('user_rol') == 'admin' ) { ?>  
          <li><a class="app-menu__item active" href="{{url('admin')}}"><i class="app-menu__icon fa faces-dashboard"></i><span class="app-menu__label">ACL</span></a></li> 
          <li><a class="app-menu__item active" href="{{url('account')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Account</span></a></li>
          <li><a class="app-menu__item active" href="{{route('module.create')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Create Modules</span></a></li>
          <li><a class="app-menu__item active" href="{{url('module')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Modules List</span></a></li>
       <?php  }
        else{ ?>
          <li><a class="app-menu__item active" href="{{url('accountuser')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
          <li><a class="app-menu__item active" href="{{route('account_users')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Users</span></a></li>
          <li><a class="app-menu__item active" href="{{route('fleet.index')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Fleets</span></a></li>

          @can('can_see_expenses_details')

          <li><a class="app-menu__item active" href="{{route('expenses_details.index')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Expenses Details</span></a></li>

          @endcan

          @can('can_see_trip_details')
          <li><a class="app-menu__item active" href="{{route('account_trip_details')}}"><i class="fa fa-car pr-3" aria-hidden="true"></i><span class="app-menu__label">Trips</span></a></li>
          @endcan

          @can('can_see_tyre_details')

          <li><a class="app-menu__item active" href="{{route('account_tyre_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Tyre Details</span></a></li>
          @endcan

          @can('can_see_document_details')


            <li><a class="app-menu__item active" href="{{route('account_puc_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">PUC Details</span></a></li>
            <li><a class="app-menu__item active" href="{{route('account_rc_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">RC Details</span></a></li>
            <li><a class="app-menu__item active" href="{{route('account_fitness_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Fitness Details</span></a></li>
            <li><a class="app-menu__item active" href="{{route('account_insurance_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Insurance Details</span></a></li>
            <li><a class="app-menu__item active" href="{{route('account_permit_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Permit Details</span></a></li>

            <li><a class="app-menu__item active" href="{{route('account_roadtax_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">RoadTax Details</span></a></li>

          @endcan

          <li><a class="app-menu__item active" href="{{route('account_finance_details')}}"><i class="fa fa-truck pr-3" aria-hidden="true"></i><span class="app-menu__label">Vehicle Finance Details</span></a></li>
      <?php } ?>            
        </ul>
    </aside> 
        @yield('content')
    <footer>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <script src="{{asset('js/main_admin.js')}}"></script>
      <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
      <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    </footer>
  </body>
</html>
