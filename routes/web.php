<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;


Route::get("/search", [SearchController::class, "search"]);
//Route::post("/book/{id}", [BookController::class, "add"])->name('book');
Route::get("/book/{id}", [BookController::class, "book"])->name('book');
Route::get("/author/{id}", [BookController::class, "author"])->name('author');
Route::get("/user/{id}", [UserController::class, "user"])->name('user');
//Route::post("/add/{id}", [UserController::class, "add"])->name('add');
Route::get("/add/{id}", [UserController::class, "add"])->name('add');
Route::get("/remove/{id}", [UserController::class, "remove"])->name('remove');