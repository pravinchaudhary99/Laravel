<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\UserController;
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



Route::get('/login',[AuthenticateController::class, 'index'])->name('login.index');
Route::post('/login',[AuthenticateController::class, 'login'])->name('login.create');
Route::get('/register',[AuthenticateController::class, 'register'])->name('register.index');
Route::post('/register',[AuthenticateController::class, 'register_create'])->name('register.create');
Route::get('/forgot', [AuthenticateController::class, 'forgot'])->name('forgot');
Route::get('/verify-email', [AuthenticateController::class, 'verify_email'])->name('verify-email');
Route::post('/verify-email', [AuthenticateController::class, 'verify_email_create'])->name('verify-email.create');
Route::get('/verify-otp', [AuthenticateController::class, 'verify_otp'])->name('verify-otp');
Route::post('/verify-otp', [AuthenticateController::class, 'verify_otp_check'])->name('verify-otp.check');


Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', function () {$home = true; return view('index',compact('home')); })->name('home.index');
    Route::get('/change-password', [AuthenticateController::class, 'change_password'])->name('change-password');
    Route::get('/change-password', [AuthenticateController::class, 'update_change_password'])->name('change-password.update');
});
Route::group(['middleware'=>'auth','prefix'=>'roles','as'=>'roles.'],function () {
    Route::get('/',[RoleController::class,'index'])->name('index');
    Route::post('/create',[RoleController::class,'create'])->name('create');
    Route::get('/view/{id}',[RoleController::class ,'role_view'])->name('view');
    Route::put('/update/{id}',[RoleController::class ,'update'])->name('update');
});


Route::group(['middleware'=>'auth','prefix'=>'users','as'=>'users.'],function () {
    Route::get('/',[UserController::class,'index'])->name('index');
    Route::get('/view/{id}',[UserController::class,'update'])->name('update');
});



