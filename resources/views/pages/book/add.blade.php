@extends('layouts.app')

@section('content')
<div class="mx-auto mt-10">
    <div class="flex ">
        <div class="w-full">

            <header class="font-semibold font-heading text-gray-700 text-2xl text-center mb-10">
                Pridėti knygą
            </header>

            <section class="flex flex-col break-words bg-white border-1 rounded-md border shadow-md">

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Knygos pavadinimas
                        </label>

                        <input id="name" type="name"
                            class="border p-2 rounded form-input w-full hover:border-gray-300 focus:border-gray-500 transition-primary @error('name') border-red-500 @enderror" name="name"
                            value="{{ old('name') }}">

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('auth.password') }}
                        </label>

                        <input id="password" type="password"
                            class="border p-2 rounded form-input w-full hover:border-gray-300 focus:border-gray-500 transition-primary @error('password') border-red-500 @enderror" name="password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
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

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded text-base leading-normal no-underline transition-primary text-white bg-primary-500 hover:bg-primary-600 sm:py-3">
                            {{ __('auth.login') }}
                        </button>

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __('auth.donthaveanaccount') }}
                            <a class="text-primary hover:text-primary-shade no-underline hover:underline" href="{{ route('register') }}">
                                {{ __('auth.register') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</div>
@endsection
