@extends('template')

@section('content')
<div id="transaction">
    <transaction-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        id="{{ $id }}">
    </transaction-component>
</div>
@endsection