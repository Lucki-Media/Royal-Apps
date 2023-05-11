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
  return view('admin.login');
});

Route::get('/login', 'App\Http\Controllers\AdminController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AdminController@authenticate');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout');

Route::group(['prefix' => 'gfadmin', 'as' => 'gfadmin.', 'middleware' => 'auth:gfadmin'], function () {
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
    Route::get('/authors', 'App\Http\Controllers\AuthorsController@index')->name('authors-index');
    Route::get('/authors/view-author/{id}', 'App\Http\Controllers\AuthorsController@viewAuthor')->name('authors-view');
    Route::get('/authors/create', 'App\Http\Controllers\AuthorsController@create')->name('authors-create');
    Route::post('/authors/add-author', 'App\Http\Controllers\AuthorsController@addAuthor')->name('authors-add');
    Route::get('/authors/destroy/{id}', 'App\Http\Controllers\AuthorsController@destroy')->name('authors-destroy');
    Route::get('/books', 'App\Http\Controllers\BooksController@index')->name('books-index');
    Route::get('/books/destroy/{author_id}/{book_id}', 'App\Http\Controllers\BooksController@destroy')->name('books-destroy');
    Route::get('/books/create', 'App\Http\Controllers\BooksController@create')->name('books-create');
    Route::post('/books/add-book', 'App\Http\Controllers\BooksController@addBook')->name('books-add');
});
