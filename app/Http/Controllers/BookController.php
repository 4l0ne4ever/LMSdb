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
        $sql = file_get_contents(database_path('sql/contributed.sql'));

    // Replace the placeholders with the actual values
    $sql = str_replace(':user_id', Auth::user()->id, $sql);
    $sql = str_replace(':book_id', DB::getPdo()->lastInsertId(), $sql); // Assuming book_id is auto-increment
    $sql = str_replace(':contributed_at', now()->toDateTimeString(), $sql);
    $sql = str_replace(':quantity', $request->quantity, $sql);

    // Execute the SQL query
    DB::unprepared($sql);

    // Get the SQL query from the donate_accountstatus.sql file
    $sql = file_get_contents(database_path('sql/status.sql'));

    // Replace the placeholders with the actual values
    $sql = str_replace(':user_id', Auth::user()->id, $sql);
    $sql = str_replace(':status', 'green', $sql);
    $sql = str_replace(':quantity', 1, $sql);

    // Execute the SQL query
    DB::unprepared($sql);

        return redirect()->route('donate.form')->with('success','Book information submitted for approval.');
    }
}



