@component('mail::message')
<h4>Asking or Inquiring about Pro Prints Enerprise</h4>

{{ $data['message'] }}

@component('mail::button', ['url' => 'http://proprintsenterprise.com'])
Visit the site
@endcomponent

From: {{ $data['email'] }} <br>
Name: <b>{{ $data['fullname'] }}</b><br><br>
Thanks,<br>
Pro Prints Enterprise
@endcomponent