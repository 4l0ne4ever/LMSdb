<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Reader;
use App\Models\Book;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManagerController extends Controller
{
    public function index(){
        if(Auth::user()->usertype=='user'){
            $books = Book::inRandomOrder()
            ->take(100)
            ->get();
            return view('dashboard',compact('books'));
        } else {
            return view('manager.index');
        }
    }
    public function pending(){
        $books = Book::with(['contributions' => function($query) {
            $query->with(['reader' => function($query) {
                $query->select('id', 'name'); 
            }])
            ->select('book_id', 'reader_id', 'quantity', 'contributed_at'); 
        }])
        ->where('status', 'pending')
        ->get();
    
        return view('manager.pending', ['books' => $books]);
    }

    public function handleRequest(Request $request, $id, $action){
        $book = Book::find($id);
    if ($action == 'approve') {
        $book->status = 'ok';
        $book->save();
        $contribution = DB::table('contribution')->where('book_id', $id)->first();

        if ($contribution) {
            $reader = DB::table('readers')->where('user_id', $contribution->reader_id)->first(); 
    
            if ($reader) {
                $newQuantity = $reader->contributed_quantity + 1;
                $newStatus = $newQuantity > 3 ? 'platinum' : $reader->status;
                DB::table('readers')->where('user_id', $reader->user_id)->update([
                    'contributed_quantity' => $newQuantity,
                    'status' => $newStatus,
                ]);
            }
        }
    } else if ($action == 'reject') {
        DB::table('contribution')->where('book_id', $id)->delete();
        $book->delete();
    }

    return redirect()->route('manager.books.pending');
    }
}
    