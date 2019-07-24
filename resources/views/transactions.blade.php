@extends('template')

@section('content')
<div id="transactions">
    <transactions-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        authdetails="{{ Auth::user() }}">
    </transactions-component>
</div>
@endsection