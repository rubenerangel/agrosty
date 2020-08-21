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
    return view('emails.index');
});

Route::get('/email', 'SendEmailController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/sendemail', 'SendEmailController@send');

Route::get('/listemail', 'SendEmailController@showEmail');

Route::get('/export', 'MyController@export')->name('export');
Route::get('/exportPDF', 'MyController@exportPDF')->name('exportPDF');


Route::get('/estadictics', 'SendEmailController@stadistics');
