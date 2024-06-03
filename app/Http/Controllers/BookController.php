<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function donate(Request $request){
        Book::create($request->all());
        return redirect()->route('manager.books.pending')->with('success','Book information submitted for approval.');
    }
}