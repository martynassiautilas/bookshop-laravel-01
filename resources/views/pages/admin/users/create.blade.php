@extends('template.layout.base')

@section('content')

<div class="mx-auto">
    <div class="card">
        <div class="text-center">
            @if(isset($book))
                <h1>Redaguoti vartotoją</h1>
            @else
                <h1>Pridėti vartotoją</h1>
            @endif
        </div>

        <x-form.form method="{{ isset($book) ? 'PATCH' : 'POST' }}" action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}">
            <x-form.input type="text" name="name" value="{{ isset($user) ? $user->name : '' }}" label="Vardas"/>

            <x-form.input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" 
                label="{{ __('auth.date_of_birth') }}" 
                pattern="\d{4}-\d{2}-\d{2}"/>
                
                <x-form.input type="email" name="email" value="{{ old('email') }}" label="{{ __('auth.email') }}"/>
            
                {{-- Čia trūksta show/hide password --}}
                <x-form.input type="password" name="password" label="{{ __('auth.password') }}"/>
                
                {{-- Čia turi būti password confirmation laukelio pavadinimas --}}
                <x-form.input type="password" name="password_confirmation" label="{{ __('auth.password') }}"/>

            <x-form.submit>Pridėti</x-form.submit>
        </x-form.form>
    </div>
</div>
@endsection

