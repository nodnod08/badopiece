@extends('navbar')

@section('content')
    <view-component type="{{{ $content['type'] }}}" id="{{{ $content['id'] }}}"></view-component>
@endsection