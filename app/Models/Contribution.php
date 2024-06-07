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
        'reader_id','book_id','contributed_at','quantity'
    ];
    public function reader()
{
    return $this->belongsTo(Reader::class, 'reader_id', 'user_id'); // Assuming 'user_id' is the foreign key in the 'readers' table
}
}
