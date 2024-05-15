<?php

use App\Http\Controllers\SubmissionController;
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
Route::group(['middleware' => 'auth'], function () {
    Route::resource('submissions', SubmissionController::class);
    Route::post('/submissions/storeSubmission', [SubmissionController::class, 'storeSubmission'])->name('submissions.storeSubmission');
    Route::get('/submissions/create', [SubmissionController::class, 'create'])->name('submissions.create');
});
Route::get('/submissions/{submission}/edit', [SubmissionController::class, 'edit'])->middleware('auth', 'role')->name('submissions.edit');
Route::delete('/submissions/{submission}', [SubmissionController::class, 'destroy'])->middleware('auth', 'role')->name('submissions.destroy');

// Route::resource('submissions', SubmissionController::class);
// Route::post('/submissions/storeSubmission', [SubmissionController::class, 'storeSubmission'])->name('submissions.storeSubmission');
Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/check', [SubmissionController::class, 'store'])->name('user.check');
// Route::get('/submissions/create', [SubmissionController::class, 'create'])->name('submissions.create');
