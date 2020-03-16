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

Route::get('/', function () {
    return view('public-home');
});
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/search/show/{apartment}', 'SearchController@show')->name('search.show');
Route::post('/search/show/{apartment}', 'MessageController@store')->name('message.store');
Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('/search/show/{apartment}', 'SearchController@show')->name('search.show');
    Route::post('/search/show/{apartment}', 'MessageController@store')->name('message.store');

    Route::resource('/apartments', 'ApartmentController');
});


Route::get('/home', 'HomeController@index')->name('home');
