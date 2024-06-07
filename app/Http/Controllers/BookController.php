<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class BookController extends Controller
{

    public function donateForm(){
        // Show the donate form
        return view('books.donate');
    }

    public function donate(Request $request){
        $book = DB::table('books')->insertGetId([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'image_link' => $request->input('image_link'),
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 'pending'
        ]);
    
        // Insert contribution data directly into the contributions table
        DB::table('contribution')->insert([
            'reader_id' => Auth::user()->id,
            'book_id' => $book, // Use the last inserted book's ID
            'contributed_at' => now(),
            'quantity' => $request->input('quantity'),
        ]);


        return redirect()->route('donate.form')->with('success','Book information submitted for approval.');
    }
}



