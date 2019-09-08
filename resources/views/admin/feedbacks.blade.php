@extends('admin.navbar')

@section('content_navbar')
<div id="feedbacks">
    <feedbacks-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
    </feedbacks-component>
</div>
@endsection