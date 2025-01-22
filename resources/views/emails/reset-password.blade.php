@component('mail::message')
# Reset Password Request

Hello {{ $user->name }},

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => route('password.reset', ['token' => $token, 'email' => $user->email])])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}

@if (config('app.env') === 'production')
This is a secure, automated message. Please do not reply to this email.
@endif
@endcomponent
