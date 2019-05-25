@extends('template')

@section('content')
<div id="index">
  <index-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}"></index-component>
</div>
@endsection