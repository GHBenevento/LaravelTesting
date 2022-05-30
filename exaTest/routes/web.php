<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/set_language/{lang}', [Controller::class, 'set_language'])->name('set_language');

require __DIR__.'/auth.php';


Route::redirect('/', '/index');

Route::get('/index', [PostController::class,'index']);

Route::get('/create', [PostController::class,'create']);

// Route::get('/edit/{id}', [PostController::class,'edit']);

Route::resource('/posts',PostController::class);