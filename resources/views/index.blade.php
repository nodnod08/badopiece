@extends('template')

@section('content')
<div id="index">
  <index-component
    auth="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}">
  </index-component>
</div>
@endsection