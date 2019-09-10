@component('mail::message', ['url' => 'http://badopiece.com'])
{{-- <img height="150px" width="260px" src="{{ asset('storage/img/core-img/LOGO3.png') }}" alt="Logo"> --}}
<h4>Replied from your message</h4>
<small><i>"{{ $data['message'] }}"</i></small>
<br>
<br>
<h4>Admin Message</h4>
{!! $data['admin_message'] !!}

@component('mail::button', ['url' => 'http://badopiece.com'])
Visit the site
@endcomponent

From: badopiece.inquire@gmail.com <br>
Name: <b>Badopiece Team</b><br><br>
Thanks,<br>
Badopiece Collection
@endcomponent