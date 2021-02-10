<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Set the home page.
     *
     * @return \Illuminate\View\View
     */
    public function homePage()
    {
        return view('home');
    }
}