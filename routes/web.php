<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\ManagerController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\BookController;

use App\Http\Controllers\Controller;
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

route::get('/home',[ManagerController::class,'index'])->name('home');
Route::get('/donate', [BookController::class, 'donateForm'])->name('donate.form')->middleware('auth');
Route::post('/donate', [BookController::class, 'donate'])->name('donate')->middleware('auth');
Route::get('/pending', [ManagerController::class, 'pending'])->name('manager.books.pending')->middleware('auth');
Route::post('/pending/{id}/{action}', [ManagerController::class,'handleRequest'])->name('manager.books.handle')->middleware('auth');
Route::get('/book_details/{id}',[HomeController::class, 'details'])->name('book_details');
Route::get('/borrow_books/{id}',[HomeController::class, 'borrow'])->name('borrow_books')->middleware('auth');