@component('mail::message')
# New Quote Received

You have received a new Quote. Below are the details:

**Name:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**Induiry:** {{$data['inquiry']}}

**Message:**
{{ $data['message'] }}

Thank you!

@endcomponent
