<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;

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
        ]);

        // Kol kas paliekam taip, taciau patikimai neatrodo.
        // Reiktu detaliau pasizet pati metoda. Logiskai turetu but, jog nufiltruoja visus ir palieka tik whiteliste esancius.
        // Kas butu, jeigu $requeste butu 1mln laukeliu, ar visus taip ir tikrintu? Ar tai gali itakoti serverio darba ir pan.
        Book::create($request->all());

        return redirect()->route('admin.dashboard')
            ->with('success', 'Knyga prideta sekmingai');
    }

}