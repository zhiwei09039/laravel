@component('mail::message')

#Thank you for your message
<strong>Name</strong> {{ $mess['name'] }}
<strong>Email</strong> {{ $mess['email'] }}

<strong>Message</strong>

{{ $mess['message'] }}
@endcomponent
