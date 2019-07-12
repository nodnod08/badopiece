<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
    window.Laravel = { csrfToken: '{{ csrf_token() }}' }
  </script>

  <title>Badopiece Collection | Clothes and Accessories</title>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="icon" type="image/png" href="{{ asset('storage/img/core-img/logo3.png') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Oswald:300" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <div id="app">

  </div>

  {{-- <div id="app"> --}}
  @yield('content')
  {{-- </div> --}}

  @if(Route::currentRouteName() == 'products' ||
  Route::currentRouteName()
  == 'view')

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

  @if(Route::currentRouteName() == 'products' || Route::currentRouteName()
  == 'view')
  @else
  <script>
    window.addEventListener('load', function() {
              document.querySelector('.loader-back').style.display = 'none'; 
              document.querySelector('.loader').style.display = 'none'; 
          })
  </script>
  @endif

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/'.Route::currentRouteName().'.js') }}"></script>
</body>

</html>