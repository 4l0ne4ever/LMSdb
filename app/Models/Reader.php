<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'readers';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','email','password','phone','address','borrowed_quantity','contributed_quantity','status','usertype','lost_book'
    ];
}