<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\ManagerController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\BookController;

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
// Add and accept book
route::get('/donate',[HomeController::class, 'donate']);
route::post('/donate',[BookController::class,'donate'])->name('books.donate');
Route::post('/pending', 'ManagerBooksController@approve')->name('manager.books.approve');
Route::post('/home', [ManagerController::class, 'pending'])->name('manager.books.pending');
