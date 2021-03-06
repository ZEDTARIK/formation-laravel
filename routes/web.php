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
Route::view('/home', 'home');
Route::get('/posts/archive','PostController@archive');
Route::patch('/posts/{id}/restorePost','PostController@restorePost');
Route::resource('/posts', 'PostController');
//->middleware('auth');
//->except(['destroy']);
//->only(['index', 'show', 'create', 'store']);
Route::resource('/employees', 'EmployeeController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
