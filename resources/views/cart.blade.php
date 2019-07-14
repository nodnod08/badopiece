@extends('template')

@section('content')
<div id="cart">
    <cart-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        details="{{ Auth::user() }}">
    </cart-component>
</div>
@endsection