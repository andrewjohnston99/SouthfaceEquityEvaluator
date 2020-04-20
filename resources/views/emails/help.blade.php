@component('mail::message')
{{ $data['message'] }}

---
### Submission Metadata
User: {{ $data['user'] }}<br>
User Email: {{ $data['email'] }}<br>
@isset($data['organization'])
Organization: {{ $data['organization'] }}
@endisset
---
*This email was authored in response to a Help Form Submission.*
@endcomponent
