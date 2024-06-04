<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Book;
use App\Models\AccountStatus;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManagerController extends Controller
{
    public function index(){
        if(Auth::user()->usertype=='user'){
            return view('dashboard');
        } else {
            return view('manager.index');
        }
    }
    public function pending(){
        // Get all books with status 'pending'
        $books = Book::where('status', 'pending')->get();

        return view('manager.pending', ['books' => $books]);
    }

    public function handleRequest(Request $request, $id, $action){
        // Get the book from the database
        $book = Book::find($id);

    // Handle the request
    if ($action == 'approve') {
        // Change the book status to 'ok'
        $book->status = 'ok';
        $book->save();
    } else if ($action == 'reject') {
        // Delete the book, the corresponding contribution, and the account status
        DB::table('contribution')->where('book_id', $id)->delete();
        DB::table('accountstatus')->where('user_id', $book->user_id)->delete();
        $book->delete();
    }

    return redirect()->route('manager.books.pending');
    }
}
    