<?php


use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;





Route::get('/', function(){
    return view('welcome');
});

Route::resource('/movie', MovieController::class)->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
