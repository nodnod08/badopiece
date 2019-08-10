@extends('template')

@section('content')
<div id="status">
    <status-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        id="{{ $id }}">
    </status-component>
</div>
@endsection