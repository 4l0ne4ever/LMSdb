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
use Carbon\Carbon;
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
    public function explore(){
        $categories = Book::select('category')->distinct()->pluck('category');
        $books = Book::inRandomOrder()
        ->take(200)
        ->get();
        return view('books.explore',compact('books','categories'));
    }
    public function search(Request $request){
        $categories = Book::select('category')->distinct()->pluck('category');
        $search = $request->search;
        $books = Book::where('title','LIKE','%'.$search.'%')->orWhere('author','LIKE','%'.$search.'%')->inRandomOrder()
        ->take(200)->get();
        return view('books.explore',compact('books','categories'));
    }
    public function filter(Request $request){
        $categories = Book::select('category')->distinct()->pluck('category');
        $category = $request->category;
        if($category) {
            $books = Book::where('category', $category)->limit(200)->get();
        } else {
            $books = Book::limit(200)->get(); 
        }
        return view('books.explore', compact('books', 'categories'));
    }
    public function details($id){
        $books = Book::find($id);
        return view('books.detailsbook',compact('books'));
    }
    public function showBorrow(){
        $readerId = auth()->user()->reader->user_id;

    $borrowedBooks = DB::table('borrow')
        ->join('books', 'borrow.book_id', '=', 'books.id')
        ->where('borrow.reader_id', $readerId)
        ->select('books.id','books.title', 'books.author', 'books.image_link', 'borrow.borrowed_at', 'borrow.returned_at')
        ->get()
        ->map(function ($book) {
            $book->borrowed_at = Carbon::parse($book->borrowed_at)->format('d/m/Y');
            $book->returned_at = $book->returned_at ? Carbon::parse($book->returned_at)->format('d/m/Y') : null;
            return $book;
        });

    return view('books.borrow', compact('borrowedBooks'));
    }
    public function borrow($id){
        if(auth()->id()){
            $user = auth()->user();
            if($user->usertype == 'manager'){
                return redirect()->back()->with('message', 'Managers cannot borrow books.');
            }
            $book = Book::find($id);
            $reader = $user->reader;
        
            if (!$book || $book->quantity <= 0) {
                return redirect()->back()->with('message', 'This book is not available for borrowing.');
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
                return redirect()->back()->with('message', 'You have reached the maximum limit of borrowed books.');
            }
        
            Borrow::create([
                'reader_id' => $reader->user_id, 
                'book_id' => $id,
                'borrowed_at' => null,
                'returned_at' => null,
            ]);
            
            return redirect()->back()->with('message', 'Your borrow request has been sent.');
        } else {
            return redirect('/login');
        }
    }
    public function returnRequest($id) {
        $borrow = DB::table('borrow')->where('book_id', $id)->first();
        if ($borrow && $borrow->reader_id == auth()->user()->reader->user_id) {
            DB::table('borrow')->where('book_id', $id)->update(['returned_at' => null]);
            return redirect()->route('showBorrow')->with('message', 'Return requested.');
        }
        return redirect()->route('showBorrow')->with('message', 'Return requested failed.');
    }
    public function reportLost($id)
{
    $borrow = DB::table('borrow')->where('book_id', $id)->first();
    if ($borrow && $borrow->reader_id == auth()->user()->reader->user_id) {
        DB::table('borrow')->where('book_id', $id)->update(['borrowed_at' => null]);
        return redirect()->route('showBorrow')->with('message', 'Return requested.');
    }
    return redirect()->route('showBorrow')->with('message', 'Return requested failed.');
}

}
