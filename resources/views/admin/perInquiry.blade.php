@extends('admin.navbar')

@section('content_navbar')
<div id="perInquiry">
    <perInquiry-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        id="{{ $id }}">
    </perInquiry-component>
</div>
@endsection