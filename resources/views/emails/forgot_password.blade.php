@component('mail::message')
    Hi, {{$user->name}}. Forgot Your Password ?
    <p>It happens. Click the link below to reset your password</p>
    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Reset Password
    @endcomponent
    <p>
        in case you have any issue recovering your passcode, please contact us using the form contact-us page
        thanks,
    </p>
    {{config('app.name')}}
@endcomponent
