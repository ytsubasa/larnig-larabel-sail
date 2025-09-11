<?php

use App\Http\Controllers\{RegisterController, LoginController};
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function(){
    return view('home');
});


Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/login',[LoginController::class,'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login',[LoginController::class,'autheenticate'])
    ->middleware('guest');

Route::get('/logout',[LoginController::class,'logout'])
    ->middleware('auth')
    ->name('logout');