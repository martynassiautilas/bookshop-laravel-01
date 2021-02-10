<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Set book add page.
     *
     * @return \Illuminate\View\View
     */
    public function addBook()
    {
        return view('book.add');
    }
}