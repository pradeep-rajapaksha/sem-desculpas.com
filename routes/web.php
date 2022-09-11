<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClassController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\LiveClassesController;


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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::group(['prefix'=>'cache'], function(){
    Route::get('/route:cache', function () {
        \Artisan::call('route:cache');
    });
// });

Route::get('/', [ClassController::class, 'index']);

Route::group(['prefix'=>'classes'], function(){
    Route::get('/', [ClassController::class, 'index'])->name('classes.builder.index');

    Route::get('summary', [ClassController::class, 'builderSummary'])->name('classes.builder.summary');
    Route::post('summary/next', [ClassController::class, 'builderSummary'])->name('classes.builder.summary.next');

    Route::get('plan', [ClassController::class, 'builderPlan'])->name('classes.builder.plan');
    Route::post('plan/next', [ClassController::class, 'builderPlan'])->name('classes.builder.plan.next');

    Route::get('music', [ClassController::class, 'builderMusic'])->name('classes.builder.music');
    Route::post('music/next', [ClassController::class, 'builderMusic'])->name('classes.builder.music.next');

    Route::get('record', [ClassController::class, 'builderRecord'])->name('classes.builder.record');
    Route::post('record/next', [ClassController::class, 'builderRecord'])->name('classes.builder.record.next');

    Route::get('submit', [ClassController::class, 'builderSubmit'])->name('classes.builder.submit');
    Route::post('submit/next', [ClassController::class, 'builderSubmit'])->name('classes.builder.submit.next');

    Route::get('live', [LiveClassesController::class, 'index'])->name('classes.live');
    Route::get('live-class/{ref}',[LiveClassesController::class, 'show'])->name('classes.live-class');
    Route::post('live-class/{ref}/interaction',[LiveClassesController::class, 'interactionStore'])->name('classes.interaction-store');
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

// https://laravelwithfirebase.blogspot.com/2020/02/chapter-5-integrate-laravel-with-google-firebase-connecting-cloud-firestore.html

Route::group(['prefix'=>'utility'], function(){
    Route::post('spotify/auth', [UtilityController::class, 'spotifyAuth'])->name('utility.spotify-auth');
    Route::delete('spotify/auth/forget', [UtilityController::class, 'spotifyAuthForget'])->name('utility.spotify-auth.forget');
});




// ffmpeg
// https://ffbinaries.com/downloads
