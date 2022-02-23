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
    return redirect(route('login'));
});

//Auth::routes();
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/info/save', [App\Http\Controllers\HomeController::class, 'SaveInfo'])->name('saveinfo');
Route::post('/security/password', [App\Http\Controllers\HomeController::class, 'ChangePassword'])->name('changepassword');
Route::post('/account/delete', [App\Http\Controllers\HomeController::class, 'AccountDelete'])->name('accountdelete');
Route::get('/sendmail', [App\Http\Controllers\HomeController::class, 'AutoMail']);
Route::get('/login', function(){
    return view('login2');
});

Route::get('/register', function(){
    return view('register2');
});
