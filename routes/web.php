<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {return view('auth.login');})->name('login');
Route::post('/login', [LoginController::class,'login'])->name('auth-login');
Route::get('/forgot-password', function () {return view('auth.passwords.forgot-password');})->name('forgot-password');
Route::get('/reset', function () {return view('auth.passwords.reset');})->name('reset');
Route::post('/password-reset', [LoginController::class,'forgotPassword'])->name('password-reset');
Route::get('/thankyou', function () {return view('thankyou');})->name('thankyou');
Route::post('/update-password', [LoginController::class,'updateNewPassword'])->name('update-password');
Route::get('/verify-email', [LoginController::class,'emailVerify'])->name('verify-email');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function () { return view('home');})->name('home');
    Route::get('/client',[ClientController::class,'index']);
});
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/client', function () { return view('pages.client');})->name('client');
// });
