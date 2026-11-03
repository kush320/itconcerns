@component('mail::message')
# New Training Detail  Received

You have received a new Details. Below are the details:

**First Name:** {{ $data['first_name'] }}

**Last Name:** {{$data['last_name'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**address:** {{$data['address']}}

**Role:** {{$data['role']}}

**Message:**
{{ $data['message'] }}


Thank you!

@endcomponent
