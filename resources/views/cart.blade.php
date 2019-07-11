@extends('template')

@section('content')
<div id="cart">
    <cart-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
    </cart-component>
</div>
@endsection