<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Book;
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
            $book->status = 'ok';
            $book->save();
        } else if ($action == 'reject') {
            // Delete the book immediately
            $book->delete();
        }

        return redirect()->route('manager.books.pending');
    }
}
    