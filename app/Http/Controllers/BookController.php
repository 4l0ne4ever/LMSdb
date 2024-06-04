<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
class BookController extends Controller
{

    public function donateForm(){
        // Show the donate form
        return view('books.donate');
    }

    public function donate(Request $request){
        // Read the SQL file
        $sql = file_get_contents(database_path('sql/add.sql'));

        // Execute the SQL query with the request parameters
        DB::statement($sql, [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'image_link' => $request->input('image_link')
        ]);

        return redirect()->route('donate.form')->with('success','Book information submitted for approval.');
    }
}



