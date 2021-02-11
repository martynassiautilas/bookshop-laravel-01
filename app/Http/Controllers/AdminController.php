<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Set the home page.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return 'sveiki';
        // return Auth::user()->isAdmin();
    }
}