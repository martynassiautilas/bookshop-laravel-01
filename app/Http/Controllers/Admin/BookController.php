<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

use Image;

class BookController extends Controller
{

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
        $data['genres'] = Genre::select('id', 'name')->get()->pluck('name', 'id')->toArray();
        $data['authors'] = Author::select('id', 'name')->get()->pluck('name', 'id')->toArray();
        // Cia reiktu tikrinimo, o kas jeigu nera zanru db? Taciau veliau

        return view('pages.admin.books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'discount' => 'required|integer|between:0,100',
            'genre' => 'required|array',
            'author' => 'required|array',
        ]);

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

        $book = Book::create(
            // Remove file from $request and replace it with file name only.
            array_merge(
                $request->except(['cover', 'genres']),
                array('cover' => $coverFileName)
            )
        );

        if ($request->has('genre')) 
        {
            $genres= $request->input('genre');
            // Cia reiktu tikrinimo, o kas jeigu negrazina reiksmes (jog sistema grazintu klaida)
            $genresCount = count($genres);
            for($i=0; $i < $genresCount; $i++)
            {
                $book->genres()->attach($genres[$i]);
            }
        } 
        
        // Repeating?
        if ($request->has('author')) 
        {
            $authors = $request->input('author');
            $authorsCount = count($authors);
            for($i=0; $i < $authorsCount; $i++)
            {
                $book->authors()->attach($authors[$i]);
            }
        } 

        return redirect()->route('admin.book.create')
            ->with('success', 'Knyga prideta sekmingai');
    }

}