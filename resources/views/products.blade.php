@extends('template')

@section('content')
<div id="products">
    <products-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
    </products-component>
</div>
@endsection