@extends('template.layout.base')

@section('content')
<div class="mx-auto">
    <div class="card">
        <div class="text-center">
            <h1>Pridėti knygą</h1>
        </div>
        <x-form.form action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
            <x-form.input type="text" name="title" value="{{ old('title') }}" label="Knygos pavadinimas"/>
            <x-form.input type="file" name="cover" label="Knygos virselis"/>
            <x-form.input type="text" name="price" label="Kaina"/>
            <x-form.input type="text" name="discount" label="Nuolaida"/>
            <x-form.multiselect name="genre[]" :options='$genres' label="Knygos zanras"/>
            <x-form.multiselect name="author[]" :options='$authors' label="Knygos autorius"/>
            <x-form.submit>Pridėti</x-form.submit>
        </x-form.form>
    </div>
</div>
@endsection