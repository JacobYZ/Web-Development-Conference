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
Route::resource('submissions', SubmissionController::class);
Route::post('/submissions/storeSubmission', [SubmissionController::class, 'storeSubmission'])->name('submissions.storeSubmission');
Route::get('/', function () {
    return view('main');
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('login');
Route::post('/participant/check', [SubmissionController::class, 'store'])->name('participant.check');
Route::get('/submissions/create', [SubmissionController::class, 'create'])->name('submissions.create');
