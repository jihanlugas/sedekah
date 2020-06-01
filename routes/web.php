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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/success', 'SiteController@success')->name('success');


Route::get('/requested', 'CompleteregistrationController@requested')->name('completeregistration.requested');
Route::post('/requested', 'CompleteregistrationController@postrequested');
Route::get('/upload', 'CompleteregistrationController@upload')->name('completeregistration.upload');
Route::post('/upload', 'CompleteregistrationController@postupload');
