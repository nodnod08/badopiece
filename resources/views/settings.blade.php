@extends('template')

@section('content')
<div id="settings">
    <settings-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
    </settings-component>
</div>
@endsection