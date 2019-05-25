@extends('template')

@section('content')
<div id="cartridges">
    <cartridges-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}"></cartridges-component>
</div>
@endsection