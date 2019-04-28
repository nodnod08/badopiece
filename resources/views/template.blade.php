<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>
          window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>

      <title>Pro Prints Enterprise | Printing Solutions For Business And Personal Use</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('storage/img/core-img/logo3.png') }}">
        <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    </head>
    <body>

      <div id="app">
        @yield('navbar')
        @if(Route::currentRouteName() == 'cartridges')
          @yield('cartridges-content')
        @endif
      </div>

      @if(Route::currentRouteName() == 'cartridges' || Route::currentRouteName() == 'printers' || Route::currentRouteName() == 'view')
        
      @else
        <div class="loader-back"></div>
            <div class="loader">
              <div class="radar-spinner" style="spinnerStyle">
                <div class="circle">
                  <div class="circle-inner-container">
                    <div class="circle-inner"></div>
                  </div>
                </div>
              
                <div class="circle">
                  <div class="circle-inner-container">
                    <div class="circle-inner"></div>
                  </div>
                </div>
              
                <div class="circle">
                  <div class="circle-inner-container">
                    <div class="circle-inner"></div>
                  </div>
                </div>
              
                <div class="circle">
                  <div class="circle-inner-container">
                    <div class="circle-inner"></div>
                  </div>
                </div>
              </div>  
        </div>
      @endif
      <script src="{{ asset('js/app.js') }}"></script>
      @if(Route::currentRouteName() == 'cartridges' || Route::currentRouteName() == 'printers' || Route::currentRouteName() == 'view')
      @else
        <script>
          window.addEventListener('load', function() {
              document.querySelector('.loader-back').style.display = 'none'; 
              document.querySelector('.loader').style.display = 'none'; 
          })
        </script>   
      @endif  
      @yield('extra-js')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
