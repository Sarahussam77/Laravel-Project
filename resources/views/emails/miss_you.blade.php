@component('mail::message')
# We Miss You

Dear {{ $user->name }},

It's been a while since you last logged into our platform. We miss your presence and would love to have you back.

Please visit our website and explore the latest features and updates.

@component('mail::button', ['url' => $url])
Visit Our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent