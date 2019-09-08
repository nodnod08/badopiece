@extends('admin.navbar')

@section('content_navbar')
<div id="inquiries">
    <inquiries-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
    </inquiries-component>
</div>
@endsection