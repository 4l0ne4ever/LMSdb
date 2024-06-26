<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','author','category','quantity','rating','image_link','created_at','updated_at','status','managed_by'
    ];
    public function borrows()
{
    return $this->hasMany(Borrow::class, 'book_id', 'id');
}

public function contributions()
{
    return $this->hasMany(Contribution::class, 'book_id', 'id');
}

public function ratings()
{
    return $this->hasMany(Rating::class, 'book_id', 'id');
}
}
