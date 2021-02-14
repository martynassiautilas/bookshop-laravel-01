<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Image;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

use App\Traits\BookTrait;

use App\Http\Requests\BookStoreRequest;

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
        $data['books'] = Book::select('id', 'title')->with('authors:id,name')->get();
        return view('pages.admin.books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getAllGenresAuthors();
        return view('pages.admin.books.create', $data);
    }


    public function edit($id)
    {
        $data = $this->getAllGenresAuthors();
    
        $book = Book::with('authors:id', 'genres:id')->find($id);
        $data['preselectGenres'] = $book->genres->pluck('id')->toArray();
        $data['preselectAuthors'] = $book->authors->pluck('id')->toArray();
    
        // Optimization?
        $book->unsetRelation('genres')->unsetRelation('authors');
        $data['book'] = $book;

        return view('pages.admin.books.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) 
        {
            $coverFileName = $this->coverUpload($request->file('cover'));
        }

        $book = Book::create(
            // Remove file from $request and replace it with file name only.
            array_merge(
                $request->except(['cover', 'genres', 'authors']),
                array('cover' => $coverFileName)
            )
        );

        if ($request->has('genres')) 
        {
            $genresString = $request->input('genres');
            $genres = explode(',', $genresString);
            // Cia reiktu tikrinimo, o kas jeigu negrazina reiksmes (jog sistema grazintu klaida)
            $genresCount = count($genres);
            for($i=0; $i < $genresCount; $i++)
            {
                $book->genres()->attach($genres[$i]);
            }
        } 
        
        // Repeating?
        if ($request->has('authors')) 
        {
            $authorsString = $request->input('authors');
            $authors = explode(',', $authorsString);

            $authorsCount = count($authors);
            for($i=0; $i < $authorsCount; $i++)
            {
                $book->authors()->attach($authors[$i]);
            }
        } 

        return redirect()->route('admin.book.create')
            ->with('success', 'Knyga prideta sekmingai');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreRequest $request, $id)
    {

        // Cia turetu buti globali funkcija 
        if ($request->hasFile('cover')) 
        {
            if ($request->file('cover')->isValid()) {
                $cover = $request->file('cover');
                $saveAs = 'jpg';
                $coverFileName = time().'.'.$saveAs;
                $destinationPath = public_path('/covers');
                $coverImage = Image::make($cover->path());
                $coverImage->resize(640, 640, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $coverImage->save($destinationPath.'/'.$coverFileName, 90);
            }
        }

        $book = Book::find($id);
        $book->update(
            array_merge(
                $request->except(['cover', 'genres', 'authors']),
                array('cover' => $coverFileName)
            )
        );

        if ($request->has('genres')) 
        {
            $genresString = $request->input('genres');
            $genres = explode(',', $genresString);
            $book->genres()->sync($genres);
        } 
        
        if ($request->has('authors')) 
        {
            $authorsString = $request->input('authors');
            $authors = explode(',', $authorsString);
            $book->authors()->sync($authors);
        } 

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
        //
    }

}