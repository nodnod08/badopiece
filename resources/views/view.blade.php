@extends('template')

@section('content')
<div id="view">
    <view-component type="{{{ $content['type'] }}}" id="{{{ $content['id'] }}}"></view-component>
</div>
@endsection