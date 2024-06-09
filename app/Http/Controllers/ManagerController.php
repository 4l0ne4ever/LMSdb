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
    public function showBorrowRequests()
{
    // Fetch borrow requests where 'borrowed_at' and 'returned_at' are null (pending confirmation)
    $borrowRequests = Borrow::whereNull('borrowed_at')->whereNull('returned_at')->with('book', 'reader')->get();
    return view('manager.borrow_requests', compact('borrowRequests'));
}

public function confirmBorrow(Request $request, $id)
{
    DB::transaction(function () use ($id) {
        $borrow = Borrow::findOrFail($id);
        $borrow->update([
            'borrowed_at' => now(),
            'returned_at' => now()->addMonths(6),
        ]);

        $borrow->book->decrement('quantity');
        $borrow->reader->increment('borrowed_quantity');
    });

    return redirect()->route('manager.borrow_requests')->with('success', 'Borrow request confirmed.');
}

public function cancelBorrow($id)
{
    // Directly delete the borrow request
    Borrow::findOrFail($id)->delete();
    return redirect()->route('manager.borrow_requests')->with('success', 'Borrow request canceled.');
}
}