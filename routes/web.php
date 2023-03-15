<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\BaywebController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () { return view('auth.login');})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('auth-login');
Route::get('/forgot-password', function () { return view('auth.passwords.forgot-password');})->name('forgot-password');
Route::get('/reset', function () { return view('auth.passwords.reset');})->name('reset');
Route::post('/password-reset', [LoginController::class, 'forgotPassword'])->name('password-reset');
Route::get('/thankyou', function () { return view('thankyou');})->name('thankyou');
Route::post('/update-password', [LoginController::class, 'updateNewPassword'])->name('update-password');
Route::get('/verify-email', [LoginController::class, 'emailVerify'])->name('verify-email');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('home'); }
    )->name('home');
    Route::get('/admin/user', [UserController::class, 'index']);

    Route::get('/admin/client',[ClientController::class,'index']);

    Route::get('/admin/device', function () {return view('admin.device');});

    Route::get('/admin/location', function () {return view('admin.location');});

    Route::get('/admin/user-location', function () {return view('admin.user_location');});

    Route::get('/admin/global-setting', function () {return view('admin.global_setting');});

    Route::get('/admin/device-setpoint-log', function () {return view('admin.device_setpoint_log');});

    Route::get('/admin/water-conservation-log', function () {return view('admin.water_conservation_log');});

    Route::get('/admin/designation', [DesignationController::class,'index']);

    Route::get('/energymanagement', [BaywebController::class, 'index']);

    
});
