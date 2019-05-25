@extends('template')

@section('content')
<div id="printers">
    <printers-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}"></printers-component>
</div>
@endsection