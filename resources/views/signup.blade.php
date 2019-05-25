@extends('template')

@section('content')
<div id="signup">
    <signup-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}"></signup-component>
</div>
@endsection