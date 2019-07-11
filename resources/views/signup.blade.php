@extends('template')

@section('content')
<div id="signup">
    <signup-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
    </signup-component>
</div>
@endsection