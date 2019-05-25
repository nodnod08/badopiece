@extends('template')

@section('content')
<div id="view">
    <view-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}" type="{{{ $content['type'] }}}"
        id="{{{ $content['id'] }}}"></view-component>
</div>
@endsection