<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Reader;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    public function index(){
        $books = Book::inRandomOrder()
            ->take(100)
            ->get();
        return view('dashboard',compact('books'));
    }
    public function donate(){
        return view('books.donate');
    }
    public function details($id){
        $books = Book::find($id);
        return view('books.details',compact('book'));
    }
    public function borrow($id){
        $book = Book::find($id);
        $readerId = auth()->user()->id; // Assuming you're getting the reader's ID from the authenticated user
        $reader = Reader::find($readerId);
    
        if (!$book || $book->quantity <= 0) {
            return redirect()->back()->with('error', 'This book is not available for borrowing.');
        }
    
        $maxBorrowLimit = 0;
        switch ($reader->status) {
            case 'red':
                $maxBorrowLimit = 5;
                break;
            case 'green':
                $maxBorrowLimit = 10;
                break;
            case 'platinum':
                $maxBorrowLimit = 20;
                break;
        }
    
        if ($reader->borrowed_quantity >= $maxBorrowLimit) {
            return redirect()->back()->with('error', 'You have reached the maximum limit of borrowed books.');
        }
    
        // Assuming you have a Borrow model for the borrows table
        Borrow::create([
            'reader_id' => $readerId,
            'book_id' => $id,
            'borrowed_at' => now(),
            'returned_at' => now()->addMonths(6), // Set returned_at to 6 months after borrowed_at
        ]);
    
        // Update the book's quantity and the reader's borrowed quantity
        $book->decrement('quantity');
        $reader->increment('borrowed_quantity');
        
        return redirect()->back()->with('error','You have reached the maximum limit of borrowed books');
    }
}
