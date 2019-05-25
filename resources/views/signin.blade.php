@extends('template')

@section('content')
<div id="signin">
    <signin-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}"></signin-component>
</div>
@endsection