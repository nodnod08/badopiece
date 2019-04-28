@extends('template')

@section('navbar')
  <ul id="dropdown1" class="dropdown-content">
    <li><a class="black-text" href="#!">Account Settings</a></li>
    <li class="divider"></li>
    <li><a class="black-text" href="{{ route('logout_user_sesion_destroy') }}">Logout</a></li>
  </ul>
  <ul id="dropdown2" class="dropdown-content">
    <li><a class="black-text" href="#!">Account Settings</a></li>
    <li class="divider"></li>
    <li><a class="black-text" href="{{ route('logout_user_sesion_destroy') }}">Logout</a></li>
  </ul>
  <div class="navbar-fixed z-depth-5">
    <nav class="white">
      <div class="container nav-wrapper">
        <a href="{{ route('index') }}" class="brand-logo head-nav"><img src="{{ asset('storage/img/core-img/logo3.png') }}" height="80"></a>
        <a href="#" data-target="mobile-demo" class="black-text sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li class="{{ Route::currentRouteName() == 'cartridges' ? 'active' : '' }}"><a class="black-text navbar-text" href="{{ route('cartridges') }}">CARTRIDGES</a></li>
          <li class="{{ Route::currentRouteName() == 'printers' ? 'active' : '' }}"><a class="black-text navbar-text" href="{{ route('printers') }}">PRINTERS</a></li>
          <li class="{{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}"><a class="black-text navbar-text" href="{{ route('about-us') }}">ABOUT US</a></li>
          @guest
            <li class="{{ Route::currentRouteName() == 'login' ? 'active' : '' }}"><a class="black-text navbar-text" href="{{ route('login') }}">LOGIN</a></li>
          @else
            <li><a class="black-text dropdown-trigger" href="#!" data-target="dropdown1">Hi {{ Auth::user()->provider_name != null || Auth::user()->provider_name != '' ? Auth::user()->name : Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i></a></li>
          @endguest
          <cart-component></cart-component>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-demo">
    <a href="{{ route('index') }}" class="brand-logo black-text"><img src="{{ asset('storage/img/core-img/logo3.png') }}" height="62"></a>
    <li class="{{ Route::currentRouteName() == 'cartridges' ? 'active' : '' }}"><a class="black-text" href="{{ route('cartridges') }}">CARTRIDGES</a></li>
    <li class="{{ Route::currentRouteName() == 'printers' ? 'active' : '' }}"><a class="black-text"href="{{ route('printers') }}">PRINTERS</a></li>
    <li class="{{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}"><a class="black-text"href="{{ route('about-us') }}">ABOUT US</a></li>
    @guest
      <li class="{{ Route::currentRouteName() == 'login' ? 'active' : '' }}"><a class="black-text navbar-text" href="{{ route('login') }}">LOGIN</a></li>
    @else
    <li><a class="black-text dropdown-trigger" href="#!" data-target="dropdown2">Hi {{ Auth::user()->provider_name != null || Auth::user()->provider_name != '' ? Auth::user()->name : Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i></a></li>
    @endguest
    <cart-component></cart-component>
  </ul>

    @yield('content')

  <footer class="page-footer white">
    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="black-text">Our Team</h5>
          <ul>
            <li class="black-text"><i class="fas fa-user"></i> Mr. JP Escartin</li>
            <li class="black-text"><i class="fas fa-user"></i> MR. Riki Pardo</li>
            <li class="black-text"><i class="fas fa-user"></i> MR. Alvin Valeza</li>
            <li class="black-text"><i class="fas fa-user"></i> MR. Marlon Dungca</li>
            <li class="black-text"><i class="fas fa-user"></i> MR. Jonard Lero Escartin</li>
          </ul>
        </div>
        <div class="col l4 s12">
          <h5 class="black-text">Contact us</h5>
          <ul>
            <li class="black-text"><i class="fas fa-envelope"></i> ppe.sales@proprintsenterprise.com</li>
            <li class="black-text"><i class="fas fa-envelope"></i> techsupport@proprintsenterprise.com</li>
            <li class="black-text"><i class="fas fa-phone"></i> Landline  517-3813</li>
          </ul>
        </div>
        <div class="col l4 s12">
          <h5 class="black-text">Locate us</h5>
          <ul>
            <li class="black-text"><i class="fas fa-map-marker-alt"></i> 586 Jenny’s Ave., Maybunga, Pasig City Sison Mansion, Rockefeller St., San Isidro, Makati City</li>
            <li class="black-text"><i class="fas fa-calendar-alt"></i> Office hrs. Monday to Friday ( 8:00 am to 5:00 pm )</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-2">
      <div class="container center-align">
      <small class="center-align">© {{ date('Y') }} Copyright Pro Prints Enterprise | Cartridges and Printers</small>
      </div>
    </div>
  </footer> 
@endsection
@section('extra-js')
  <script type="text/javascript">
    var optionsDropdown = {
      alignment : 'right'
    }
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.dropdown-trigger');
      var instances = M.Dropdown.init(elems, optionsDropdown);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var options = {
        opacity: 0.5
      }
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, options);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var optionsC = {
        inDuration : 300,
        outDuration : 300
      }
      var elems = document.querySelectorAll('.collapsible');
      var instances = M.Collapsible.init(elems, optionsC);
    });
  </script>
@endsection
