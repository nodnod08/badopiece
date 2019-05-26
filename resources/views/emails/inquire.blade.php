@component('mail::message', ['url' => 'http://proprintsenterprise.com'])
{{-- <img height="150px" width="260px" src="{{ asset('storage/img/core-img/LOGO3.png') }}" alt="Logo"> --}}
<h4>Asking or Inquiring about Pro Prints Enterprise</h4>

{{ $data['message'] }}

@component('mail::button', ['url' => 'http://proprintsenterprise.com'])
Visit the site
@endcomponent

From: {{ $data['email'] }} <br>
Name: <b>{{ $data['fullname'] }}</b><br><br>
Thanks,<br>
Pro Prints Enterprise
@endcomponent