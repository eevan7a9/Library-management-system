<?php

use App\Http\Controllers\BorrowersController;

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
    return view('home');
});
Route::get('/application', 'ApplicationController@index')->name('application');
/**get search result */
Route::get('/searched', 'HomeController@search_results')->name('search');
// Auth & user login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('accounts', 'AccountsController');
//UserPages Controller:account
Route::resource('users', 'UsersController');
//books resource controller
Route::resource('books', 'BooksController');
//authors resource controller
Route::resource('authors', 'AuthorsController');
//categories resource controller
Route::resource('categories', 'CategoriesController');
//shelves resource controller
Route::resource('shelves', 'ShelvesController');
//publishers resource controller
Route::resource('publishers', 'PublishersController');
Route::resource('borrowers', 'BorrowersController');
//Issuers resource controller
Route::resource('receives', 'ReceivesController');
Route::get('/return', 'BorrowersController@return')->name('return');
Route::get('/return_index','BorrowersController@return_index')->name('return_index');


