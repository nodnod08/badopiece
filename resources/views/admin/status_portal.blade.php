@extends('admin.navbar')

@section('content_navbar')
<div id="status_portal">
    <status_portal-component id="{{ $id }}">
    </status_portal-component>
</div>
@endsection