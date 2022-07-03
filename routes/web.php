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
    return view('dashboard');
});

Route::group(['prefix'=>'classes'], function(){
    Route::get('/', function () { return view('dashboard'); })->name('classes.builder.index');
    Route::get('summary', function () { return view('classes.builder.summary'); })->name('classes.builder.summary');
    Route::get('plan', function () { return view('classes.builder.plan'); })->name('classes.builder.plan');
    Route::get('music', function () { return view('classes.builder.music'); })->name('classes.builder.music');
    Route::get('record', function () { return view('classes.builder.record'); })->name('classes.builder.record');
    Route::get('submit', function () { return view('classes.builder.submit'); })->name('classes.builder.submit');

    Route::get('live', function () { return view('classes.live'); })->name('classes.live');
    Route::get('live-archive', function () { return view('classes.live-archive'); })->name('classes.live-archive');
});

Route::get('messages', function () {
    return view('messages');
})->name('messages');

Route::get('profile', function () {
    return view('profile');
})->name('profile');

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('classes/builder', 'ClassController@builder')->name('classes.builder');
// Route::resource('classes', 'ClassController');