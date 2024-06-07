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
    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function borrows()
{
    return $this->hasMany(Borrow::class, 'reader_id', 'user_id');
}

public function contributions()
{
    return $this->hasMany(Contribution::class, 'reader_id', 'user_id');
}

public function ratings()
{
    return $this->hasMany(Rating::class, 'reader_id', 'user_id');
}
}