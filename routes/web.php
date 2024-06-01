<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\ManagerController;

use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[ManagerController::class,'index']);