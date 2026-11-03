@component('mail::message')
# New Contact Received

You have received a new Contact. Below are the details:

**Name:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**Message:**
{{ $data['message'] }}

Thank you!

@endcomponent
