@extends('template.layout.base')

@section('content')
<div class="mx-auto max-w-lg">
    <div class="card">
        <div class="text-center">
            <h1>{{ __('auth.login') }}</h1>
        </div>
        <x-form.form action="{{ route('login') }}">
            <x-form.input type="email" name="email" value="{{ old('email') }}" label="{{ __('auth.email') }}"/>
            <x-form.input type="password" name="password" label="{{ __('auth.password') }}"/>
            <x-form.checkbox checked="{{ old('remember') }}" name="remember" label="{{ __('auth.rememberme') }}"/>
            <x-form.submit>{{ __('auth.login') }}</x-form.submit>
            @if (Route::has('password.request'))
                <div class="text-center">
                    <a href="{{ route('password.request') }}">{{ __('auth.forgotpassword') }}</a>
                </div>
            @endif
            @if (Route::has('register'))
                <div class="text-center">
                    {{ __('auth.donthaveanaccount') }}
                    <a href="{{ route('register') }}">{{ __('auth.register') }}</a>
                </div>
            @endif
        </x-form.form>
    </div>
</div>
@endsection