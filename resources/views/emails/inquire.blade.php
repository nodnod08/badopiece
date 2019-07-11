@component('mail::message', ['url' => 'http://badopiece.com'])
{{-- <img height="150px" width="260px" src="{{ asset('storage/img/core-img/LOGO3.png') }}" alt="Logo"> --}}
<h4>Asking or Inquiring about Badopiece Collection</h4>

{{ $data['message'] }}

@component('mail::button', ['url' => 'http://badopiece.com'])
Visit the site
@endcomponent

From: {{ $data['email'] }} <br>
Name: <b>{{ $data['fullname'] }}</b><br><br>
Thanks,<br>
Badopiece Collection
@endcomponent