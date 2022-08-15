<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SpeedEstimateController;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
    return redirect()->route('home');
});
Route::get('/home', function(){
    return view('pages.home');
})->name('home')->middleware('auth');

Route::post('/estimation/excute', [SpeedEstimateController::class, 'excute'])->name('estimation.excute')->middleware('auth');

// ===============Auth================
Route::get('/register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store')->middleware('guest');
Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/send-mail', function (){
    $mailData = [
        "name" => "abc",
        "age" => 18,
    ];
    Mail::to("hello@example.com")->send(new TestMail($mailData));
    dd("successfull");
});
