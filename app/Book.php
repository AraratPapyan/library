<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable =[
        'name',
        'genre',
        'description',
        'publish_year',
        'key_word'
    ];

    public $rules = [
        'name' => 'required',
        'genre' => 'required',
        'description' => 'required',
        'publish_year' => 'required',
        'key_word' => 'required',
    ];

    public function bookLibrary()
    {
        return $this->hasMany('App\LibraryBook');
    }
    public function bookAuthor()
    {
        return $this->hasMany('App\AuthorBook');
    }

    public function bookAuthors()
    {
        return $this->belongsToMany('App\Author', 'author_books', 'book_id','author_id');
    }

}
