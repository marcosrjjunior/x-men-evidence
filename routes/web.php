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
    return view('index');
})->name('index');

Route::prefix('submission')->group(function () {
    Route::post('/', 'SubmissionController@send')->name('submission');
    Route::get('/check', 'SubmissionController@check')->name('submission.check');
    Route::post('/update', 'SubmissionController@update')->name('submission.update');
    Route::get('/approve', 'SubmissionController@approve')->name('submission.approve');
});

/**
 * Admin Routes
 */
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
