@extends('template.layout.base')

@section('content')
<div class="mx-auto max-w-lg">
    <div class="card">
        <div class="text-center">
            <h1>{{ __('auth.register') }}</h1>
        </div>
        <x-form.form action="{{ route('register') }}">
            <x-form.input type="text" name="name" value="{{ old('name') }}" label="{{ __('auth.name') }}"/>
            
            {{-- Reiktų tikslingiau sukurti date pickerio laukelį, kadangi jis nepatikimai atrodo :D --}}
            <x-form.input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" 
            label="{{ __('auth.date_of_birth') }}" 
            pattern="\d{4}-\d{2}-\d{2}"/>
            
            <x-form.input type="email" name="email" value="{{ old('email') }}" label="{{ __('auth.email') }}"/>
            
            {{-- Čia trūksta show/hide password --}}
            <x-form.input type="password" name="password" label="{{ __('auth.password') }}"/>
            
            {{-- Čia turi būti password confirmation laukelio pavadinimas --}}
            <x-form.input type="password" name="password_confirmation" label="{{ __('auth.password') }}"/>
            
            <x-form.submit>{{ __('auth.register') }}</x-form.submit>
            @if (Route::has('login'))
                <div class="text-center">
                    {{ __('auth.alreadyhaveanaccount') }}
                    <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
                </div>
            @endif
        </x-form.form>
    </div>
</div>
@endsection