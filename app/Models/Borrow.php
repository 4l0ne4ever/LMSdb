<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'borrow';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reader_id','book_id','borrowed_at','returned_at'
    ];
}
