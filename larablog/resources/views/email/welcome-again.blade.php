@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'http://localhost/laravel_tut/larablog/public/register'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
