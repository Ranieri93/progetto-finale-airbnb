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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@searchApartment')->name('search');
Route::post('/search', 'SearchController@AdvancedSearch')->name('advancedSearch');
Route::get('/search/show/{apartment}', 'SearchController@show')->name('search.show');
Route::post('/search/show/{apartment}', 'MessageController@store')->name('message.store');
Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search', 'SearchController@searchApartment')->name('search');
    Route::post('/search', 'SearchController@AdvancedSearch')->name('advancedSearch');
    Route::get('/search/show/{apartment}', 'SearchController@show')->name('search.show');
    Route::get('/cards', 'MessageController@showCards')->name('apartments.cards');
    Route::post('/search/show/{apartment}', 'MessageController@store')->name('message.store');
    Route::get('/apartments/{apartment}/messages', 'MessageController@show')->name('messages.show');
    Route::delete('/blabla/{message}/{apartment}', 'MessageController@destroy')->name('message.destroy');
    Route::get('/apartments/sponsor/{apartment}','ApartmentController@adIndex')->name('ad');
    Route::post('/checkout','ApartmentController@adCheckout')->name('checkout');
    Route::resource('/apartments', 'ApartmentController');

});


Route::get('/home', 'HomeController@index')->name('home');
