<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Materi;

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
    return view('home');
});
Route::get('/dashboard', function () {
    return view('welcome');
});
// Route::get('/user', function () {
//     return view('user.index');
// });
// Route::resource('users', UserController::class);
// Route::get('/nilai', function () {
//     return view('nilai.index');
// });
// Route::get('/latihan', function () {
//     return view('latihan.index');
// });
// Route::get('/quiz', function () {
//     return view('quiz.index');
// });
// Route::get('/materi', function () {
//     return view('materi.index');
// });
// Route::get('/kelas', function () {
//     return view('kelas.index');
// });
Route::resource('users', UserController::class);
Route::resource('kelases', KelasController::class);
Route::resource('materis', MateriController::class);
Route::resource('quizs', QuizController::class);
Route::resource('latihans', LatihanController::class);
Route::resource('ratings', RatingController::class);
