@component('mail::message')
# Nuovo messaggio dal form di contatto

**Nome:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Messaggio:**
{{ $data['message'] }}

@endcomponent
