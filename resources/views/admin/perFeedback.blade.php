@extends('admin.navbar')

@section('content_navbar')
<div id="perFeedback">
    <perfeedback-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        id="{{ $id }}">
    </perfeedback-component>
</div>
@endsection