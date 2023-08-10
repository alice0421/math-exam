<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::middleware('auth')->controller(ExamController::class)->group(function () {
    Route::get('/exams', 'index')->name('exam.index');
    Route::get('/exams/{exam_year}', 'show')->name('exam.show');
    Route::post('/exams/{exam_year}', 'store')->name('exam.store');
    Route::get('/exams/{exam_year}/answer', 'answer')->name('exam.answer');
});

require __DIR__.'/auth.php';
