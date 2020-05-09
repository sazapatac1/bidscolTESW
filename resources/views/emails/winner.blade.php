Winnermail.blade.php

@component('mail::message')
<h1>@lang('mail.congrats')</h1>

@lang('mail.message')

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
