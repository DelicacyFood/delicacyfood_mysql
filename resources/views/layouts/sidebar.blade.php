<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Delicacy Food</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">Df</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Pages</li>
      <li class="{{ (strpos(Route::currentRouteName(), 'dashboard') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      {{-- <li class="{{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('home')}}"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
      
      @if(session()->get('role') == 'customer')
      <li class="{{ (strpos(Route::currentRouteName(), 'topup') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('topup')}}"><i class="far fa-credit-card"></i> <span>Top-up</span></a></li>
      @endif

      @if(session()->get('role') == 'customer')
      <li class="{{ (strpos(Route::currentRouteName(), 'ordermenu') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('ordermenu')}}">&nbsp;<i class="fa fa-table"></i> <span>Ordermenu</span></a></li>
      @endif
      
      @if(session()->get('role') == 'customer')
      <li class="{{ (strpos(Route::currentRouteName(), 'sales_record') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('sales_record')}}"><i class="fas fa-money-bill-wave"></i> <span>Sales Record</span></a></li>
      @endif

      @if(session()->get('role') == 'customer' || session()->get('role') == 'waiter')
      <li class="{{ (strpos(Route::currentRouteName(), 'menu') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('menu')}}"><i class="fas fa-utensils"></i> <span>Menu Page</span></a></li>
      @endif
      
      @if(session()->get('role') == 'driver')
      <li class="{{ (strpos(Route::currentRouteName(), 'driver_page') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('driver_page')}}"><i class="fas fa-motorcycle"></i> <span>Driver Page</span></a></li>
      @endif

      @if(session()->get('role') == 'waiter')
      <li class="{{ (strpos(Route::currentRouteName(), 'orderlist') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('orderlist')}}">&nbsp;<i class="fa fa-table"></i> <span>Orderlist</span></a></li>
      @endif
      
      @if(session()->get('role') == 'manager')
      <li class="{{ (strpos(Route::currentRouteName(), 'orderlist_manager') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('orderlist_manager')}}"><i class="fas fa-money-bill-wave"></i> <span>Restaurant Sales Record</span></a></li>
      @endif

      @if(session()->get('role') == 'waiter')
      <li class="{{ (strpos(Route::currentRouteName(), 'history_topup') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('history_topup')}}">&nbsp;<i class="fa fa-table"></i> <span>History Topup</span></a></li>
      @endif

      <li class="{{ (strpos(Route::currentRouteName(), 'faq') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('faq')}}"><i class="fas fa-columns"></i> <span>FAQ</span></a></li>
      <li class="menu-header">Auth</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
        <ul class="dropdown-menu">
          @if(!session()->has('hasLogin'))
          <li class="{{ (strpos(Route::currentRouteName(), 'login') === 0) ? 'active' : '' }}"><a href="{{route('login')}}">Login</a></li> 
          @else
          @if(session()->get('role') == 'customer')
          <li class="{{ (strpos(Route::currentRouteName(), 'profile') === 0) ? 'active' : '' }}"><a href="{{route('profile')}}">Profile</a></li> 
          @endif
          <li class="{{ (strpos(Route::currentRouteName(), 'update_password') === 0) ? 'active' : '' }}"><a href="{{route('update_password')}}">Update Password</a></li> 
          <li class="{{ (strpos(Route::currentRouteName(), 'register') === 0) ? 'active' : '' }}"><a href="{{route('register')}}">Register</a></li> 
          @endif
        </ul>
      </li>
      {{-- <li class="menu-header">Modules</li>
      <li class="{{ (strpos(Route::currentRouteName(), 'sweetalert') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('sweetalert')}}"><i class="fas fa-plug"></i> <span>Sweet Alert</span></a></li> --}}
      <li class="menu-header">Credit</li>
      <li class="{{ (strpos(Route::currentRouteName(), 'credits') === 0) ? 'active' : '' }}"><a class="nav-link" href="{{route('credits')}}"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{route('start')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-arrow-left" style="user-select: auto;"></i> Back to Main Page
      </a>
    </div>
  </aside>
</div>