<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryBook extends Model
{
    protected $table = 'library_books';
    protected $fillable = [
        'library_id',
        'book_id'
    ];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function library()
    {
        return $this->belongsTo('App\Library');
    }
}
