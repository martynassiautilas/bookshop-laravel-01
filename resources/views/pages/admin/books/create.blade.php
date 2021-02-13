@extends('template.layout.base')

@section('content')

<div class="mx-auto">
    <div class="card">
        <div class="text-center">
            @if(isset($book))
                <h1>Redaguoti knygą</h1>
            @else
                <h1>Pridėti knygą</h1>
            @endif
        </div>

        <x-form.form action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
            <x-form.input type="text" name="title" value="{{ isset($book) ? $book->title : '' }}" label="Knygos pavadinimas"/>
            <x-form.input type="file" name="cover" label="Knygos virselis"/>
            <x-form.input type="text" name="price" value="{{ isset($book) ? $book->price : '' }}" label="Kaina"/>
            <x-form.input type="text" name="discount" value="{{ isset($book) ? $book->discount : '' }}" label="Nuolaida"/>
            <multiselect-component :preselect="{{ isset($book) ? json_encode($preselectGenres) : 'null' }}" name="genres" :options="{{ json_encode($genres) }}"></multiselect-component>
            <multiselect-component :preselect="{{ isset($book) ? json_encode($preselectAuthors) : 'null' }}" name="authors" :options="{{ json_encode($authors) }}"></multiselect-component>
            <x-form.submit>Pridėti</x-form.submit>
        </x-form.form>
    </div>
</div>
@endsection

