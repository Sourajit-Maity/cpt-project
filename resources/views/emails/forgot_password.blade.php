@component('mail::message')
# Confirmation Code

Your confirmation code is: {{$cnf_code}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
