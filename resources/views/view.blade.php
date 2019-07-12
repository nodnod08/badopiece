@extends('template')

@section('content')
<div id="view">
    <view-component
        auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        type="{{{ $content['type'] }}}" tosearch="{{{ $content['id'] }}}"></view-component>
</div>
@endsection