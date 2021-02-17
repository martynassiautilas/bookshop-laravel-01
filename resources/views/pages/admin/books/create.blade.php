@extends('template.layout.base')

@section('content')

<div class="mx-auto">
    <div class="card">
        <div class="text-center">
            <h1>Pridėti knygą</h1>
        </div>
        <x-form.form method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">           
            <x-form.input type="text" name="title" value="{{ old('title') }}" label="Knygos pavadinimas"/>
            <x-form.input type="file" name="cover" label="Knygos virselis"/>
            <x-form.input type="text" name="price" value="{{ old('price') }}" label="Kaina"/>
            <x-form.input type="text" name="discount" value="{{ old('discount') ?? '0' }}" label="Nuolaida"/>
            <x-form.input type="text" name="user_id" value="{{ old('user_id') }}" label="Vartotojas"/>
            <multiselect-component :preselect="{{ $oldGenres ?? 'null' }}" name="genres" :options="{{ $genres }}"></multiselect-component>
            <multiselect-component :preselect="{{ $oldAuthors ?? 'null' }}" name="authors" :options="{{ $authors }}"></multiselect-component>
            <x-form.submit>Pridėti</x-form.submit>
        </x-form.form>
    </div>
</div>
@endsection

