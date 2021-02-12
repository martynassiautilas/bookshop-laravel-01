<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Set the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        dd(today());
        return view('pages.admin.dashboard');
    }
}