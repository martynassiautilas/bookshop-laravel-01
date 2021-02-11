@extends('template.layout.base')

@section('content')
<div class="mx-auto max-w-lg">
    <div class="w-full">
        <div class="flex flex-col break-words bg-white border-1 rounded-md">
            <x-form.form action="{{ route('login') }}" class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                <x-form.input type="email" name="email" label="{{ __('auth.email') }}">
                </x-form.input>
                <x-form.input type="password" name="password" label="{{ __('auth.password') }}">
                </x-form.input>
                <div>
                    <label class="inline-flex items-center" for="remember">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2">{{ __('auth.rememberme') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a class="text-sm text-primary-500 hover:text-primary-600 whitespace-no-wrap no-underline hover:underline ml-auto"
                        href="{{ route('password.request') }}">
                        {{ __('auth.forgotpassword') }}
                    </a>
                    @endif
                </div>
                <x-form.submit>{{ __('auth.login') }}</x-form.submit>
                <div>
                    @if (Route::has('register'))
                    <p class="text-center my-6">
                        {{ __('auth.donthaveanaccount') }}
                        <a class="text-primary hover:text-primary-shade no-underline hover:underline" href="{{ route('register') }}">
                            {{ __('auth.register') }}
                        </a>
                    </p>
                    @endif
                </div>
            </x-form.form>
        </div>
    </div>
</div>
@endsection
