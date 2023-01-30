<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AuthenticateController;
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



Route::get('/login',[AuthenticateController::class, 'index'])->name('login');
Route::post('/login',[AuthenticateController::class, 'login'])->name('login.create');
Route::get('/register',[AuthenticateController::class, 'register'])->name('register.index');
Route::post('/register',[AuthenticateController::class, 'register_create'])->name('register.create');
Route::get('/forgot', [AuthenticateController::class, 'forgot'])->name('forgot');
Route::get('/verify-email', [AuthenticateController::class, 'verify_email'])->name('verify-email');
Route::post('/verify-email', [AuthenticateController::class, 'verify_email_create'])->name('verify-email.create');
Route::get('/verify-otp', [AuthenticateController::class, 'verify_otp'])->name('verify-otp');
Route::post('/verify-otp', [AuthenticateController::class, 'verify_otp_check'])->name('verify-otp.check');
Route::get('/logout',[AuthenticateController::class,'logout'])->name('logout')->middleware('auth');

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
    Route::delete('/delete/{id}',[RoleController::class,'delete'])->name('delete');
});


Route::group(['middleware'=>'auth','prefix'=>'users','as'=>'users.'],function () {
    Route::get('/',[UserController::class,'index'])->name('index');
    Route::post('/create',[UserController::class,'create'])->name('create');
    Route::get('/view/{id}',[UserController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[UserController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[UserController::class,'delete'])->name('delete');
    Route::post('/task/{id}',[UserController::class,'task_create'])->name('task_create');
    Route::put('/task/update/{id}',[UserController::class,'task_update'])->name('task_update');
});

Route::group(['middleware' => 'auth','prefix'=>'user_auth','as'=>'user_auth.'],function(){
    Route::get('/',[UserAuthController::class ,'index'])->name('index');
    Route::get('/setting/{id}',[UserAuthController::class ,'setting'])->name('setting');
    Route::put('/update/{id}',[UserAuthController::class,'update'])->name('update');
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


