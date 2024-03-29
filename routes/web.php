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

// Routes of Auth created to php artisan make:auth
Auth::routes();

// Routes of Entris and home page
Route::get('/', 'EntriesController@index');
Route::get('/home', 'EntriesController@entriesByUser')->name('home');
Route::get('/user/{uid}', 'UserPageController@index');
// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('entries', 'EntriesController');


Route::post('ajaxRequest', 'HideTweetController@ajaxRequest');
// Route::post('ajaxRequest', 'HomeController@ajaxRequestPost');
