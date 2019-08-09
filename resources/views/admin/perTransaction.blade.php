@extends('admin.navbar')

@section('content_navbar')
<div id="per">
    <per-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        id="{{ $id }}">
    </per-component>
</div>
@endsection