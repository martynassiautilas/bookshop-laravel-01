<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" and "admin" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'homePage'])->name('homePage');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/add-book', [BookController::class, 'addBook'])->name('addBook');
// });