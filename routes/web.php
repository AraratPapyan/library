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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('authors', 'AuthorsController')->names('authors');
Route::resource('books', 'BooksController')->names('books');
Route::delete('library/{id}/book/{book_id}', 'LibrariesController@destroy_book');
Route::resource('libraries', 'LibrariesController')->names('libraries');
