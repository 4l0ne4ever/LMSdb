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
        $pending = Book::all();
        return view('manager.pending',compact('pending'));
    }

    public function approve(Request $request, $id){
        $book = Book::findOrFail($id);
        if($request->action == 'approve'){
            $sqlFilePath = storage_path('sql/add.sql');
            $sqp = File::get($sqlFilePath);
            $bindings = [
                $book->title,
                $book->author,
                $book->category,
                $book->quantity,
                $book->image_link,
                now(),
                now()
            ];
            $sql = vsprintf($sql, $bindings);
            
            \DB::unprepared($sql);
        }
        $book->delete();
        return redirect()->back()->with('success','Book approval processed successfully.');
    }
}