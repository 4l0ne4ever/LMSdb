<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contribution';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','book_id','contributed_at','quantity'
    ];
}