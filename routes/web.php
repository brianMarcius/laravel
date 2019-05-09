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
    return view('welcome');
});

Route::resource('home','ContactController');
Route::get('api/contact','ContactController@apiContact')->name('api.contact');
Route::get('/exportpdf','ContactController@exportPDF')->name('contact.export');
Route::post('/importcsv','ContactController@importCSV')->name('contact.import');
Route::get('/exportcsv','ContactController@exportCSV')->name('contact.exportcsv');
Route::get('/exportexcel','ContactController@exportExcel')->name('contact.exportexcel');




Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
