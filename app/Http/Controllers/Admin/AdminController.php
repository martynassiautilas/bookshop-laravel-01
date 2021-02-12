<?php

namespace App\Http\Controllers\Admin;

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
        return auth()->user();
        dd();
        return view('pages.admin.dashboard');
    }


    

}