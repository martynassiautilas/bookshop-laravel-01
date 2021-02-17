<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

use App\Traits\BookTrait;

use App\Http\Requests\Books\BookStoreRequest;
use App\Http\Requests\Books\BookUpdateRequest;

class BookController extends Controller
{

    use BookTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::select('id', 'title')->with('authors:id,name')->get();
        return view('pages.admin.books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getAllGenresAuthors(true);

        // This will help to pass preselect values for vue multiselect component.
        $data = array_merge($data, $this->fixGenresAuthorsOldValues());

        return view('pages.admin.books.create', $data);
    }


    public function edit($id)
    {
        $data = $this->getAllGenresAuthors(true);
        $book = Book::with('authors:id', 'genres:id')->find($id);

        // This will help to pass preselected values for vue multiselect component.
        $data['preselectGenres'] = json_encode($book->genres->pluck('id')->toArray());
        $data['preselectAuthors'] = json_encode($book->authors->pluck('id')->toArray());
    
        // We don't need pass data, that we don't use.
        $book->unsetRelation('genres')->unsetRelation('authors');
        
        $data['book'] = $book;

        // This will help to pass preselected old values for vue multiselect component.
        $data = array_merge($data, $this->fixGenresAuthorsOldValues());

        return view('pages.admin.books.edit', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        $coverFileName = $this->coverUpload($request->file('cover'));

        $book = Book::create(
            array_merge(
                $request->except(['cover', 'genres', 'authors']),
                array('cover' => $coverFileName)
            )
        );

        $genres = explode(',', $request->input('genres'));
        $book->genres()->attach($genres);

        $authors = explode(',', $request->input('authors'));
        $book->authors()->attach($authors);

        return redirect()->route('admin.book.index')
            ->with('success', 'Knyga prideta sekmingai');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $book = Book::find($id);
        $updateData = $request->except(['cover', 'genres', 'authors']);

        if($request->hasFile('cover')) 
        { 
            $coverFileName = $this->coverUpload($request->file('cover'), $book->cover);
            $updateData = array_merge($updateData, ['cover' => $coverFileName]);
        }

        $book->update($updateData);

        $genres = explode(',', $request->input('genres'));
        $book->genres()->sync($genres);

        $authors = explode(',', $request->input('authors'));
        $book->authors()->sync($authors);

        return redirect()->route('admin.book.index')
            ->with('success', 'Knyga atnaujinta sekmingai');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $this->coverFileDelete($book->cover);
        $book->genres()->sync([]);
        $book->authors()->sync([]);
        $book->delete();
    }

}