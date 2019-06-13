<?php

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

Route::get('/books', 'BookController@index')->name('books.index');
Route::get('/books/create', 'BookController@create')->name('books.create');
Route::get('/books/download', 'BookController@download')->name('books.download');
Route::post('/books', 'BookController@store')->name('books.store');
Route::get('/books/{book}', 'BookController@show')->name('books.show');
Route::get('/books/{book}/edit', 'BookController@edit')->name('books.edit');
Route::patch('/books/{book}', 'BookController@update')->name('books.update');
Route::delete('/books/{book}', 'BookController@destroy')->name('books.destroy');
