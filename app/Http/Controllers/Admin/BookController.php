<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
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
        return 'list';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.books.create');
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
        ]);

        if ($request->hasFile('cover')) {
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

        Book::create(
            // Remove file from $request and replace it with file name only.
            array_merge(
                $request->except(["cover"]),
                array("cover" => $coverFileName)
            )
        );


        return redirect()->route('admin.book.create')
            ->with('success', 'Knyga prideta sekmingai');
    }

}