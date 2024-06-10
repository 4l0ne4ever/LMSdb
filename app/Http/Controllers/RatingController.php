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

class RatingController extends Controller
{
    public function add(Request $request, $bookId){
        $request->validate([
            'product_rating' => 'required|integer|min:1|max:5',
        ]);
        $userId = Auth::id(); 
        $starsRated = $request->input('product_rating');
    
        $bookRatingInfo = DB::table('rating')
                            ->where('book_id', $bookId)
                            ->selectRaw('AVG(rating) as average_rating, COUNT(*) as ratings_count')
                            ->first();
    
        $currentAverageRating = $bookRatingInfo->average_rating ?? 0;
        $ratingsCount = $bookRatingInfo->ratings_count;
        $newAverageRating = $currentAverageRating == 0 ? $starsRated : (($currentAverageRating * $ratingsCount) + $starsRated) / ($ratingsCount + 1);
    
        $ratingExists = DB::table('rating')
                          ->where('book_id', $bookId)
                          ->where('reader_id', $userId)
                          ->exists();
    
        if ($ratingExists) {
            DB::table('rating')
              ->where('book_id', $bookId)
              ->where('reader_id', $userId)
              ->update(['rating' => $starsRated]);
        } else {
            DB::table('rating')->insert([
                'book_id' => $bookId,
                'reader_id' => $userId,
                'rating' => $starsRated,
            ]);
        }
        DB::table('books')->where('id', $bookId)->update(['rating' => $newAverageRating]);
    
        return redirect()->back()->with('message', 'Thank you for rating the book!');
    }
}
