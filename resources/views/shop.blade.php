@extends(Route::currentRouteName() == 'printers' ? 'navbar' : 'template')

    @if (Route::currentRouteName() == 'printers')
        @section('content')
            <printers-component></printers-component>
        @endsection    
    @else
        @section('cartridges-content')
            <cartridges-component></cartridges-component>
        @endsection
    @endif