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
Route::get('/book_details/{id}',[HomeController::class, 'details']);
Route::get('/borrow_books/{id}',[HomeController::class, 'borrow'])->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/borrow-requests', [ManagerController::class,'showBorrowRequests'])->name('manager.borrow_requests');
    Route::post('/confirm-borrow/{id}', [ManagerController::class,'confirmBorrow'])->name('manager.confirm_borrow');
    Route::delete('/cancel-borrow/{id}', [ManagerController::class,'cancelBorrow'])->name('manager.cancel_borrow');
});
Route::get('/explore',[HomeController::class,'explore'])->name('explore');
Route::get('/search',[HomeController::class,'search'])->name('search');
Route::get('/filter', [HomeController::class,'filter']);
Route::get('/borrowing',[HomeController::class,'showBorrow'])->name('showBorrow');
Route::post('/return-request/{id}', [HomeController::class,'returnRequest'])->name('book.return.request');
Route::post('/return-requests/{id}', [ManagerController::class,'confirmReturn'])->name('manager.confirm.return');
Route::get('/return-requests', [ManagerController::class, 'return'])->name('manager.return_requests');