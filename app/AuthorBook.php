<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    protected $table = 'author_books';
    protected $fillable = [
        'author_id',
        'book_id'
    ];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
