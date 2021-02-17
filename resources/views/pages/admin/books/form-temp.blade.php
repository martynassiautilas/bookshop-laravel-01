{{-- Do we need one form for update,store? Or two seperate? --}}
@extends('template.layout.base')

@section('content')

<div class="mx-auto">
    <div class="card">
        <div class="text-center">
            <h1>{{ isset($book) ? 'Redaguoti knygą' : 'Pridėti knygą' }}</h1>
        </div>
        <x-form.form method="{{ isset($book) ? 'PATCH' : 'POST' }}" action="{{ isset($book) ? route('admin.book.update', $book->id) : route('admin.book.store') }}" enctype="multipart/form-data">           
           
            @php
                // Hardcode.. No better solution for now.
                $oldGenres = old('genres') ? json_encode(array_map('intval', explode(',', old('genres')))) : null;
                $oldAuthors = old('authors') ? json_encode(array_map('intval', explode(',', old('authors')))) : null;                
            @endphp

            <x-form.input type="text" name="title" value="{{ old('title') ?? $book->title ?? '' }}" label="Knygos pavadinimas"/>
            <x-form.input type="file" name="cover" label="Knygos virselis"/>
            <x-form.input type="text" name="price" value="{{ old('price') ?? $book->price ?? '' }}" label="Kaina"/>
            <x-form.input type="text" name="discount" value="{{ old('discount') ?? $book->discount ?? '0' }}" label="Nuolaida"/>
            <x-form.input type="text" name="user_id" value="{{ old('user_id') ?? $book->user_id ?? '' }}" label="Vartotojas"/>
            <multiselect-component :preselect="{{ $oldGenres ?? $preselectGenres ?? 'null' }}" name="genres" :options="{{ $genres }}"></multiselect-component>
            <multiselect-component :preselect="{{ $oldAuthors ?? $preselectAuthors ?? 'null' }}" name="authors" :options="{{ $authors }}"></multiselect-component>
            <x-form.submit>{{ isset($book) ? 'Redaguoti' : 'Pridėti' }}</x-form.submit>

        </x-form.form>
    </div>
</div>
@endsection

