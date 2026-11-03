@component('mail::message')
# New Career Detail  Received

You have received a new Details. Below are the details:

**Name:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**address:** {{$data['address']}}

**Message:**
{{ $data['message'] }}

**CV:**
{{$data['cv']}}

Thank you!

@endcomponent
