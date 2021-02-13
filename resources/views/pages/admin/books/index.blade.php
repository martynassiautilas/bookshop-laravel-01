@extends('template.layout.base')

@section('content')
<div class="mx-auto">
    <div class="card">
        <div class="text-center">
            <h1>Knygu valdymas</h1>
        </div>

        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Autorius</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Pavadinimas</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Autorius</span>
                            @foreach($book->authors as $author)
                                {{$author->name}}
                            @endforeach
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Pavadinimas</span>
                            {{$book->title}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                            <a href="{{ route('admin.book.edit', $book->id) }}" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
</div>
@endsection